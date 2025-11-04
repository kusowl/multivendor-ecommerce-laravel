<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Utils\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::select('slug', 'name', 'image')->paginate(12)->toArray();

        return view('dashboard.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        $subCategories = SubCategory::select(['id', 'name', 'category_id'])->get();

        return view('dashboard.product.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProductRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('images')) {
            $files = [];
            foreach ($request->file('images') as $image) {
                $files[] = File::upload($image, 'uploads/product-images');
            }
            $data['image'] = implode(',', $files);
        }
        $data = array_merge($data, ['vendor_id' => 1]);
        Product::create($data);

        return to_route('dashboard.product.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $subCatgories = $product->category->subCategories->all();

        return view('dashboard.product.edit', compact('product', 'categories', 'subCatgories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveProductRequest $request, Product $product)
    {
        $data = $request->all();
        if ($request->hasFile('images')) {
            $files = [];
            foreach ($request->file('images') as $image) {
                $files[] = File::upload($image, 'uploads/product-images');
            }
            $data['image'] = implode(',', $files);
        }
        $data = array_merge($data, ['vendor_id' => 1]);

        $product->update($data);

        return to_route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            File::delete($product->image);
        }
        $product->delete();

        return back();
    }
}
