<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductSizes;
use App\Models\ProductColors;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Redirect;

class ProductsController extends Controller
{
    public function products(){
		$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			 $data=[];
		
		$client =  new \GuzzleHttp\Client();
		$response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/all-product',[
				   'form_params'   => $data,
				   'headers'       => $headers,
				]);
	  $token=json_decode($response->getBody(),true);
	  $products =  $token;
		return view('admin/products', ['products' => $products]);
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
	
		$parent = $token['productcategories'];
		//return $parent;
		//dd($parent);
		$colors=ProductColors::get();
		$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[	];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/all-product-sizes',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token=json_decode($response->getBody(),true); 
		$sizes=$token['data'];
		
		return view('admin/add_product', ['parent' => $parent,'colors'=>$colors,'sizes'=>$sizes]);
	}
	
	public function add_product(Request $request){
		//return $request->all();
		// $request->file('image')->store('categories');
		if($request->has('images')){
				$imageName = time().'.'.$request->images->extension(); 
				$request->images->move(public_path('user_images'), $imageName);
				$images='/public/user_images/'.$imageName;
		}
		if($request->has('gallery_image_1')){
				$imageName = '1'.time().'.'.$request->gallery_image_1->extension(); 
				$request->gallery_image_1->move(public_path('user_images'), $imageName);
				$gallery_image1='/public/user_images/'.$imageName;
		}
		//return $gallery_image1;
		if($request->has('gallery_image_2')){
				$imageName = '2'.time().'.'.$request->gallery_image_2->extension(); 
				$request->gallery_image_2->move(public_path('user_images'), $imageName);
				$gallery_image2='/public/user_images/'.$imageName;
		}
		if($request->has('gallery_image_3')){
				$imageName = '3'.time().'.'.$request->gallery_image_3->extension(); 
				$request->gallery_image_3->move(public_path('user_images'), $imageName);
				$gallery_image3='/public/user_images/'.$imageName;
		}
		if($request->has('gallery_image_4')){
				$imageName = '4'.time().'.'.$request->gallery_image_4->extension(); 
				$request->gallery_image_4->move(public_path('user_images'), $imageName);
				$gallery_image4='/public/user_images/'.$imageName;
		}
			
		$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
		if($request->has('product_id')){
			$data=[
			'product_id'=>$request->product_id,			
			'name'=>$request->name,
			'slug'=>$request->slug,
			'category'=>$request->category,
			'one_sp'=>$request->one_sp,
			'one_c'=>$request->one_c,
			'three_sp'=>$request->three_sp,
			'three_c'=>$request->three_c,
			'five_sp'=>$request->five_sp,
			'five_c'=>$request->five_c,
			'ten_sp'=>$request->ten_sp,
			'ten_c'=>$request->ten_c,
			'plate_sp'=>$request->plate_sp,
			'plate_c'=>$request->plate_c,
			'p_desc_title'=>$request->p_desc_title,			
			'p_desc'=>$request->p_desc,
			'p_del_title'=>$request->p_del_title,			
			'p_del_desc'=>$request->p_del_desc,
			'p_art_title'=>$request->p_art_title,			
			'p_art_desc'=>$request->p_art_desc,
			'color'=>$request->color,			
			'color3'=>$request->color3,
			'color4'=>$request->color4,
			'color6'=>$request->color6,
			'color_full'=>$request->color_full,
			'sizes'=>$request->sizes,
			'best_seller'=>$request->best_seller,
			'working_days' => $request->working_days,
			'eco_friendly' => $request->eco_friendly,
			'made_in_the_uk' => $request->made_in_the_uk,
			'biodegradable_plastic' => $request->biodegradable_plastic,
			'free_delivery' => $request->free_delivery,
			'status' => $request->status,
			'colors'=>$request->colors,
			'category_test' => $request->category_test,
			'custom_msg'=>$request->custom_msg,
			'meta_title' => $request->meta_title,
			'meta_desc'=>$request->meta_desc,
			];
			if($request->has('one_side')){
				$data['one_side']=$request->one_side;				
				$data['one_side_price']=$request->one_side_price;

			}
			if($request->has('same_both_side')){
				$data['same_both_side']=$request->same_both_side;				
				$data['same_both_side_price']=$request->same_both_side_price;

			}
			if($request->has('different_both_side')){
				$data['different_both_side']=$request->different_both_side;				
				$data['diff_both_side_price']=$request->diff_both_side_price;

			}
			if($request->has('images')){
			$data['images']=$images;			
			
		}
		if($request->has('gallery_image_1')){
				$data['gallery_image1']=$gallery_image1;			
			
		}
		//return $gallery_image1;
		if($request->has('gallery_image_2')){
				$data['gallery_image2']=$gallery_image2;			
			
		}
		if($request->has('gallery_image_3')){
			$data['gallery_image3']=$gallery_image3;			
			
		}
		if($request->has('gallery_image_4')){
			$data['gallery_image4']=$gallery_image4;
		}
		  //return $data;
		$client =  new \GuzzleHttp\Client();
		$response = $client->request('POST', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/update-product',[
				   'form_params'   => $data,
				   'headers'       => $headers,
				]);
	  $token=json_decode($response->getBody(),true);
			//return $token;
		}
		   else{
			 $data=[
			'name'=>$request->name,
			'slug'=>$request->slug,
			'category'=>$request->category,
			'one_sp'=>$request->one_sp,
			'one_c'=>$request->one_c,
			'three_sp'=>$request->three_sp,
			'three_c'=>$request->three_c,
			'five_sp'=>$request->five_sp,
			'five_c'=>$request->five_c,
			'ten_sp'=>$request->ten_sp,
			'ten_c'=>$request->ten_c,
			'plate_sp'=>$request->plate_sp,
			'plate_c'=>$request->plate_c,
			'desc'=>$request->desc,
			'color'=>$request->color,			
			'color3'=>$request->color3,
			'color4'=>$request->color4,
			'color6'=>$request->color6,
			'color_full'=>$request->color_full,
			'p_desc_title'=>$request->p_desc_title,			
			'p_desc'=>$request->p_desc,
			'p_del_title'=>$request->p_del_title,			
			'p_del_desc'=>$request->p_del_desc,
			'p_art_title'=>$request->p_art_title,			
			'p_art_desc'=>$request->p_art_desc,
			'best_seller'=>$request->best_seller,
			'working_days' => $request->working_days,
			'eco_friendly' => $request->eco_friendly,
			'made_in_the_uk' => $request->made_in_the_uk,
			'biodegradable_plastic' => $request->biodegradable_plastic,
			'free_delivery' => $request->free_delivery,
			'status' => $request->status,
			'images'=>$images,			
			'gallery_image1'=>$gallery_image1,			
			'gallery_image2'=>$gallery_image2,			
			'gallery_image3'=>$gallery_image3,			
			'gallery_image4'=>$gallery_image4,
			'category_test' => $request->category_test,
			'custom_msg'=>$request->custom_msg,
			'colors'=>$request->colors,
			];
			  // return $data;
		if($request->has('one_side')){
				$data['one_side']=$request->one_side;				
				$data['one_side_price']=$request->one_side_price;

			}
			if($request->has('same_both_side')){
				$data['same_both_side']=$request->same_both_side;				
				$data['same_both_side_price']=$request->same_both_side_price;

			}
			if($request->has('different_both_side')){
				$data['different_both_side']=$request->different_both_side;				
				$data['diff_both_side_price']=$request->diff_both_side_price;

			}
		$client =  new \GuzzleHttp\Client();
		$response = $client->request('POST', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/insert-product',[
				   'form_params'   => $data,
				   'headers'       => $headers,
				]);
	  $token=json_decode($response->getBody(),true);
			  // return $token;
		   }
		 return redirect()->back();
		
	}
	
	public function delete($id){
		$data = Products::where('id', $id)->delete();
	  
	  	if($data){
		   return redirect()->back()->with('delete', 'Product Deleted Successfully');
	   }
	}
	
	public function delete_size($id){
		$data = ProductSizes::where('id', $id)->delete();
	  
	  	
		   return redirect()->back()->with('delete', 'Product size deleted uccessfully');
	 
	}
	
	public function delete_color($id){
		$data = ProductColors::where('id', $id)->delete();
	  
	  	
		   return redirect()->back()->with('delete', 'Product color deleted uccessfully');
	
	}
	
	public function show($slug){
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
	  $product =  $token['product'];
		$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[
				
				
			];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token=json_decode($response->getBody(),true);   
	  	$parent = $token['productcategories'];
		
		$colors=ProductColors::get();
		
		$sizes=ProductSizes::join('products','products.id','=','product_sizes.product_id')
			->select('product_sizes.*','products.name')
			->where('products.id', $product['id'])
			->get();
		//return $sizes;
	
		return view('admin/product-edit', ['product' => $product,'parent'=>$parent,'colors'=>$colors,'sizes'=>$sizes]);
	}
	
	public function detail($id){
		$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			 $data=[
				 'id'=>$id
			 ];
		
		$client =  new \GuzzleHttp\Client();
		$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-details',[
				   'form_params'   => $data,
				   'headers'       => $headers,
				]);
	  $token=json_decode($response->getBody(),true);
	  $product =  $token['product'];
		return view('admin/product-detail', ['product' => $product]);
	}
	
	public function insertQuot(Request $request){
	//return $request->all();
		 $validator = Validator::make($request->all(), [ 
               'size' => 'required', 
               'color' => 'required',                
			   'design' => 'required', 
               'full_name' => 'required', 

           ]);
           if ($validator->fails()) { 
              	 $error=$validator->errors();
                 $notification = array(
       				'message' => $error,
      				 'alert-type' => 'error'
  					);
              return  redirect()->back()->with($notification);
		   }
		   $headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[	
			'name'=>$request->full_name,		
			'email'=>$request->email,		
			'number'=>$request->phone,		
			'post_code'=>$request->post_code,		
			'product_id'=>$request->product_id,		
			'size'=>$request->size,		
			'color'=>$request->color,		
			'design'=>$request->design,			
			//'quantity'=>$request->quantity,
			'quantity'=>3000,

			];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/add-quotation',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token=json_decode($response->getBody(),true); 
		//return $token;
		if($token['status']==false){
			return redirect()->back()->with('message', 'Thank you for your enquiry. Due to the continuous change in supplier prices we are unable to provide an instant quote at the moment. One of our team member will review your quote details and get in touch with you soon.'); 
		}
		else{
		return redirect()->back()->with('success', 'Qoutation sended on your email successfully');
		}
	}
	
	
    

    public function adminMultiSizes(Request $request){
		
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
		
		$headers = [
            'Authorization' => 'Bearer '.session()->get('token'),
                ];
            $data=[
                
            ];
            // return $data['images'][0];
        
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/all-product-sizes',[
                'form_params'   => $data,
                'headers'       => $headers,
                ]);
        $data=json_decode($response->getBody(),true);
		$data=$data['data'];
		//return $data;
        return view('admin.sizes',compact('token','data'));
    }
	
	
    public function adminMultiColors(Request $request){
		
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
		
		$headers = [
            'Authorization' => 'Bearer '.session()->get('token'),
                ];
            $data=[
              
            ];
            // return $data['images'][0];
        
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/all-product-colors',[
                'form_params'   => $data,
                'headers'       => $headers,
                ]);
        $data=json_decode($response->getBody(),true);
		$data=$data['data'];
		
        return view('admin.colours',compact('token','data'));
    }

    
    public function addProductSizes(Request $request){
        //return $request->all();
        if($request->has('size_image')){
		$image=$request->size_image;
        $imageName = time().'.'.$image->extension();  
        $image->move(public_path('user_images'), $imageName);
        $images='/public/user_images/'.$imageName;
        
			 
		}
		if($request->has('id')){
			$id=$request->id;
			$data=ProductSizes::find($id);
			$data->title=$request->size_name;			
			$data->size=$request->size_slug;			
			$data->desciption=$request->description;			
			$data->price=$request->price;			
			$data->product_id=$request->product_id;			
			$data->image=$images;		
			$data->save();

	return redirect()->back();

		}
       else{
        $headers = [
            'Authorization' => 'Bearer '.session()->get('token'),
                ];
            $data=[
                'titles'=>$request->size_name,
                'size'=>$request->size_slug,
                'desciption'=>$request->description,
				'price'=>$request->price,				
				'product_id'=>$request->product_id,
                'image'=>$images,
            ];
             //return $data;
        
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/insert-product-sizes',[
                'form_params'   => $data,
                'headers'       => $headers,
                ]);
        $token=json_decode($response->getBody(),true);
		//return $token;
        return redirect()->back();
    	}
	}



    public function addProductColors(Request $request){
            // return $request->all();
            if($request->has('images')){
				$imageName = time().'.'.$request->images->extension();  
				$request->images->move(public_path('user_images'), $imageName);
				$images='/public/user_images/'.$imageName;
			
		}
            // return $image[0];
            $headers = [
                'Authorization' => 'Bearer '.session()->get('token'),
                    ];
                $data=[
                    'colors'=>$request->color_slug,
                    'name'=>$request->color_name,
                    'image'=>$images,
                ];
                // return $data['images'][0];

            $client =  new \GuzzleHttp\Client();
            $response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/insert-product-colors',[
                    'form_params'   => $data,
                    'headers'       => $headers,
                    ]);
            $token=json_decode($response->getBody(),true);
             //return $token;
        return redirect()->back();
    }
	public function showsize($id){
		
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
		
		
		$data=ProductSizes::find($id);
		//return $data;
        return view('admin.editsize',compact('token','data'));
		
	}
}
