<?php

it('creates a category', function () {
    $page = visit(route('dashboard.category'));
    $page->assertSee('Category Name');
    $page->fill('name', 'Test Category')
        ->click('Submit')
        ->assertUrlIs(route('dashboard.category'));
});

it('creates a sub category', function () {
    $parentCategory = \App\Models\Category::factory()->createOne();
    $page = visit(route('dashboard.sub-category.create'));
    $page->assertSee('Sub-Category Name');
    $page->fill('name', 'Test Sub-Category')
        ->click('Select parent category')
        ->assertSee($parentCategory->name)
        ->click($parentCategory->name)
        ->click('Submit')
        ->assertUrlIs(route('dashboard.sub-category.create'));

});
