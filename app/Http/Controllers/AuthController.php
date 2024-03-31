<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;


class AuthController extends Controller
{
    public function viewloginpage()
    {
        return view('login');
    }

    public function viewregisterpage()
    {
        return view('register');
    }
    function checkLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email"=>'required',
            "password"=>'required',
        ]);
  
  
        if ($validator->passes()) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
         
            return redirect("/");
        } else {
            return back()->with('error', 'Wrong credentials')->withInput();
        }
       
    }
     else
    {
        return back()->with('error', 'All Fields are required')->withInput();
    }
    }
    function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email"=>'required',
            "password"=>'required',
            "name"=>'required'
        ]);
  
  
    if ($validator->passes()) {
        
       $RegisterUser=new User();
       $RegisterUser->name=$request->name;
       $RegisterUser->email=$request->email;
       $RegisterUser->password=Hash::make($request->password);
       if($RegisterUser->save())
       {
        return redirect('/login');
       }
       else
       {
        return back()->with('error','Try Again');
       }
    }
     else
    {
        return back()->with('error', 'All Fields are required')->withInput();
    }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('viewloginpage');
    }
}
