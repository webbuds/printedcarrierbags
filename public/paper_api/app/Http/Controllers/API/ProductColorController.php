<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\ProductColors;

class ProductColorController extends Controller
{
    public function insertColor(Request $request){
		//return $request->all();
        $colors=$request->colors;
        
        $product=new ProductColors;
        $product->name=$request->name;
        $product->color=$colors;       
        $product->image=$request->image;
        $product->save();
        
        return response()->json([
            'status'=>true,
             'message' => 'product color has been saved',
         ], 200);
    }
    
	public function allColors(){
		$data=ProductColors::get();
		return response()->json([
            'status'=>true,
			'data'=>$data,
             'message' => 'product colors',
         ], 200);
	}
    
}
