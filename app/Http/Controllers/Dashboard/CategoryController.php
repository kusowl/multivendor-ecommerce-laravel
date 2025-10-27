<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Utils\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::select('slug', 'name', 'image')->paginate(12)->toArray();

        return view('dashboard.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->only(['name', 'slug']);
        if ($request->hasFile('image')) {
            $data['image'] = File::upload($request->file('image'), 'uploads/product-images');
        }
        Category::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $data = $request->only(['name', 'slug']);

        // If user is deleting existing image
        if ($category->image != null && ! $request->hasFile('image')) {
            File::delete($category->image);
            $data['image'] = null;
        }

        if ($request->hasFile('image')) {
            // If user is updating the image then delete the existing image file, else user is uploading image for first time
            if ($category->image != null) {
                File::delete($category->image);
            }
            $data['image'] = File::upload($request->file('image'), 'uploads/product-images');
        }
        $category->update($data);

        return to_route('dashboard.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            File::delete($category->image);
        }
        $category->delete();

        return back();
    }

    public function subCategories(Category $category)
    {
        $subCategories = $category->subCategory()->select(['id', 'name', 'slug'])->get();

        return response()->json($subCategories);
    }
}
