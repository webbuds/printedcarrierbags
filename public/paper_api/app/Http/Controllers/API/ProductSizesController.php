<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductSizes;
use App\Models\BagSizes;
use Illuminate\Http\Request;

class ProductSizesController extends Controller
{
    public function addProductSizes(Request $request){
		//return $request->all();
        $titles=$request->titles;
      
        
        $product_price=new ProductSizes();
        $product_price->title=$titles;
        $product_price->size=$request->size;
        $product_price->desciption=$request->desciption;
        $product_price->image=$request->image;
		$product_price->price=$request->price;		
		$product_price->product_id=$request->product_id;
        $product_price->save();
       
        return response()->json([
            'status'=>true,
             'message' => 'products sizes has been added',
         ], 200);
    }
	public function allSizes(){
		
		$data=ProductSizes::join('products','products.id','=','product_sizes.product_id')
			->select('product_sizes.*','products.name')
			->get();
		return response()->json([
            'status'=>true,
			'data'=>$data,
             'message' => 'products sizes ',
         ], 200);
		
	}
	
	
}
