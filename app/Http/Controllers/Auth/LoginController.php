<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }
    public function login(LoginRequest $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]); 
            
            if (Auth::attempt($data)) 
            {
                $request->session()->regenerate();

                if (Gate::allows('login')) {
                    return redirect()->route('backend.dashboard'); 
                }else {
                    return redirect()->route('frontend.home');
                }
            }else{
                return back()->withErrors([
                    'error' => 'Sai tài khoản hoặc mật khẩu'
                ]);
            }
            
                
            
    }
}
