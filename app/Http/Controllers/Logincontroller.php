<?php

namespace App\Http\Controllers;
use App\Models\UserAdminCredential;
use App\Models\buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class Logincontroller extends Controller

{
   public function showLoginForm(){
      return view('login');
   }

   public function showsignup(){
    return view('signup');
   }

   public function register_user(Request $request){
     
     $validator = Validator::make($request->all(),[
      'username'=> 'required|string|max:255',
      'useremail'=> 'required|string|email|max:255|unique:users,email',
      'userpassword'=> 'required|string|min:8',
     
      'userrole'=> 'required|string|in:admin,user',
      'usercity'=> 'required|string|max:255',
     ]);
    
    
      $user = UserAdminCredential::create([
         'username'=>$request->input('username'),
         'useremail'=>$request->input('useremail'),
         'userpassword'=>$request->input('userpassword'),
         'userrole'=>$request->input('userrole'),
         'usercity'=>$request->input('usercity'),
         
      ]);
     
    
      if($user){
         if($user['userrole']=='user'){
            $buyer = buyer::create([
               'username'=>$request->input('username'),
               'useremail'=>$request->input('useremail'),
               'userpassword'=>$request->input('userpassword'),
               'userrole'=>$request->input('userrole'),
               'usercity'=>$request->input('usercity'),
               
            ]);
         }
         return redirect()->route('login')->with('success', 'Registration successful. Please login.');
      }
      else{
         return redirect()->route('signup')->with('unsuccess', 'Registration unsuccessful.');
      }
     
   }


   public function login_user(Request $request){
    
    $useremail = $request->useremail;
    $userpassword = $request->userpassword;
    $user = UserAdminCredential::where('useremail', $useremail)->first();
    if ($user && Hash::check($userpassword, $user->userpassword)) {
      Session::regenerate();
      Session::put('id',$user->id);
      Session::put('username',$user->username);
      Session::put('userrole',$user->userrole);
     
      return $user->userrole === 'admin'
      ? redirect()->route('Admin.Admin_dashboard')
      : redirect()->route('User.User_dashboard');
    
            
      } else {
         
         return redirect()->back()->with('unsuccess', 'Invalid credentials.');
            
      }
     
   }

   public function signout(Request $request){
      
      Session::flush();

      Auth::logout();
  
      return redirect()->route('login')->with('success', 'You have successfully logged out.');
   }
}
