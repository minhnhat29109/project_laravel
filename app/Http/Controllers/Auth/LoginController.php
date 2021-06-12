<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;



class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);      
            if (Auth::attempt($data)) 
            {
                
                if (Auth::user()->role == 1) {
                    $request->session()->regenerate();
                    return redirect()->intended('admin'); 
                }else{
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }
            }
            
                return back()->withErrors([
                    'email' => 'Email không đúng'

                ]);
            
    }
}
