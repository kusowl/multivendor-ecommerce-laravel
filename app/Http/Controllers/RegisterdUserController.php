<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterdUserController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.register');
    }

    public function store(StoreRegisterUserRequest $request)
    {
       User::create($request->all()) ;
    }
}
