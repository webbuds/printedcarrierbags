<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BagProperties;
use App\Models\BagPropertiesToProduct;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    public function insertProductProperties(Request $request){
        $peroperty=new BagProperties();
        $peroperty->icon=$request->icon;
        $peroperty->title=$request->title;
        $peroperty->save();
        return response()->json([
            'status'=>true,
             'message' => 'product properties has been saved',
         ], 200);
    }
    public function AssignProperties(Request $request){
        $poroperties=$request->poroperties;
        foreach ($poroperties as $poroperty) {
        $product_property=new BagPropertiesToProduct();
        $product_property->color_id=$poroperty->poroperty_id;
        $product_property->product_id=$request->product_id;
        $product_property->save();
        }
        return response()->json([
            'status'=>true,
             'message' => 'products color has been assigned',
         ], 200);
    }
    public function getProperties(){
        $properties=BagProperties::get();
        return response()->json([
            'status'=>true,
             'message' => 'product properties are listed bellow',
         ], 200);

    }
}
