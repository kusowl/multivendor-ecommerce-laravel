<x-layouts.store-tw>
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8 {{$cart->count() == 0 ? 'hidden': ''}}">
            <!-- Cart Items -->
            <div class="flex-1">
                <div class="flex gap-x-6 items-center mb-6">
                    <h1 class="text-3xl font-bold">Shopping Cart</h1>
                    <div class="badge badge-dash badge-secondary">{{$cart->count()}} items</div>
                </div>

                <!-- Cart Items List -->
                <div class="space-y-6">
                    <!-- Item -->
                    @foreach($cart->products as $item)
                        <div class="ui-card cart-item">
                            <div class="card-body">
                                <div class="flex flex-col md:flex-row gap-4">
                                    <div class="flex-shrink-0 h-32">
                                        <img
                                            src="{{\App\Utils\File::getImage($item->product->images()->first())}}"
                                            alt="{{$item->product->name}}"
                                            class="h-full object-center rounded-lg"/>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex justify-between">
                                            <a href="{{route('store.products.show', $item->product->slug)}}"
                                               class="card-title text-lg mr-4">{{$item->product->name}}</a>
                                            <form action="{{route('cart.product.delete', $item->product->slug)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-soft btn-sm btn-circle btn-error hover:text-red-100">
                                                    <i data-lucide="trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="flex flex-wrap justify-between items-center mt-4">
                                            <div class="flex items-center space-x-2">
                                                <span class="font-semibold">Quantity:</span>
                                                <div class="join">
                                                    <button class="btn join-item" onclick="decreaseQty(this)">-</button>
                                                    <input name="product_quantity"
                                                           class="input join-item w-16 rounded-lg text-center"
                                                           type="number"
                                                           value="{{$item->quantity}}" min="1"/>
                                                    <button class="btn join-item" onclick="increaseQty(this)">+</button>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-lg font-bold">${{$item->product->price}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Continue Shopping & Update Cart -->
                <div class="flex flex-col sm:flex-row justify-between items-center mt-8 gap-4">
                    <a href="{{route('store.products')}}" class="btn btn-dash border-gray-400 text-gray-500">
                        <i data-lucide="arrow-left"></i> Continue Shopping
                    </a>
                    <button class="btn btn-secondary btn-soft">
                        <i data-lucide="refresh-cw"></i> Update Cart
                    </button>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:w-1/3 mt-14">
                <div class="ui-card hover:shadow-xl sticky top-24">
                    <div class="card-body">
                        <h2 class="card-title text-2xl mb-4">Order Summary</h2>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between">
                                <span>Subtotal ( {{$cart->count()}} items )</span>
                                <span>${{$cart->cartPrices->subTotal}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span class="text-success">FREE</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Tax</span>
                                <span>${{$cart->cartPrices->fees}}</span>
                            </div>
                            <div class="flex justify-between text-lg font-bold mt-4 pt-4 border-t">
                                <span>Total</span>
                                <span>${{$cart->cartPrices->total}}</span>
                            </div>
                        </div>

                        <!-- Promo Code -->
                        <div class="mb-6">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Promo Code</span>
                                </label>
                                <div class="join w-full">
                                    <input type="text" placeholder="Enter code"
                                           class="input input-bordered border-blue-200 join-item flex-grow"/>
                                    <button class="btn btn-soft btn-primary join-item">Apply</button>
                                </div>
                            </div>
                        </div>

                        <!-- Checkout Button -->
                        <a href="{{route('checkout.index')}}" class="btn btn-primary btn-soft text-lg">
                            <i data-lucide="badge-check"></i> Proceed to Checkout
                        </a>

                        <!-- Security & Trust Badges -->
                        <div class="text-center mt-4">
                            <div class="flex justify-center space-x-4 mb-2 text-gray-500">
                                <i data-lucide="shield-ban"></i>
                                <i data-lucide="lock"></i>
                                <i data-lucide="credit-card"></i>
                            </div>
                            <p class="text-xs text-gray-500">Secure checkout guaranteed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Empty Cart State (Hidden by default) -->
        <div class=" {{$cart->count() != 0 ? 'hidden': ''}} empty-cart">

            <div class="container mx-auto px-4 py-16 text-center">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-6"></i>
                    <h2 class="text-3xl font-bold mb-4">Your cart is empty</h2>
                    <p class="text-gray-600 mb-8">Looks like you haven't added any items to your cart yet.</p>
                    <a href="/" class="btn btn-primary btn-lg">Start Shopping</a>
                </div>
            </div>
    </main>

    <script>
        // Quantity adjustment functionality
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.parentElement.querySelector('input');
                let value = parseInt(input.value);

                if (this.textContent === '+') {
                    value++;
                } else if (this.textContent === '-' && value > 1) {
                    value--;
                }

                input.value = value;
            });
        });

        // Remove item functionality
        document.querySelectorAll('.btn-ghost.text-error').forEach(button => {
            button.addEventListener('click', function () {
                const item = this.closest('.cart-item');
                item.style.opacity = '0';
                item.style.transform = 'translateX(100px)';
                setTimeout(() => {
                    item.remove();
                    // Update cart count and totals
                    updateCartSummary();
                }, 300);
            });
        });

        // Function to update cart summary (simplified for demo)
        function updateCartSummary() {
            // In a real app, this would recalculate totals based on remaining items
            const itemCount = document.querySelectorAll('.cart-item').length;
            if (itemCount === 0) {
                document.querySelector('main').style.display = 'none';
                document.querySelector('.empty-cart').classList.remove('hidden');
            }
        }
    </script>
</x-layouts.store-tw>
