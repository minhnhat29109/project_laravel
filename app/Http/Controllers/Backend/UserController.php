<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('create', User::class);
        $users = User::whereNotIn('role', [Auth::user()->role])
        ->get();
        return view('backend.users.index', ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');
        $user->save();
        if ($user) {
            $user_info = new UserInfo();
            $user_info->address = $request->get('address');
            $user_info->phone = $request->get('phone');
            $user_info->user_id = $user->id;
            $user_info->save();
        }
        Cookie::queue('success', 'Thêm người dùng thành công', 1/60); 

        return redirect()->route('backend.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('create', User::class);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('create', User::class);
        $user = User::where('id', $id)->first();
        return view('backend.users.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->authorize('create', User::class);
        $name = $request->get('name');
        $email = $request->get('email');
        $password = Hash::make($request->get('password'));
        $role = $request->get('role');
        $result = User::where('id', $id)->update(['name' => $name, 'email' => $email, 'password' => $password, 'role' => $role]);
        if ($result) {
            $phone = $request->get('phone');
            $address = $request->get('address');
            UserInfo::where('user_id', $id)->update(['phone' => $phone, 'address' => $address]);
        }
        return redirect()->route('backend.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('create', User::class);
        User::where('id', $id)->delete();
        return redirect()->route('backend.user.index');
    }
}
