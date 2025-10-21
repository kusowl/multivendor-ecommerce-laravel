<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubCategory::select('id', 'name', 'category_id')
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
                        'category_id' => $item->getAttribute('category')?->getAttribute('id'),
                        'parent_category_name' => $item->getAttribute('category')?->getAttribute('name'),
                    ];
                }
            );

        //        dd($data);
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
    public function store(StoreSubCategoryRequest $request)
    {
        $data = $request->only(['name', 'category_id']);
        $data['slug'] = Str::slug($data['name']);
        SubCategory::create($data);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
