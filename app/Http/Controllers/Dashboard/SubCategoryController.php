<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubCategory::select('id', 'name', 'slug', 'category_id')
            ->with(
                'category:id,name'
            )
            ->paginate(12)
            ->through(
                function ($item) {
                    /** @var SubCategory $item */
                    return [
                        'id' => $item->getAttribute('id'),
                        'name' => $item->getAttribute('name'),
                        'slug' => $item->getAttribute('slug'),
                        'category_id' => $item->getAttribute('category')?->getAttribute('id'),
                        'parent_category_name' => $item->getAttribute('category')?->getAttribute('name'),
                    ];
                }
            )->toArray();

        return view('dashboard.sub-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveSubCategoryRequest $request)
    {
        SubCategory::create($request->only(['name', 'category_id', 'slug']));

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();

        return view('dashboard.sub-category.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveSubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->only(['slug', 'name', 'category_id']));

        return to_route('dashboard.sub-category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        return back();
    }
}
