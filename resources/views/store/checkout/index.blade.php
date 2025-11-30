<x-layouts.store-tw>
    <!-- Main Checkout Section -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Checkout Steps & Forms -->
            <div class="flex-1">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold mb-2">Checkout</h1>
                </div>

                <!-- Delivery Address Section -->
                <div class="ui-card mb-8">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-4">
                            <i data-lucide="map-pin-house"></i>
                            Delivery Address
                        </h2>

                        <!-- Saved Addresses -->
                        <div class="mb-6">
                            <h3 class="font-semibold mb-3">Select a saved address</h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="saved-address ui-card cursor-pointer">
                                    <div class="card-body p-4">
                                        <div class="flex justify-between items-start">
                                            <h4 class="font-semibold">Home</h4>
                                            <div class="form-control">
                                                <label class="label cursor-pointer p-0">
                                                    <input type="radio" name="saved-address"
                                                           class="radio checked:radio-primary" checked/>
                                                </label>
                                            </div>
                                        </div>
                                        <p class="text-sm">John Doe</p>
                                        <p class="text-sm">123 Main Street, Apt 4B</p>
                                        <p class="text-sm">New York, NY 10001</p>
                                        <p class="text-sm">United States</p>
                                        <p class="text-sm">Phone: (555) 123-4567</p>
                                    </div>
                                </div>

                                <div class="saved-address ui-card cursor-pointer">
                                    <div class="card-body p-4">
                                        <div class="flex justify-between items-start">
                                            <h4 class="font-semibold">Work</h4>
                                            <div class="form-control">
                                                <label class="label cursor-pointer p-0">
                                                    <input type="radio" name="saved-address"
                                                           class="radio checked:bg-primary"/>
                                                </label>
                                            </div>
                                        </div>
                                        <p class="text-sm">John Doe</p>
                                        <p class="text-sm">456 Business Ave, Floor 12</p>
                                        <p class="text-sm">New York, NY 10005</p>
                                        <p class="text-sm">United States</p>
                                        <p class="text-sm">Phone: (555) 987-6543</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="divider">OR</div>

                        <!-- New Address Form -->
                        <div class="mb-4">
                            <h3 class="font-semibold mb-3">Add a new address</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Full Name *</span>
                                    </label>
                                    <input type="text" placeholder="Enter your full name" class="input input-bordered"/>
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Phone Number *</span>
                                    </label>
                                    <input type="tel" placeholder="Enter your phone number"
                                           class="input input-bordered"/>
                                </div>
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text">Address Line 1 *</span>
                                    </label>
                                    <input type="text" placeholder="Street address, P.O. box, company name"
                                           class="input input-bordered"/>
                                </div>
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text">Address Line 2</span>
                                    </label>
                                    <input type="text" placeholder="Apartment, suite, unit, building, floor, etc."
                                           class="input input-bordered"/>
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">City *</span>
                                    </label>
                                    <input type="text" placeholder="Enter your city" class="input input-bordered"/>
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">State/Province *</span>
                                    </label>
                                    <input type="text" placeholder="Enter your state" class="input input-bordered"/>
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">ZIP/Postal Code *</span>
                                    </label>
                                    <input type="text" placeholder="Enter ZIP code" class="input input-bordered"/>
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Country *</span>
                                    </label>
                                    <select class="select select-bordered">
                                        <option disabled selected>Select your country</option>
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>United Kingdom</option>
                                        <option>Australia</option>
                                        <option>India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-control mt-4">
                                <label class="label cursor-pointer justify-start">
                                    <input type="checkbox" class="checkbox checkbox-primary mr-2"/>
                                    <span class="label-text">Save this address for future orders</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Method Section -->
                <div class="ui-card  mb-8 checkout-step">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-4">
                            <i data-lucide="container"></i>
                            Shipping Method
                        </h2>
                        <div class="flex space-x-4">
                            <div class="form-control">
                                <label
                                    class="label cursor-pointer justify-start p-4 border gap-x-4  border-base-300 rounded-lg">
                                    <span class="label-text">
                                        <span class="font-semibold">Standard Shipping</span>
                                        <span class="block text-sm text-gray-500">5-7 business days</span>
                                    </span>
                                    <span class="ml-auto font-semibold text-success">FREE</span>
                                    <input type="radio" name="shipping" class="radio checked:radio-primary" checked/>

                                </label>
                            </div>
                            <div class="form-control">
                                <label
                                    class="label cursor-pointer justify-start p-4 gap-x-4 border-base-300 border rounded-lg">
                                    <span class="label-text">
                                        <span class="font-semibold">Express Shipping</span>
                                        <span class="block text-sm text-gray-500">2-3 business days</span>
                                    </span>
                                    <span class="ml-auto font-semibold">$9.99</span>
                                    <input type="radio" name="shipping" class="radio checked:bg-primary"/>

                                </label>
                            </div>
                            <div class="form-control">
                                <label
                                    class="label cursor-pointer justify-start p-4 gap-x-4 border border-base-300 rounded-lg">
                                    <span class="label-text">
                                        <span class="font-semibold">Next Day Delivery</span>
                                        <span class="block text-sm text-gray-500">1 business day</span>
                                    </span>
                                    <span class="ml-auto font-semibold">$19.99</span>
                                    <input type="radio" name="shipping" class="radio checked:bg-primary"/>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Method Section -->
                <div class="ui-card  mb-8 checkout-step">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-4">
                            <i data-lucide="banknote-arrow-up"></i>
                            Payment Method
                        </h2>
                        <form action="{{route('checkout.address', $cart->id)}}" id='payment-form' method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <!-- Razorpay Option -->
                                <div class="payment-option card bg-base-100 border border-base-300 selected">
                                    <div class="card-body p-4">
                                        <div class="flex justify-between items-start">
                                            <div class="flex items-center">
                                                <img src="https://razorpay.com/assets/razorpay-glyph.svg" alt="Razorpay"
                                                     class="h-8 mr-3"/>
                                                <div>
                                                    <h4 class="font-semibold">Razorpay</h4>
                                                    <p class="text-sm text-gray-500">Pay with UPI, Cards, Netbanking</p>
                                                </div>
                                            </div>
                                            <div class="form-control">
                                                <label class="label cursor-pointer p-0">
                                                    <input type="radio" name="payment_method" value="razorpay"
                                                           class="radio checked:radio-primary" checked/>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pay on Delivery Option -->
                                <div class="payment-option card bg-base-100 border border-base-300">
                                    <div class="card-body p-4">
                                        <div class="flex justify-between items-start">
                                            <div class="flex items-center">
                                                <i class="fas fa-money-bill-wave text-2xl text-green-500 mr-3"></i>
                                                <div>
                                                    <h4 class="font-semibold">Pay on Delivery</h4>
                                                    <p class="text-sm text-gray-500">Cash or Card when you receive</p>
                                                </div>
                                            </div>
                                            <div class="form-control">
                                                <label class="label cursor-pointer p-0">
                                                    <input type="radio" name="payment_method" value="pod"
                                                           class="radio checked:radio-primary"/>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-option card bg-base-100 border border-base-300 selected">
                                    <div class="card-body p-4">
                                        <div class="flex justify-between items-start">
                                            <div class="flex items-center">
                                                <div>
                                                    <h4 class="font-semibold">EMI</h4>
                                                    <p class="text-sm text-gray-500">Pay in installments. Will be
                                                        available
                                                        soon.</p>
                                                </div>
                                            </div>
                                            <div class="form-control">
                                                <label class="label cursor-pointer p-0">
                                                    <input type="radio" name="radio-11" class="radio" disabled
                                                           checked="checked"/>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <x-shared.error field="payment_method"/>

                            </div>
                        </form>

                        <!-- Payment Details (shown when Razorpay is selected) -->
                        <div id="razorpay-details" class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-semibold mb-3">Complete your payment with Razorpay</h4>
                            <p class="text-sm mb-4">You will be redirected to Razorpay's secure payment gateway to
                                complete your transaction.</p>
                            <div class="flex space-x-2 mb-4">
                                <img src="https://blog.razorpay.com/wp-content/uploads/2021/06/upi-logo.png" alt="UPI"
                                     class="h-8"/>
                                <img src="https://blog.razorpay.com/wp-content/uploads/2021/06/visa-logo.png" alt="Visa"
                                     class="h-8"/>
                                <img src="https://blog.razorpay.com/wp-content/uploads/2021/06/mastercard-logo.png"
                                     alt="Mastercard" class="h-8"/>
                                <img src="https://blog.razorpay.com/wp-content/uploads/2021/06/amex-logo.png" alt="Amex"
                                     class="h-8"/>
                                <img src="https://blog.razorpay.com/wp-content/uploads/2021/06/rupay-logo.png"
                                     alt="RuPay" class="h-8"/>
                            </div>
                        </div>

                        <!-- COD Message (shown when Pay on Delivery is selected) -->
                        <div id="cod-details" class="hidden bg-green-50 p-4 rounded-lg">
                            <h4 class="font-semibold mb-3">Pay when your order arrives</h4>
                            <p class="text-sm mb-2">You can pay with cash or card when you receive your delivery.</p>
                            <p class="text-sm text-gray-600">A small convenience fee of $2.00 may apply for cash on
                                delivery orders.</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                    <x-back/>
                    <x-button class="btn btn-soft btn-primary"
                              onclick="document.getElementById('payment-form').submit()">
                        Continue to Shipping
                        <i data-lucide="arrow-right"></i>
                    </x-button>
                </div>
            </div>
        </div>
    </main>
    <script>
        // Payment method selection
        document.querySelectorAll('input[name="payment-method"]').forEach(radio => {
            radio.addEventListener('change', function () {
                // Update visual selection
                document.querySelectorAll('.payment-option').forEach(option => {
                    option.classList.remove('selected');
                });
                this.closest('.payment-option').classList.add('selected');

                // Show/hide payment details
                if (this.value === 'razorpay' || this.previousElementSibling?.value === 'razorpay') {
                    document.getElementById('razorpay-details').classList.remove('hidden');
                    document.getElementById('cod-details').classList.add('hidden');
                } else {
                    document.getElementById('razorpay-details').classList.add('hidden');
                    document.getElementById('cod-details').classList.remove('hidden');
                }
            });
        });

        // Saved address selection
        document.querySelectorAll('input[name="saved-address"]').forEach(radio => {
            radio.addEventListener('change', function () {
                document.querySelectorAll('.saved-address').forEach(address => {
                    address.classList.remove('selected');
                });
                this.closest('.saved-address').classList.add('selected');
            });
        });

        // Form validation (simplified)
        document.querySelector('button.btn-primary').addEventListener('click', function (e) {
            const requiredFields = document.querySelectorAll('input[required]');
            let valid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    valid = false;
                    field.classList.add('input-error');
                } else {
                    field.classList.remove('input-error');
                }
            });

            if (!valid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    </script>
</x-layouts.store-tw>
