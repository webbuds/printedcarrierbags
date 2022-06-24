<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class CategoriesController extends Controller
{
	
   public function categories(){
	   $headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[	];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token=json_decode($response->getBody(),true);   
	   	$data =$token['productcategories'];
	   	return view('admin/categories', ['data' => $data]);
   }
	
	
   public function add(){
	   
		$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[	];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token=json_decode($response->getBody(),true);   
	   	$data =$token['productcategories'];
	    return view('admin/add_category', ['data' => $data]);
   }
	
   public function add_category(Request $request){
	   
// validation
	   
	 //return $request->all();
	   $image = $request->file('image')->store('categories');
	   $headers = [
		'Authorization' => 'Bearer '.session()->get('token'),
			];
		$data=[	
			'name' => $request->name,
			'slug' => $request->slug,
			'category' => $request->category,
			'image'=>$image
		];
		$client =  new \GuzzleHttp\Client();
		$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/insert-categories',[
				'form_params'   => $data,
				'headers'       => $headers,
				]);
		$token=json_decode($response->getBody(),true);
		// return $token;  
	   if($token['status']==true){
		   return redirect()->back()->with('success', 'Category added successfully');
	   }
	   else{
		   return redirect()->back()->with('error', 'Error in adding category');
	   }
   }
	
  public function delete($id){
	  
	  $data = Categories::where('id', $id)->delete();
	  
	  if($data){
		   return redirect()->back()->with('delete', 'Category Deleted Successfully');
	   }
  }
	
  public function edit($id){
	  $data = categories::find($id);
	  $categories = categories::where('category', 'none')->get();
	  return view('admin/edit_category',['data' => $data, 'categories' => $categories]);
  }
	
  public function update(Request $request){
	  	  //return $request->all();
	  $category = categories::find($request->id);
	  
	  $category->name = $request->name;
	  $category->slug = $request->slug;
	  $category->category = $request->category;
	  
	  if($request->has('image')){
		  $category->image = $request->file('image')->store('categories');
	  }
	  
	  $category->save();
	  
	  if($category){
		   return redirect()->back()->with('success', 'Category updated successfully');
	   }
	   else{
		   return redirect()->back()->with('error', 'Error in updating category');
	   }
	  
  }
	
}
