<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attachments;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductColors;
use App\Models\ProductPrices;
use App\Models\BagSizes;
use App\Models\ProductSizes;
use App\Models\BagColor;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
     public function insertProduct(Request $request){
		//return $request->all();
		 
		 $image=$request->images;
		  $validator = Validator::make($request->all(), [ 
            'name' => 'required',
			'category' => 'required',
			'one_sp' => 'required',
			'one_c' => 'required',
			'plate_sp' => 'required',
			'plate_c' => 'required',
			'category' => 'required',
			
        ]);
        if ($validator->fails()) { 
                
            $response = [
           'message'=>$validator->errors(),
       ];
       return response()->json($response, 200);        
       }
		$product = new Product;
		$product->name = $request->name;
		$product->slug = $request->slug;
		$product->category = $request->category;
		$one_sp = $request->one_sp;
		$one_c = $request->one_c;
		$one_total = $one_sp + $one_c;
		$one_unit = $one_total/1000;
		$product->one_sp = $one_sp;
		$product->one_c = $one_c;
		$product->one_total = $one_total;
		$product->one_unit = $one_unit;
		$three_sp = $request->three_sp;
		$three_c = $request->three_c;
		$three_total = $three_sp + $three_c;
		$three_unit = $three_total/1000;
		$product->three_sp = $three_sp;
		$product->three_c = $three_c;
		$product->three_total = $three_total;
		$product->three_unit = $three_unit;
		$five_sp = $request->five_sp;
		$five_c = $request->five_c;
		$five_total = $five_sp + $five_c;
		$five_unit = $five_total/1000;
		$product->five_sp = $five_sp;
		$product->five_c = $five_c;
		$product->five_total = $five_total;
		$product->five_unit = $five_unit;
		$ten_sp = $request->ten_sp;
		$ten_c = $request->ten_c;
		$ten_total = $ten_sp + $ten_c;
		$ten_unit = $ten_total/1000;
		$product->ten_sp = $ten_sp;
		$product->ten_c = $ten_c;
		$product->ten_total = $ten_total;
		$product->ten_unit = $ten_unit;
		$plate_sp = $request->plate_sp;
		$plate_c = $request->plate_c;
		$plate_total = $plate_sp + $plate_c;
		$plate_unit = $plate_total/1000;
		$product->plate_sp = $plate_sp;
		$product->plate_c = $plate_c;
		$product->plate_total = $plate_total;
		$product->plate_unit = $plate_unit;
		$product->p_desc_title = $request->p_desc_title;
		$product->desc = $request->p_desc;
		$product->p_del_title = $request->p_del_title;
		$product->p_del_desc = $request->p_del_desc;
		$product->p_art_title = $request->p_art_title;
		$product->p_art_desc = $request->p_art_desc;
		$product->color = $request->color;			
		$product->color3=$request->color3;
		$product->color4=$request->color4;
		$product->color6=$request->color6;
		$product->color_full=$request->color_full;
		$product->working_days = $request->working_days;
		$product->eco_friendly = $request->eco_friendly;
		$product->best_seller = $request->best_seller;
		$product->made_in_the_uk = $request->made_in_the_uk;
		$product->biodegradable_plastic = $request->biodegradable_plastic;
		$product->free_delivery = $request->free_delivery;
		$product->one_side= $request->one_side;
		$product->same_two_side= $request->same_both_side;
		$product->diff_two_side= $request->different_both_side;
		$product->one_side_price= $request->one_side_price;
		$product->same_two_side_price= $request->same_both_side_price;
		$product->diff_two_side_price= $request->diff_both_side_price;
		$product->featured_image=$request->images;			
		$product->image1=$request->gallery_image1;			
		$product->image2=$request->gallery_image2;			
		$product->image3=$request->gallery_image3;			
		$product->image4=$request->gallery_image4;			
		$product->category_test=$request->category_test;			
		$product->custom_msg=$request->custom_msg;
		$product->save();
		 	foreach($request->colors as $color){
				$id=$color;
				 $color=new BagColor;
				$color->color_id=$id;
				$color->product_id=$product->id;
				$color->save();
			}
		 
		 	//foreach($request->sizes as $size){
			//	$id=$size;
				// $color=new BagSizes;
				//$color->size_id=$id;
				//$color->product_id=$product->id;
				//$color->save();
			//}
		 
		// $images=new Attachments;
		 //$images->name=$image;
		 //$images->type='product';
		 //$images->product_id=$product->id;		  
		 //$images->save();
		 
		
		 
		 
	
		    return response()->json([
                'status'=>true,
                 'message' => 'product has been saved',
             ], 200);
            
    }
    public function saveVariations(Request $request){
        $product=new Veriations();
        $product->title=$request->title;
        $product->image=$request->image;
        $product->code=$request->code;
        $product->width=$request->width;
        $product->height=$request->height;
        $product->thikness=$request->thikness;
        $product->bottom_crust=$request->bottom_crust;
        $product->product_id=$request->product_id;
        $product->save();
        return response()->json([
            'status'=>true,
             'message' => 'product veriations has been saved',
         ], 200);
    }
    
	public function allProducts(){
	$products=Product::get();
		 foreach($products as $product){
			 $product->images=Attachments::where('product_id',$product->id)->get();
		 }
		return $products;
	}
	public function productDetails(Request $request){
		$product=Product::where('slug',$request->slug)->first();
		if($product==null){
		$response = [
           'message'=>'Product not found',
       ];
       return response()->json($response, 400);
		}
		else{
			//$product->images=Attachments::where('product_id',$product->id)->get();
            $product->colors=BagColor::join('product_colors','product_colors.id','=','bag_colors.color_id')
			->select('product_colors.id','product_colors.name','product_colors.image')
			->where('bag_colors.product_id',$product->id)->get();
            $product->prices=ProductPrices::where('product_id',$product->id)->get();
			
            $product->sizes=ProductSizes::where('product_id',$product->id)->get();
				
			 return response()->json([
            'status'=>true,
			'product'=>$product,
             'message' => 'product details',
         ], 200);
			
		}
	}
	
	public function updateProduct(Request $request){
		//return $request->all();
		
		$validator = Validator::make($request->all(), [ 
            'name' => 'required',
			'category' => 'required',
			'one_sp' => 'required',
			'one_c' => 'required',
			'plate_sp' => 'required',
			'plate_c' => 'required',
			'category' => 'required',
			//'desc' => 'required',
			'product_id' => 'required',
        ]);
        if ($validator->fails()) { 
                
            $response = [
           'message'=>$validator->errors(),
       ];
       return response()->json($response, 200);        
       }
		$id=$request->product_id;
		$product =Product::find($id);
		$product->name = $request->name;
		$product->slug = $request->slug;
		$product->category = $request->category;
		$one_sp = $request->one_sp;
		$one_c = $request->one_c;
		$one_total = $one_sp + $one_c;
		$one_unit = $one_total/1000;
		$product->one_sp = $one_sp;
		$product->one_c = $one_c;
		$product->one_total = $one_total;
		$product->one_unit = $one_unit;
		$three_sp = $request->three_sp;
		$three_c = $request->three_c;
		$three_total = $three_sp + $three_c;
		$three_unit = $three_total/1000;
		$product->three_sp = $three_sp;
		$product->three_c = $three_c;
		$product->three_total = $three_total;
		$product->three_unit = $three_unit;
		$five_sp = $request->five_sp;
		$five_c = $request->five_c;
		$five_total = $five_sp + $five_c;
		$five_unit = $five_total/1000;
		$product->five_sp = $five_sp;
		$product->five_c = $five_c;
		$product->five_total = $five_total;
		$product->five_unit = $five_unit;
		$ten_sp = $request->ten_sp;
		$ten_c = $request->ten_c;
		$ten_total = $ten_sp + $ten_c;
		$ten_unit = $ten_total/1000;
		$product->ten_sp = $ten_sp;
		$product->ten_c = $ten_c;
		$product->ten_total = $ten_total;
		$product->ten_unit = $ten_unit;
		$plate_sp = $request->plate_sp;
		$plate_c = $request->plate_c;
		$plate_total = $plate_sp + $plate_c;
		$plate_unit = $plate_total/1000;
		$product->plate_sp = $plate_sp;
		$product->plate_c = $plate_c;
		$product->plate_total = $plate_total;
		$product->plate_unit = $plate_unit;
		$product->p_desc_title = $request->p_desc_title;
		$product->p_desc_title = $request->p_desc_title;
		$product->desc = $request->p_desc;
		$product->p_del_title = $request->p_del_title;
		$product->p_del_desc = $request->p_del_desc;
		$product->p_art_title = $request->p_art_title;
		$product->p_art_desc = $request->p_art_desc;
		$product->color = $request->color;
		$product->color3=$request->color3;
		$product->color4=$request->color4;
		$product->color6=$request->color6;
		$product->color_full=$request->color_full;
		$product->working_days = $request->working_days;
		$product->eco_friendly = $request->eco_friendly;
		$product->best_seller = $request->best_seller;
		$product->made_in_the_uk = $request->made_in_the_uk;
		$product->biodegradable_plastic = $request->biodegradable_plastic;
		$product->free_delivery = $request->free_delivery;
		$product->status = $request->status;
		$product->one_side= $request->one_side;
		$product->same_two_side= $request->same_both_side;
		$product->diff_two_side= $request->different_both_side;
		$product->one_side_price= $request->one_side_price;
		$product->same_two_side_price= $request->same_both_side_price;
		$product->diff_two_side_price= $request->diff_both_side_price;
		$product->meta_title = $request->meta_title;
		$product->meta_desc=$request->meta_desc;
		if($request->has('images')){
		$product->featured_image=$request->images;	
		}
		if($request->has('gallery_image1')){
		$product->image1=$request->gallery_image1;
			}
			if($request->has('gallery_image2')){
		$product->image2=$request->gallery_image2;
			}
				if($request->has('gallery_image3')){
		$product->image3=$request->gallery_image3;
				}
					if($request->has('gallery_image4')){
		$product->image4=$request->gallery_image4;
					}
		$product->category_test=$request->category_test;			
		$product->custom_msg=$request->custom_msg;

		$product->save();
		//return $product;
		$colors=BagColor::where('product_id',$product->id)->delete();
		//$sizes=ProductSizes::where('product_id',$product->id)->delete();		
		//$images=Attachments::where('product_id',$product->id)->delete();
//return $request->colors;
		 foreach($request->colors as $color){
				$id=$color;
				$color=new BagColor;
				$color->color_id=$id;
				$color->product_id=$product->id;
				$color->save();
			
		 }
		 	//foreach($request->sizes as $size){
			//	$id=$size;
			//	 $color=new ProductSizes;
			//	$color->size_id=$id;
			//	$color->product_id=$product->id;
			//	$color->save();
			//}
		if( $request->has('images')){
		 $images=new Attachments;
		 $images->name=$request->images;
		 $images->type='product';
		 $images->product_id=$product->id;		  
		 $images->save();
		}
		    return response()->json([
                'status'=>true,
                 'message' => 'product has been updated',
             ], 200);
          
	}
    
}
