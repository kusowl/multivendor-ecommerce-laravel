<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class StoreCategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('subCategory')->get()->chunk(3);

        return view('store.categories', compact('categories'));
    }
}
