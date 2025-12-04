<x-layouts.store-tw>
    <style>
        .category-card {
            transition: transform 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-10px);
        }

        .product-card {
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
    </style>

    <div class="carousel w-full rounded-xl">
        <div id="slide1" class="carousel-item relative w-full">
            <img
                src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp"
                class="w-full "/>
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide4" class="btn btn-circle">❮</a>
                <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
            <img
                src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp"
                class="w-full "/>
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide1" class="btn btn-circle">❮</a>
                <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide3" class="carousel-item relative w-full">
            <img
                src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp"
                class="w-full "/>
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide2" class="btn btn-circle">❮</a>
                <a href="#slide4" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide4" class="carousel-item relative w-full">
            <img
                src="https://img.daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.webp"
                class="w-full "/>
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide3" class="btn btn-circle">❮</a>
                <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
        </div>
    </div>
    <!-- Features Section -->
    <section class="py-16 bg-base-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Why Shop With Us</h2>
                <p class="text-lg max-w-2xl mx-auto">We provide the best shopping experience with premium quality
                    products and exceptional customer service.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="feature-icon bg-primary/20 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold my-3">Free Shipping</h3>
                    <p>Free shipping on all orders over $50</p>
                </div>
                <div class="text-center">
                    <div class="feature-icon bg-secondary/20 text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold my-3">Secure Payment</h3>
                    <p>Your payment information is safe with us</p>
                </div>
                <div class="text-center">
                    <div class="feature-icon bg-accent/20 text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold my-3">Easy Returns</h3>
                    <p>30-day return policy for all items</p>
                </div>
                <div class="text-center">
                    <div class="feature-icon bg-info/20 text-info">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold my-3">24/7 Support</h3>
                    <p>Round-the-clock customer support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Categories Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Top Categories</h2>
                <p class="text-lg max-w-2xl mx-auto">Browse our most popular categories</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="category-card card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2067&q=80"
                            alt="Electronics" class="rounded-xl h-40 w-full object-cover"/>
                    </figure>
                    <div class="card-body items-center text-center py-6">
                        <h2 class="card-title">Electronics</h2>
                        <p>Latest gadgets & tech</p>
                    </div>
                </div>
                <div class="category-card card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1445205170230-053b83016050?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80"
                            alt="Fashion" class="rounded-xl h-40 w-full object-cover"/>
                    </figure>
                    <div class="card-body items-center text-center py-6">
                        <h2 class="card-title">Fashion</h2>
                        <p>Trendy clothing & accessories</p>
                    </div>
                </div>
                <div class="category-card card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2058&q=80"
                            alt="Home & Garden" class="rounded-xl h-40 w-full object-cover"/>
                    </figure>
                    <div class="card-body items-center text-center py-6">
                        <h2 class="card-title">Home & Garden</h2>
                        <p>Furniture & decor</p>
                    </div>
                </div>
                <div class="category-card card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            alt="Sports" class="rounded-xl h-40 w-full object-cover"/>
                    </figure>
                    <div class="card-body items-center text-center py-6">
                        <h2 class="card-title">Sports</h2>
                        <p>Equipment & apparel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Products Section -->
    <section class="py-16 bg-base-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Top Products</h2>
                <p class="text-lg max-w-2xl mx-auto">Check out our best-selling items</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product 1 -->
                <div class="product-card card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            alt="Wireless Headphones" class="rounded-xl h-48 w-full object-cover"/>
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Wireless Headphones</h2>
                        <p>Premium sound quality with noise cancellation</p>
                        <div class="card-actions justify-between items-center mt-4">
                            <span class="text-xl font-bold">$129.99</span>
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="product-card card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1999&q=80"
                            alt="Smart Watch" class="rounded-xl h-48 w-full object-cover"/>
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Smart Watch</h2>
                        <p>Track your fitness and stay connected</p>
                        <div class="card-actions justify-between items-center mt-4">
                            <span class="text-xl font-bold">$199.99</span>
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="product-card card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2064&q=80"
                            alt="Backpack" class="rounded-xl h-48 w-full object-cover"/>
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Travel Backpack</h2>
                        <p>Durable and spacious for all your adventures</p>
                        <div class="card-actions justify-between items-center mt-4">
                            <span class="text-xl font-bold">$79.99</span>
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="product-card card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img
                            src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2064&q=80"
                            alt="Sneakers" class="rounded-xl h-48 w-full object-cover"/>
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Running Sneakers</h2>
                        <p>Comfort and style for your active lifestyle</p>
                        <div class="card-actions justify-between items-center mt-4">
                            <span class="text-xl font-bold">$89.99</span>
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-12">
                <button class="btn btn-outline btn-primary">View All Products</button>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Subscribe to Our Newsletter</h2>
            <p class="text-lg mb-8">Get the latest updates on new products and upcoming sales</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <input type="text" placeholder="Your email address" class="input input-bordered w-full max-w-xs"/>
                <button class="btn btn-primary">Subscribe</button>
            </div>
        </div>
    </section>

    <script>
        // Simple parallax effect for hero text
        window.addEventListener('scroll', function () {
            const scrolled = window.pageYOffset;
            const parallaxTexts = document.querySelectorAll('.parallax-text');

            parallaxTexts.forEach(text => {
                const speed = 0.5;
                text.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    </script>
</x-layouts.store-tw>

