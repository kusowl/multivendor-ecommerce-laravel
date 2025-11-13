<?php

namespace App\Http\Controllers\Store;

use App\Dto\Product\ProductItemDto;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('store.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $productDto = ProductItemDto::fromModel($product);
        $category = $product->category;
        $subCategory = $product->subCategory;

        return view('store.products.show')
            ->with('product', $productDto)
            ->with('category', $category)
            ->with('subCategory', $subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
