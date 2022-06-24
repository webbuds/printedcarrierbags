<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    public function signup(Request $request)
    {
	
         $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'email' => 'required|email|unique:users', 
            'password' => 'required',
        ]);
        if ($validator->fails()) { 
                
            $response = [
           'message'=>$validator->errors(),
       ];
       return response()->json($response, 200);        
       }
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
        $user->save();
        if($user){
            // $user->sendEmailVerificationNotification();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
        }
    }

    public function login(Request $request)
    {
        $user_check=User::where('email',$request->email)->first();
       if($user_check==null){
          return response()->json([
                'message' => 'User Not Found',
                    'success'=>0
            ], 200); 
       }
       if($user_check->status!='active'){
           return response()->json([
               'blocked'=>1,
                'message' => 'Your Account has been suspended by admin',
                    'success'=>0
            ], 200);
       }
       if($user_check->email_verified_at==null){
        return response()->json([
            'Unverified'=>1,
             'message' => 'Your Email is not verified',
                 'success'=>0
         ], 200);
    }
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'password' => 'required',  
        ]);
        if ($validator->fails()) {    
            $response = [
           'error'=>$validator->errors()
       ];
                                   }
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized',
                    'success'=>0
            ], 200);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addDay();
        $token->save();
        $otp=rand(1000,9999);
        // $user_otp=User::where('email',$request->email)->update([
        //     'otp' => $otp,
        // ]);
        // $data = array(
        //     'otp'=>$otp
        //     );
        //  Mail::to($request->email)->send(new OTP($data));
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'user'=>$user,
            'success'=>1,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        
        $token = $request->user()->token();
        $token->revoke();
        if($token){
             return response()->json([
                'success'=>1,
            'message' => 'Successfully logged out']);
        }
       
    }
    public function user(Request $request)
    {
        //$id=$request->id;
          $user=$request->user();
        if($user){
            return response()->json([
                'user'=>$user,
                'success'=>1,
                'message' => 'User Profile Fetched'
        ]);
       }
      
    }

   
    public function update_user(Request $request){ 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'email' => 'required|email', 
        
        ]);
        if ($validator->fails()) { 
                
            $response = [
                'success'=>0,
           'message'=>$validator->errors(),
       ];
       return response()->json($response, 401);        
       }
       if($request->has('image')){
           if($request->has('password')){
                  $user = User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'password' => Hash::make($request->password)
        ]);
               
           }
           else{
            $user = User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
        ]);
           }
       }
       else{
            if($request->has('password')){
        $user = User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
       
        return response()->json([
            'success'=>1,
            'message' => 'Successfully upadted user!'
        ], 201);
    }
     else{
            $user = User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
           }
       }
    }

    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return response()->json([  'success'=>1,"msg" => 'Reset password link sent on your email id.']);
    }
    public function reset_password(Request $request){
          
             $validator = Validator::make($request->all(), [ 
            'password' => 'required|min:8|max:12', 
            'password_confirmation' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
                
            $response = [
           'error'=>$validator->errors()       ];
       return response()->json($response, 401);        
       }
       $id=User::where('email',$request->email)->first();
       $password = bcrypt($request->password);
       $user =User::where('id', $id->id)
              ->update(['password' => $password]);
        if($user){
        return redirect('/');
            }
    }

    public function update_user_status(Request $request){
   
            $user = User::where('id', $request->id)
                   ->update(['status' =>$request->status]);
           if($user){
                 return response()->json([
                    'success'=>1,
                   'message' => 'Successfully  user status!'
               ], 201);
           }
    }

    public function update_status(Request $request){
   
            $user = User::where('id', $request->id)
                   ->update(['status' =>$request->status]);
           if($user){
                 return response()->json([
                    'success'=>1,
                   'message' => 'Successfully user status updated!'
               ], 201);
           }
    }

    public function all_user(Request $request){
            
            $user = User::where('role', $request->role)->where('status', $request->status)->get();         
           if(count($user)>=1){
            return response()->json([
                'user'=>$user,
                'success'=>1,
                'message' => 'user retrieved Successfully!'
            ]);
           }
           else{
               return response()->json([
                'success'=>0,
                'user'=>[],
                'message' => 'users not found!'
            ]); 
           }
    }

    public function update_password(Request $request){
   
            $user = User::where('id', $request->id)
            ->update([
                'password' => bcrypt($request->password)
            ]);       
           if($user){
            return response()->json([
                'success'=>1,
                'message' => 'Password Has been updated Successfully!'
            ]);
           }
    }

    public function delete_user_permanent(Request $request){
   
            $user = User::where('id', $request->id)
            ->delete();      
           if($user){
            return response()->json([
                'success'=>1,
                'message' => 'User Has been deleted Successfully!'
            ]);
           }
    }

    public function otp_validate(Request $request){
   
            $user = User::where('id', $request->id)->first(); 
                 
           if($user->otp==$request->otp){
            $user = User::where('id', $request->id) ->update([
                'otp' => null
            ]);  
            return response()->json([
                'success'=>1,
                'message' => 'Your Otp Is Valid !'
            ]);
           }
               else{
                return response()->json([
                    'success'=>0,
                    'message' => 'Your Otp Is Invalid !'
                ]);
               }
    }
}
