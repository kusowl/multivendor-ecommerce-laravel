<?php

namespace App\Http\Controllers\Store;

use App\Dto\Category\CategoryDto;
use App\Dto\Product\ProductItemDto;
use App\Dto\SubCategory\SubCategoryDto;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Utils\TitleBuilder;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\View\View;

class StoreCategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('subCategories')->get()->chunk(3);
        $title = new TitleBuilder()->add('Categories')->build();

        return view('store.categories.index')->with('categories', $categories)->with('title', $title);
    }

    public function show(Category $category)
    {
        $categories = Category::with('subCategories')
            ->get()
            ->map(function ($categoryItem) {
                $subCategories = $categoryItem
                    ->subCategories()
                    ->get()
                    ->map(fn ($item) => new SubCategoryDto(
                        id: $item->id,
                        name: $item->name,
                        slug: $item->slug,
                        link: route('store.categories.subCategories.show', [$categoryItem, $item->slug]),
                    ));

                return new CategoryDto(
                    id: $categoryItem->id,
                    name: $categoryItem->name,
                    slug: $categoryItem->slug,
                    image: $categoryItem->image,
                    link: route('store.categories.show', $categoryItem),
                    subCategories: $subCategories,
                );
            });

        $products = $category->productes()->paginate(config('app.pagination_count'))->through(fn ($item) => ProductItemDto::fromModel($item));

        $title = new TitleBuilder()->add($category->name)->build();

        return view('store.products.index')
            ->with('categories', $categories)
            ->with('category', $category)
            ->with('products', $products)
            ->with('title', $title);
    }

    public function showSubCategory(Category $category, $subCategorySlug)
    {
        $categories = Category::with('subCategories')->get()->map(function ($categoryItem) {
            $subCategories = $categoryItem
                ->subCategories()
                ->get()
                ->map(fn ($item) => new SubCategoryDto(
                    id: $item->id,
                    name: $item->name,
                    slug: $item->slug,
                    link: route('store.categories.subCategories.show', [$categoryItem, $item->slug]),
                ));

            return new CategoryDto(
                id: $categoryItem->id,
                name: $categoryItem->name,
                slug: $categoryItem->slug,
                image: $categoryItem->image,
                link: route('store.categories.show', $categoryItem),
                subCategories: $subCategories,
            );
        });

        try {
            $subCategory = SubCategory::where('slug', $subCategorySlug)->get()->sole();
            $products = $subCategory->products()->paginate(config('app.pagination_count'))->through(fn ($item) => ProductItemDto::fromModel($item));

            $title = new TitleBuilder()->add($subCategory->name)->build();

            return view('store.products.index')
                ->with('products', $products)
                ->with('category', $category)
                ->with('subCategory', $subCategory)
                ->with('categories', $categories)
                ->with('title', $title);
        } catch (ItemNotFoundException) {
            abort(404);
        }
    }
}
