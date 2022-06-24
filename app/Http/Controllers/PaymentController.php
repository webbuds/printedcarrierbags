<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use Stripe;
use App\Models\Payments;
use App\Models\Quotations;

class PaymentController extends Controller
{
	public function addPayment(Request $request){
		//return $request->all();
        Stripe\Stripe::setApiKey('sk_test_emKIu4izFTDA5tqe2n4uQ5at');
        $payment=Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "GBP",
                "source" => $request->stripeToken,
                "description" => "Test dev paper" 
        ]);
  
        Session::flash('success', 'Payment successful!');
          $payment=New Payments();
		$payment->fname=$request->fname;		
		$payment->lname=$request->lname;		
		$payment->billing_address=$request->billing_address;		
		$payment->billing_address2=$request->billing_address2;		
		$payment->country=$request->country;		
		$payment->city=$request->city;		
		$payment->zipcode=$request->zipcode;			
		$payment->cname=$request->cname;		
		$payment->email=$request->email;
		$payment->fname1=$request->fname1;		
		$payment->lname1=$request->lname1;		
		$payment->cname1=$request->cname1;		
		$payment->country1=$request->country1;		
		$payment->billing_address1=$request->billing_address1;		
		$payment->billing_address2_1=$request->billing_address2_1;		
		$payment->state1=$request->state1;		
		$payment->city1=$request->city1;		
		$payment->zipcode1=$request->zipcode1;		
		$payment->stripeToken=$request->stripeToken;		
		$payment->quantity=$request->quantity;
		$payment->price=$request->price;
		$payment->save();

        return back();
	}
	
	public function allPayments(){
		$data=Payments::get();
		return view('admin/payments',compact('data'));
	}
	
	public function resendquotation($id){
		$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			 $data=[
				 'id'=>$id
			 ];
		
		$client =  new \GuzzleHttp\Client();
		$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/resend-quotation',[
				   'form_params'   => $data,
				   'headers'       => $headers,
				]);
	  $token=json_decode($response->getBody(),true);
		//return $token;
 return back();
	}
	
	public function deleteQuotaion($id){
		$qout=Quotations::find($id);
		$qout->delete();
		 return back();
	}
	
	
}