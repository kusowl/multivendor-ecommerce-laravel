<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterUserRequest;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterdUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreRegisterUserRequest $request)
    {
        $user  = new \App\Models\User();
        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->password  = Hash::make($request->password);
        $user->role  = $request->role;
        $user->save();
    }
}
