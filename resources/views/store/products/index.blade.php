<x-layouts.store-tw>
    <!-- Main Content -->
    <main class="container mx-auto my-8 px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <aside class="lg:w-1/5">
                <div class="bg-base-100 rounded-box shadow-sm p-6 sticky top-4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Filters</h2>
                        <button class="btn btn-sm btn-ghost">Clear All</button>
                    </div>

                    <!-- Categories -->
                    <div class="filter-section mb-6">
                        <h3 class="font-semibold text-lg mb-3">Categories</h3>
                        <ul class="menu bg-base-200 rounded-box w-full">
                            <li><a>All Categories</a></li>
                            @foreach($categories as $categoryDto)
                                <li>
                                    <details @if($categoryDto->id === $category->id) open @endif>
                                        <summary><a href="{{$categoryDto->link}}">{{$categoryDto->name}}</a></summary>
                                        <ul>
                                            @foreach($categoryDto->subCategories as $subCategoryDto)
                                                <li>
                                                    <a
                                                        @class(['menu-active' => isset($subCategory) && $subCategory->id === $subCategoryDto->id])
                                                        href="{{$subCategoryDto->link}}">{{$subCategoryDto->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </details>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Price Range -->
                    <div class="filter-section mb-6">
                        <h3 class="font-semibold text-lg mb-3">Price Range</h3>
                        <div class="space-y-4">
                            <div class="w-full max-w-xs">
                                <input type="range" min="0" max="100" value="25" class="range" step="25"/>
                                <div class="flex justify-between px-2.5 mt-2 text-xs">
                                    <span>|</span>
                                    <span>|</span>
                                    <span>|</span>
                                    <span>|</span>
                                    <span>|</span>
                                </div>
                                <div class="flex justify-between px-2.5 mt-2 text-xs">
                                    <span>1</span>
                                    <span>2</span>
                                    <span>3</span>
                                    <span>4</span>
                                    <span>5</span>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <span>$0</span>
                                <span>$1000</span>
                            </div>
                            <div class="flex gap-2">
                                <input type="number" placeholder="Min" class="input input-bordered w-1/2" value="0"/>
                                <input type="number" placeholder="Max" class="input input-bordered w-1/2" value="1000"/>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Product Grid -->
            <section class="lg:w-4/5">
                <!-- Results Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <div>
                        <h1 class="text-2xl font-bold">Search Results</h1>
                        <p class="text-base-content/70">Showing {{$products->count()}} products</p>
                    </div>
                    <div class="flex gap-2">
                        <div class="form-control">
                            <div class="input-group">
                                <span>Sort by:</span>
                                <select class="select select-bordered">
                                    <option selected>Relevance</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                    <option>Top Rated</option>
                                    <option>Newest</option>
                                </select>
                            </div>
                        </div>
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-outline md:hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                                Filters
                            </div>
                            <div tabindex="0"
                                 class="dropdown-content z-[1] card card-compact w-64 p-2 shadow bg-base-100 text-base-content">
                                <div class="card-body">
                                    <h3 class="card-title">Filters</h3>
                                    <p>Mobile filter content would go here</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Product Card 1 -->
                    @foreach($products as $product)
                        <div class="card bg-base-100 shadow-md product-card border border-base-300">
                            <figure class="px-4 pt-4 h-48 bg-base-100">
                                <img
                                    src="{{\App\Utils\File::getImage($product->images()->first())}}"
                                    alt="" class="rounded-xl h-full"/>
                            </figure>
                            <div class="card-body">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <a href="{{route('store.products.show', $product->slug)}}"
                                           class="card-title hover:link-primary">{{substr($product->name, 0, 50)}}
                                            ...</a>
                                        <p class="text-base-content/70">Electronics</p>
                                    </div>
                                </div>
                                <div class="card-actions justify-between items-center mt-4">
                                    <div class="text-xl font-bold">${{$product->price}}</div>
                                </div>
                                <div class="card-actions mt-4">
                                    <button class="btn btn-primary btn-soft btn-block">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <x-store.pagination :paginator="$products"/>
            </section>

        </div>
    </main>
</x-layouts.store-tw>
