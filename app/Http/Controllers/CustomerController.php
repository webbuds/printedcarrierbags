<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    public function viewAllCustomer(Request $request){
        $headers = [
            'Authorization' => 'Bearer '.session()->get('token'),
                ];
             $data=[
                'role'=>'user', 
                'status'=>'active', 
            ];
        
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/all_user',[
                   'form_params'   => $data,
                   'headers'       => $headers,
                ]);
      $token=json_decode($response->getBody(),true);
      $data= $token['user'];
      return view('admin.customers',compact('data'));
    }
	
	public function viewAllorders(){
		  $headers = [
            'Authorization' => 'Bearer '.session()->get('token'),
                ];
             $data=[
                'role'=>'user', 
                'status'=>'active', 
            ];
        
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/all-quotation',[
                   'form_params'   => $data,
                   'headers'       => $headers,
                ]);
      $token=json_decode($response->getBody(),true);
     	$data=$token['data'];
      return view('admin.orders',compact('data'));

}
}
