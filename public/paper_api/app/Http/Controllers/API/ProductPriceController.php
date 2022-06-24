<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductPrices;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    public function addPrices(Request $request){
		
        $poroperties=$request->quantity;
        $i=0;
        foreach ($poroperties as $poroperty) {
        $product_price=new ProductPrices();
        $product_price->product_id=$request->product_id;
        $product_price->quantity=$poroperty;
        $product_price->price=$request->price[$i];
        $product_price->save();
        $i++;
        }
      return response()->json([
            'status'=>true,
             'message' => 'products price has been assigned',
         ], 200);
    }
}
