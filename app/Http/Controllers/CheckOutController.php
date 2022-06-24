<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CheckOutController extends Controller
{
 	public function checkOut(Request $request){
		$id=$request->product;			
		$quantity=$request->quantity;		
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
		return view('shop-checkout',compact('token','quantity'));
	}
		
}
