<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        $this->data['headline'] = 'Login';

        return view('login.form', $this->data);
    }

    public function authenticate(LoginRequest $request){
        // return $formData = $request->all();
        $data = $request->only('email', 'password');

        if(Auth::attempt($data)){
            return redirect()->intended('dashboard');
        }else{
            return redirect()->route('login')->withErrors('Invalid Email or Password!');
        }

    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }


}
