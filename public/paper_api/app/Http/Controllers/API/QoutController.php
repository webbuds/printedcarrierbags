<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\Quot;
use App\Mail\AdminQuot;
use App\Models\ProductSizes;
use App\Models\ProductColors;
use App\Models\Quotations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Models\User;


class QoutController extends Controller
{
    public function insertQuot(Request $request){
		//return $request->all();
		$product=Product::where('id',$request->product_id)->first();
		//return $product;
		if($product->category_test=="yes"){
        $reffrence=rand(11111,99999);
        $qout=new Quotations();
        $qout->client_name=$request->name;
        $qout->client_email=$request->email;
        $qout->client_number=$request->number;
        $qout->reffrence=$reffrence;
        $qout->product_id=$request->product_id;
        $qout->quantity_id=$request->quantity_id;
        $qout->post_code=$request->post_code;
        $qout->size_id=$request->size;
        $qout->color=$request->color;
        $qout->design_type=$request->design;
        $qout->save();
        $product=Product::where('id',$request->product_id)->first();        
		$product_size=ProductSizes::where('id',$qout->size_id)->first();		
		$product_color=ProductColors::where('id',$qout->color)->first();

		//return $product_size;
			
        $data = array(
			'id'=>  $qout->id,
            'name'=>  $qout->client_name,
            'number'=> $qout->client_number,           
			'email'=>$qout->email,
            'refference'=> $qout->reffrence,
            'date'=> $qout->created_at,
            'product'=> $product,
			'product_size'=>$product_size,
			'product_color'=>$product_color,
			'size_id'=>$qout->design_type,

            );
			//return $data;
            // return $data['product_color']['name'];
              Mail::to($request->email)->send(new Quot($data));
       
		return response()->json([
            'status'=>true,
			
             'message' => 'Mail sended on your email',
         ], 200);
		}
		else{
			
			$reffrence=rand(11111,99999);
        $qout=new Quotations();
        $qout->client_name=$request->name;
        $qout->client_email=$request->email;
        $qout->client_number=$request->number;
        $qout->reffrence=$reffrence;
        $qout->product_id=$request->product_id;
        $qout->quantity_id=$request->quantity_id;
        $qout->post_code=$request->post_code;
        $qout->size_id=$request->size;
        $qout->color=$request->color;
        $qout->design_type=$request->design;
        $qout->save();
        $product=Product::where('id',$request->product_id)->first();        
		$product_size=ProductSizes::where('product_id',$request->product_id)->first();		
		$product_color=ProductColors::join('bag_colors','bag_colors.color_id','=','product_colors.id')
			->select('product_colors.*')
			->where('bag_colors.product_id',$request->product_id)->get();
//return $product_color;

        $data = array(
			'id'=>  $qout->id,
            'name'=>  $qout->client_name,
            'number'=> $qout->client_number,           
			'email'=>$qout->email,
            'refference'=> $qout->reffrence,
            'date'=> $qout->created_at,
            'product'=> $product,
			'product_size'=>$product_size,
			'product_color'=>$product_color,
			 'size_id'=>$qout->design_type,

            );
			//return $data;
             $email=User::where('role','=','admin')->first();
              Mail::to($email->email)->send(new AdminQuot($data));
       
		return response()->json([
            'status'=>false,
				
             'message' => 'Mail sended to admin',
         ], 200);

			return response()->json([
            'status'=>false,
			
             'message' => 'Quotation is blocked',
         ], 200);
		}
    }
	
	public function allQutations(){
		$qouts=Quotations::get();
		foreach($qouts as $qout){
			$qout->product=Product::where('id',$qout->product_id)->value('name');
		}
		return response()->json([
            'status'=>true,
			'data'=>$qouts,
             'message' => 'products price has been assigned',
         ], 200);
	
}
	
	public function resendQutation(Request $request){
		$id=$request->id;
		$quot=Quotations::where('id',$id)->get();
		
		$product=Product::where('id',$quot[0]['product_id'])->first();
		$product_size=ProductSizes::where('id',$quot[0]['product_id'])->first();		
		$product_color=ProductColors::where('id',$quot[0]['product_id'])->first();
        $data = array(
			'id'=>  $quot[0]['id'],
            'name'=>$quot[0]['client_name'],
            'number'=>$quot[0]['client_number'],           
			'email'=>$quot[0]['email'],
            'refference'=>$quot[0]['reffrence'],
            'date'=>$quot[0]['created_at'],
            'product'=>$product,
			'product_size'=>$product_size,
			'product_color'=>$product_color,
			'size_id'=>$quot[0]['design_type'],
            );
             //return $data;
              Mail::to($quot[0]['client_email'])->send(new Quot($data));
       
		return response()->json([
            'status'=>true,
			
             'message' => 'Mail sended on your email',
         ], 200);
	}

}