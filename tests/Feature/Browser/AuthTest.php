<?php

use Illuminate\Support\Facades\DB;

it('Registers an user', function () {
    $page = visit(route('register'));
    $page
        ->assertSee('Create Your Account')
        ->assertSee('Sign Up')
        ->fill('name', 'Ram')
        ->fill('email', 'ram@ajyodha.com')
        ->fill('password', 'password')
        ->fill('password_confirmation', 'password')
        ->radio('role', 'customer')
        ->click('Sign Up')
        ->assertUrlIs(route('login'))
        ->assertSee('Account Created! Login Now');

    expect(DB::table('users'))->where('email', 'ram@ajyodha.com')->exists()->toBeTrue();
});
