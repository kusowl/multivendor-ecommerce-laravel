<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;

class StoreController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->take(3)->get();

        return view('home', compact('categories'));
    }
}
