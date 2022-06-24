<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    public function signup (Request $request){
        $validator = Validator::make($request->all(), [ 
               'password' => 'required', 
               'c_password' => 'required|same:password', 
           ]);
           if ($validator->fails()) { 
               $error=$validator->errors();
                      $notification = array(
       'message' => 'Password Not Matched!',
       'alert-type' => 'error'
   );
                        return  redirect('register')->with($notification);
        
           }
            $client = new \GuzzleHttp\Client();
           $client = new Client(['base_uri' =>'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/']);
           $body['form_params']=array(
               'email'=>$request->input('email'), 
               'password'=>$request->input('password'),
               'c_password'=>$request->input('c_password'),
               'name'=>$request->input('name')
               
           );
            $response = $client->request('post', '/public/lyfe/public/api/auth/signup', $body);
         $token=json_decode($response->getBody(),true);
   // 	return $token;
           if($token['message']!=null){
               if(isset($token['message']['email'])){
                        $notification = array(
       'message' => 'Email Already Registered!',
       'alert-type' => 'error'
   );
                        return  redirect('register')->with($notification);
           } 
               
               $notification = array(
       'message' => 'User Register successfully!',
       'alert-type' => 'success'
   );
                        return  redirect('/paperadmin/dashboard')->with($notification);
           }
           else{
               $notification = array(
       'message' => 'Fill the Form Carefully!',
       'alert-type' => 'error'
   );
                      
               return  redirect('/')->with($notification);
           }
          
       }
       
       public function login (Request $request){
                $client = new \GuzzleHttp\Client();
           $client = new Client(['base_uri' =>'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/']);
           $body['form_params']=array(
               'email'=>$request->input('email'), 
               'password'=>$request->input('password')
           );
            $response = $client->request('post', 'api/v1/login', $body);
         $token=json_decode($response->getBody(),true);
        //  return $token;
          if($token['success']==0){
               if($token['message']=="User Not Found"){
		   return redirect()->back()->with('error', 'This email is not registerd');
               }
                if($token['message']=="Unauthorized"){ 
		   return redirect()->back()->with('error', 'Wrong password');     
               }
                if($token['verify']==0){
		   return redirect()->back()->with('error', 'Verify your account');               
               }
                if($token['message']=="Your Account has been suspended by admin"){
		   return redirect()->back()->with('error', 'Your account has been suspended by admin');                 
               }
          }
          session()->put(['token'=>$token['access_token'],
           'user_id'=>$token['user']['id'],
            'email'=>$token['user']['email'],
           'role'=>$token['user']['role']
          ]);
           if($token['access_token']!=null){
                       if($token['user']['role']=='user'){
                   
            return  redirect('/paperadmin/dashboard')->with('success', 'Product added successfully');
               }
               elseif($token['user']['role']=='admin'){
				return  redirect('/paperadmin/dashboard')->with('success', 'Product added successfully');
               }
                
               else{
				return redirect()->back()->with('error', 'Invalid login credentials');
               }
           }
           else{
			return redirect()->back()->with('error', 'Invalid login credentials');   
           }
           
       }
       public function logout(){
          // return "jfdskfds";
             $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
                   'id'=>session()->get('user_id'), 
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/logout',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
                        session()->flush();
                        Session::flush();
			   return  redirect('/paperadmin/dashboard')->with('success', 'Admin log out successfully!');     
       }
        
       public function fetch_user_profile(){
            $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
                   'id'=>session()->get('user_id'), 
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/user',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         
          $notification = array(
                   'message' => 'User Profile Fetched successfully!',
                   'alert-type' => 'success'
               );
             
         return view ('user.user',compact('token'))->with($notification);
       }
       
        public function admin_fetch_user_profile(Request $request){
            $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
                   'id'=>$request->id
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/user',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         
          $notification = array(
                   'message' => 'User Profile Fetched successfully!',
                   'alert-type' => 'success'
               );
             
         return view ('admin.userdetails',compact('token'))->with($notification);
       }
       
       public function admin_fetch_user_profile1($id){
            $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
                   'id'=>$id
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/user',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         
          $notification = array(
                   'message' => 'User Profile Fetched successfully!',
                   'alert-type' => 'success'
               );
             
         return view ('admin.userdetails',compact('token'))->with($notification);
       }
       
       public function fetch_user_profile1(){
            $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
                   'id'=>session()->get('user_id'), 
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/user',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         
          $notification = array(
                   'message' => 'User Profile Fetched successfully!',
                   'alert-type' => 'success'
               );
             
          return redirect('/user')->with($notification);
       }
       
       public function  update_user(Request $request){
           if($request->photo!=null){
           $imageName = time().'.'.$request->photo->extension();  
           $request->photo->move(public_path('user_images'), $imageName);
           $image='/public/user_images/'.$imageName;
           if($request->curent_password==null && $request->new_password==null){
               $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'id'=>session()->get('user_id'),
               'name'=>$request->name,
               'lastname' => $request->lastname,
               'email'=>$request->email,
               'image'=>$image,
   // 			'curent_password'=>$request->curent_password,
   // 			'password'=>$request->new_password,
               ];
           }
           else{
                $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'id'=>session()->get('user_id'),
               'name'=>$request->name,
               'lastname' => $request->lastname,
               'email'=>$request->email,
               'image'=>$image,
               'curent_password'=>$request->curent_password,
               'password'=>$request->new_password,
               ];
           }
           
           }
           else{
          
          if($request->curent_password==null && $request->new_password==null){
   
                $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'id'=>session()->get('user_id'),
               'name'=>$request->name,
               'lastname' => $request->lastname,
               'email'=>$request->email
               ];
           }
           else{
                   $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'id'=>session()->get('user_id'),
               'name'=>$request->name,
               'lastname' => $request->lastname,
               'email'=>$request->email,
               'curent_password'=>$request->curent_password,
               'password'=>$request->new_password,
               ];
           }
           
           }
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/update_user',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         
            
         $notification = array(
       'message' => 'User Profile Updated successfully!',
       'alert-type' => 'success'
   );
   
         return redirect()->back()->with($notification);
       }
       
           public function  admin_update_user(Request $request){
                $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'id'=>$request->id,
               'name'=>$request->name,
               'email'=>$request->email,
               'password'=>$request->password,
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/update_user',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         
            
         $notification = array(
       'message' => 'User Profile Updated successfully!',
       'alert-type' => 'success'
   );
   
         return redirect()->back()->with($notification);
       }
       
       
       public function all_user(){
            $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'role'=>'user',
                'status'=>'active',
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://crm.lyfetesting.online/api/v1/all_user',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         $token=$token['user'];
         //return $token;
         $i=0;
           return view ('admin.users',compact('token','i'));
       }
       
       public function block_user(Request $request){
       
        $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'id'=>$request->id,
               'status'=>0
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/update_user_status',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         $i=0;
            $notification = array(
       'message' => 'User Blocked successfully!',
       'alert-type' => 'success'
   );
   
           return redirect('admin/users')->with($notification);
           
       }
           public function delete_user(Request $request){
            
       
        $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'id'=>$request->id,
               'status'=>1
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/delete_user',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         $i=0;
         
         $notification = array(
       'message' => 'User Deleted successfully!',
       'alert-type' => 'success'
   );
   
   
           return redirect('admin/users')->with($notification);
           
       }
       
       
       public function unblock_user(Request $request){
       
        $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'id'=>$request->id,
               'status'=>1
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/update_user_status',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         $i=0;
       $notification = array(
       'message' => 'User Unblocked successfully!',
       'alert-type' => 'success'
   );
   
           return redirect('admin/users')->with($notification);
           
       }
       
       
       
       public function resetpassword (Request $request){
             $headers = [
               'Authorization' => 'Bearer '.session()->get('token'),
                   ];
                $data=[
               'email'=>$request->email
               ];
           
           $client =  new \GuzzleHttp\Client();
           $response = $client->request('POST', 'https://lyfetesting.online/public/lyfe/public/api/auth/forgot',[
                      'form_params'   => $data,
                      'headers'       => $headers,
                   ]);
         $token=json_decode($response->getBody(),true);
         $i=0;
       $notification = array(
       'message' => 'Reset password link sent on your email!',
       'alert-type' => 'success'
   );
   
           return redirect('resetpassword')->with($notification);
           
       }
       
       public function addclient(Request $request){
         $password=rand(10000000,99999999);
   // 	  return $password;
            $client = new \GuzzleHttp\Client();
           $client = new Client(['base_uri' =>'https://crm.lyfetesting.online/api/v1/']);
           $body['form_params']=array(
               'email'=>$request->input('email'), 
               'password'=>$password,
               'c_password'=>$password,
               'first_name'=>$request->input('first_name'),
               'last_name'=>$request->input('last_name'),
               'address'=>$request->input('address'),
               'contact_number'=>$request->input('contact_number')
           );
            $response = $client->request('post', 'signup', $body);
         $token=json_decode($response->getBody(),true);
         return $token;
         return redirect('allclient');
           
           
       }
       
       public function adminindex(Request $request){
           return view('admin.index');
       }
       
       
       
   }