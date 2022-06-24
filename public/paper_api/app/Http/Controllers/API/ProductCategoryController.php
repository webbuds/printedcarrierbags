<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attachments;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductColors;
use App\Models\ProductPrices;
use App\Models\ProductSizes;
use App\Models\BagSizes;

use Illuminate\Http\Request;


class ProductCategoryController extends Controller
{
    public function insertCategories(Request $request){
        $category=new ProductCategories();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->category = $request->category;
        $category->image = $request->image;
        $category->save();
        return response()->json([
            'status'=>true,
             'message' => 'product categories has been saved',
         ], 200);

    }
    public function getCategories(){
        $productcategories=ProductCategories::get();
        return response()->json([
            'status'=>true,
            'productcategories'=>$productcategories,
             'message' => 'product categories has been saved',
         ], 200);
    }
	public function getProductByCategory(Request $request){
		//return $request->all();
		$category=ProductCategories::where('slug',$request->category)->first();
		//return $category;
        $products=Product::where('category',$category->id)->get();
		//return $products;
        $product=count($products);
        if($product==null){
            $response = [
               'message'=>'Product not found',
           ];
           return response()->json($response, 200);
            }
            else{
                foreach($products as $product){
              //  $product->images=Attachments::where('product_id',$product->id)->get();
               // $product->colors=ProductColors::where('product_id',$product->id)->get();
                //$product->prices=ProductPrices::where('product_id',$product->id)->get();
                 $product->sizes=ProductSizes::where('product_id',$product->id)->get();
                }
                 return response()->json([
                'status'=>true,
                'products'=>$products,
                'message' => 'products of following category' ,
             ], 200);
                
            }

    }
}
