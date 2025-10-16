<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateSessionRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(AuthenticateSessionRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            // Redirect to dashboard
        }

        return back()->withInput($request->except('password'))->withErrors(['email' => 'No matching user found']);
    }
}
