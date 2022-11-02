<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInFormRequest;


class SignInController extends Controller
{
    public function page(){

        return view('auth.login');
    }


    public function handle(SignInFormRequest $request){
       
        if(! auth()->attempt($request->validated())){
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
     
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    public function logOut(){
        auth()->logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect()->route('home');
    }

}
 