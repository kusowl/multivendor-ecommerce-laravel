<x-layouts.store-tw>
    <!-- Main Checkout Section -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Checkout Steps & Forms -->
            <div class="flex-1">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold mb-2">Payment</h1>
                </div>

                <!-- Billing Address Section -->
                <div class="ui-card mb-8">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-4">
                            <i data-lucide="map-pin-pen"></i>
                            Billing Address
                        </h2>

                        <div class="form-control mt-4">
                            <label class="label cursor-pointer justify-start">
                                <input type="checkbox" class="checkbox checkbox-primary mr-2"/>
                                <span class="label-text">Same address as delivery</span>
                            </label>
                        </div>

                        <div class="divider">OR</div>

                        <!-- New Address Form -->
                        <div class="mb-4">
                            <h3 class="font-semibold mb-3">Fill billing address</h3>
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

                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                    <x-back/>
                    <x-button type="submit" class="btn btn-primary" id="razorpay-btn"
                              data-route="{{route('checkout.payment.razorpay', $cart)}}"
                    >
                        <i data-lucide="badge-indian-rupee"></i>
                        Pay via Razorpay
                    </x-button>
                </div>
            </div>
        </div>
    </main>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @vite('resources/js/razorpay.js')
</x-layouts.store-tw>
