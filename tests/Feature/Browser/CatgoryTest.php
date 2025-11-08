<?php

use App\Models\Category;

it('creates a category', function () {
    $page = visit(route('dashboard.category.create'));
    $page->assertSee('Category Name');
    $page->fill('name', 'Test Category')->click('Submit')->assertUrlIs(route('dashboard.category.create'));
});

test('Dashboard shows category details', function () {
    $category = Category::factory()->createOne();
    $page = visit(route('dashboard.category'));
    $page->assertSee($category->name);
});

it('creates a sub category', function () {
    $parentCategory = Category::factory()->createOne();
    $page = visit(route('dashboard.sub-category.create'));
    $page->assertSee('Sub-Category Name');
    $page
        ->fill('name', 'Test Sub-Category')
        ->click('Select parent category')
        ->assertSee($parentCategory->name)
        ->click($parentCategory->name)
        ->click('Submit')
        ->assertUrlIs(route('dashboard.sub-category.create'));
});

// This is test is disabled for pest bug
// it('Edits a category', function () {
//    $category = Category::factory()->createOne();
//    $page = visit(route('dashboard.category'));
//    $page->assertSee($category->name);
//    $page->click('//button[contains(@onclick, "editItem")]');
//    $page->assertUrlIs(route('dashboard.category.edit', $category->slug));
//    $page->fill('name', 'Test')
//        ->press('Update')
//        ->assertSee('Test');
// });

it('Deletes a category', function () {
    $category = Category::factory()->createOne();
    $page = visit(route('dashboard.category'));
    $page
        ->press('//button[contains(@onclick, "showModal")]')
        ->assertSee('Delete Category')
        ->press('Yes')
        ->screenshot()
        ->assertDontSee($category->name);
});

test('Store has Category page', function () {
    $category = Category::factory()->createOne();
    $page = visit(route('store.categories'));
    $page->assertSee('Categories')->assertSee($category->name);
});
