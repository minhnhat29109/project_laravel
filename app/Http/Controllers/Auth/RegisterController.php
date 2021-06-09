<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Middleware\Authenticate;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
       return view('backend.auth.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if ($data) {
            $user = User::where('email', $request->get('email'))->get();
            if (count($user) == 1){
                return back()->withErrors(['errors' => 'Tài khoản đã tồn tại']);
            }else {
                $create_user = User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                ]);
                if ($create_user) {
                    $email = $request->get('email');
                    $user_id = User::where('email', $email)->first();
                    UserInfo::create([
                        'user_id' => $user_id->id,
                        'phone' => $request->get('phone'),
                        'address' => $request->get('address'),
                    ]);   
                }
                if (Auth::attempt(['email' => $email, 'password' => $request->get('password')])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }
            }
        }
        
    }
}
