<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }
    
    function save(Request $request){
        //validate request
        $request->validate([
            'username'=>'required|max:15|unique:users',
            'email'=>'required|email|unique:users',
            'address'=>'required',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required'
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save){
            return back()->with('success', 'New user account created!');
        }else{
            return back()->with('fail', 'User account failed to be created!');
        }
        
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
            'username'=>'required|max:15',
            'password'=>'required|min:8'
        ]);

        $userInfo = User::where('username', '=', $request->username)->first();

        if (!$userInfo){
            return back()->with('fail', 'Username not found!');
        }else{
            //cehck password
            if (Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->username);
                return redirect('/');
            }else{
                return back()->with('fail', 'Incorrect password entered!');
            }
        }
    }

    function logout(){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
}
