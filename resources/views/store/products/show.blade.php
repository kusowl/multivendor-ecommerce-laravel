<x-layouts.store-tw>
    @vite('resources/css/tiny-mce-store.css')
    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 py-4">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{route('store.categories.show', $category)}}">{{$category->name}}</a></li>
                <li>
                    <a href="{{route('store.categories.subCategories.show', [$category, $subCategory->slug])}}">{{$subCategory->name}}</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Product Section -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-8">
            <!-- Product Images -->
            <div>
                <div class="carousel rounded-box border border-base-300 w-full h-96 mb-4">
                    @foreach($product->images()->all() as $index => $image)
                        <div id="item{{$index}}" class="carousel-item w-full h-96 flex justify-center bg-base-100">
                            <img
                                src="{{\App\Utils\File::getImage($image)}}"
                                class="h-full p-6"/>
                        </div>
                    @endforeach
                </div>
                <div class="w-full flex flex-wrap gap-4">
                    @foreach($product->images()->all() as $index => $image)
                        <div class="ui-card w-16 h-20 p-0">
                            <a href="#item{{$index}}" class="h-20">
                                <img
                                    src="{{\App\Utils\File::getImage($image)}}"
                                    class="h-full p-2 w-auto" alt="Thumbnail {{$index}}"/>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-4xl font-bold mb-2">{{$product->name}}</h1>
                <div class="flex items-center mb-4">
                    <div class="rating rating-md rating-half">
                        <input type="radio" name="rating-10" class="rating-hidden"/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-1"/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-2"/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-1" checked/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-2"/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-1"/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-2"/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-1"/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-2"/>
                        <input type="radio" name="rating-10" class="bg-green-500 mask mask-star-2 mask-half-1"/>
                    </div>
                    <span class="ml-2 text-sm">4.5/5 • 128 Reviews</span>
                </div>

                <div class="mb-6">
                    <span class="text-3xl font-bold text-primary">${{$product->price}}</span>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Color Options</h3>
                    <div class="flex space-x-4">
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <input type="radio" name="color" class="radio checked:bg-black" checked/>
                                <span class="label-text ml-2">Matte Black</span>
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <input type="radio" name="color" class="radio checked:bg-silver"/>
                                <span class="label-text ml-2">Silver</span>
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <input type="radio" name="color" class="radio checked:bg-blue-500"/>
                                <span class="label-text ml-2">Navy Blue</span>
                            </label>
                        </div>
                    </div>
                </div>

                <form action="" method="post" id="productForm">
                    @csrf
                    <input type="hidden" name="product_slug" value="{{$product->slug}}">
                    <div class="flex flex-wrap gap-4 mb-6">
                        <div class="join">
                            <button class="btn join-item">-</button>
                            <input name="product_quantity" class="input join-item w-16 rounded-lg text-center"
                                   type="number"
                                   value="1" min="1"/>
                            <button class="btn join-item">+</button>
                        </div>
                        <x-button type="button" id='cart' class="btn-primary" icon="shopping-cart"
                                  data-action="/api/cart/">Add to Cart
                        </x-button>
                        <x-button type="button" class="btn-secondary" icon="handshake"
                                  data-action="{{route('checkout.entry.buynow')}}">
                            Buy Now
                        </x-button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Product Details Tabs -->
        <div class="tabs tabs-lift">
            <input type="radio" name="my_tabs_3" class="tab" aria-label="Description" checked="checked"/>
            <div class="tab-content bg-base-100 border-base-300 p-6">
                <div class="product_description_tiny_mce">
                    {!! $product->description !!}
                </div>
            </div>

            <input type="radio" name="my_tabs_3" class="tab" aria-label="Specifications"/>
            <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 2</div>

            <input type="radio" name="my_tabs_3" class="tab" aria-label="FAQ"/>
            <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 3</div>
        </div>

        <!-- Customer Reviews -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8">Customer Reviews</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Review 1 -->
                <div class="card bg-base-100 shadow-md review-card">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <div class="avatar mr-4">
                                <div class="w-12 rounded-full">
                                    <img
                                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"/>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold">Sarah Johnson</h4>
                                <div class="rating rating-sm">
                                    <input type="radio" name="rating-1" class="mask mask-star" checked/>
                                    <input type="radio" name="rating-1" class="mask mask-star" checked/>
                                    <input type="radio" name="rating-1" class="mask mask-star" checked/>
                                    <input type="radio" name="rating-1" class="mask mask-star" checked/>
                                    <input type="radio" name="rating-1" class="mask mask-star" checked/>
                                </div>
                            </div>
                        </div>
                        <h3 class="font-semibold mb-2">Best headphones I've ever owned!</h3>
                        <p class="text-sm">The sound quality is incredible and the noise cancellation works perfectly. I
                            can wear them for hours without any discomfort. Highly recommend!</p>
                        <div class="card-actions justify-end mt-4">
                            <div class="badge badge-outline">Verified Purchase</div>
                            <div class="text-xs text-gray-500">2 days ago</div>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="card bg-base-100 shadow-md review-card">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <div class="avatar mr-4">
                                <div class="w-12 rounded-full">
                                    <img
                                        src="https://img.daisyui.com/images/stock/photo-1535713875002-d1d0cf377fde.jpg"/>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold">Michael Chen</h4>
                                <div class="rating rating-sm">
                                    <input type="radio" name="rating-2" class="mask mask-star" checked/>
                                    <input type="radio" name="rating-2" class="mask mask-star" checked/>
                                    <input type="radio" name="rating-2" class="mask mask-star" checked/>
                                    <input type="radio" name="rating-2" class="mask mask-star" checked/>
                                    <input type="radio" name="rating-2" class="mask mask-star"/>
                                </div>
                            </div>
                        </div>
                        <h3 class="font-semibold mb-2">Great value for the price</h3>
                        <p class="text-sm">Battery life is as advertised. Comfortable for long sessions. The only minor
                            issue is the case is a bit bulky, but overall very satisfied.</p>
                        <div class="card-actions justify-end mt-4">
                            <div class="badge badge-outline">Verified Purchase</div>
                            <div class="text-xs text-gray-500">1 week ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <button class="btn btn-outline">Load More Reviews</button>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8">You Might Also Like</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            alt="Wireless Earbuds" class="rounded-xl h-48 object-cover w-full"/>
                    </figure>
                    <div class="card-body p-4">
                        <h3 class="card-title text-lg">AudioTech Air Buds</h3>
                        <p class="text-primary font-bold">$129.99</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1545454675-3531b543be5d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            alt="Portable Speaker" class="rounded-xl h-48 object-cover w-full"/>
                    </figure>
                    <div class="card-body p-4">
                        <h3 class="card-title text-lg">AudioTech Boom Speaker</h3>
                        <p class="text-primary font-bold">$89.99</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1599669454699-248893623440?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            alt="Gaming Headset" class="rounded-xl h-48 object-cover w-full"/>
                    </figure>
                    <div class="card-body p-4">
                        <h3 class="card-title text-lg">AudioTech Gamer Pro</h3>
                        <p class="text-primary font-bold">$179.99</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            alt="Vinyl Player" class="rounded-xl h-48 object-cover w-full"/>
                    </figure>
                    <div class="card-body p-4">
                        <h3 class="card-title text-lg">AudioTech Retro Player</h3>
                        <p class="text-primary font-bold">$299.99</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript" defer>
        document.querySelectorAll('#productForm button').forEach(button => {
            button.addEventListener('click', async (event) => {
                console.log(event.currentTarget);
                const button = new Button(event.currentTarget);
                button.toggleLoad()
                const form = document.getElementById('productForm');
                const formData = new FormData(form);
                const action = event.currentTarget.getAttribute('data-action');
                try {

                    const response = await axios.post(action, formData);
                    const data = response.data;
                    if (data.redirect) {
                        window.location.href = data.redirect.url;
                    }

                    await fetchCart();

                    button.toggleLoad()
                    toast.show('added to Cart !', 'success');
                } catch (error) {
                    if (error.response.status === 401) {
                        window.location.href = '/login'
                    } else if (error.response.status === 418) {
                        window.location.reload();
                    } else {
                        toast.show('Something gone wrong!', 'error');
                        console.error('Something gone wrong');
                    }
                    button.toggleLoad()
                }
            })
        })

    </script>
</x-layouts.store-tw>
