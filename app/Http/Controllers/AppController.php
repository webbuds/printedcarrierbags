<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function home(){
		  $headers = [
            'Authorization' => 'Bearer '.session()->get('token'),
                ];
            $data=[
                
            ];
            // return $data['images'][0];
        
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/all-product',[
                'form_params'   => $data,
                'headers'       => $headers,
                ]);
        $token=json_decode($response->getBody(),true);
        // return $token;
        $headers = [
            'Authorization' => 'Bearer '.session()->get('token'),
                ];
            $data=[
                
            ];
            // return $data['images'][0];
        
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-categories',[
                'form_params'   => $data,
                'headers'       => $headers,
                ]);
        $categories=json_decode($response->getBody(),true);
        $categories=$categories['productcategories'];
        $token=array_slice($token,  -5) ;


		return view('home', compact('token','categories'));
	}
	

	public function category($slug){
		$categories=Categories::where('slug',$slug)->first();
		if($categories->category=='none'){
			$categories=Categories::where('category',$categories->name)->get();
			if(count($categories)==0){
				$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[
				'category' => $slug,
				];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-by-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token1=json_decode($response->getBody(),true);  
			if( $token1['message']=='Product not found'){
				$products = [];
			}
			else{
		$products = $token1['products'];
			}
			}
			else{
				$products=null;
			}
			
		}
		else{
			$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[
				'category' => $slug,
				];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-by-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token1=json_decode($response->getBody(),true);  
			if( $token1['message']=='Product not found'){
				$products = [];
			}
			else{
		$products = $token1['products'];
			}
		}
		//return $products.''.$categories;
		   
		return view('product-category', ['categories' => $categories, 'products' => $products]);
	}
	
	public function product($slug){
		
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
	   	$categories =$token['productcategories'];
		   
		   $headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[
				'slug'=>$slug
				];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-details',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token=json_decode($response->getBody(),true);   
	   	$products =$token['product'];

		return view('product-detail', ['categories' => $categories, 'products' => $products]);
	}
	
}
