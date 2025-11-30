<x-layouts.store-tw :title="$title">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">My Orders</h1>
        <p class="mt-2 text-gray-600">Track and manage your orders</p>
    </div>

    <!-- Search and Filter -->
    <div class="ui-card mb-6">
        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            <form action="" method="POST" class="flex gap-x-3">
                @csrf
                <select class="select" name="order_status">
                    <option selected>All Orders</option>
                    <option value="{{ \App\Enums\Order\OrderStatus::Pending }}">Pending</option>
                    <option value="{{ \App\Enums\Order\OrderStatus::Processing }}">Processing</option>
                    <option value="{{ \App\Enums\Order\OrderStatus::Shipped }}">Shipped</option>
                    <option value="{{ \App\Enums\Order\OrderStatus::Delivered }}">Delivered</option>
                    <option value="{{ \App\Enums\Order\OrderStatus::Cancelled }}">Cancelled</option>
                    <option value="{{ \App\Enums\Order\OrderStatus::Refunded }}">Refunded</option>
                </select>
                <select class="select" name="duration">
                    <option selected value="30">Last 30 days</option>
                    <option value="7">Last 7 days</option>
                    <option value="90">Last 90 days</option>
                    <option value="365">Last year</option>
                    <option>All time</option>
                </select>
                <button class="btn btn-soft btn-neutral">Apply</button>
            </form>
            {{-- Search orders --}}
            <form action="" method="">
                @csrf
                <div class="join">
                    <div>
                        <label class="input join-item outline-0">
                            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                   stroke="currentColor">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </g>
                            </svg>
                            <input type="search" name="search" required placeholder="Search"/>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-neutral btn-soft join-item">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Orders List -->
    <div class="space-y-6">
        @php
            ds($orders);
        @endphp
        @foreach ($orders->items as $order)
            <x-store.order.order-item :order="$order"/>
        @endforeach
        <!-- Order 1 - Delivered -->
        <div class="ui-card order-card">
            <div class="mb-4 flex flex-col justify-between md:flex-row">
                <div>
                    <h3 class="text-lg font-bold">Order #</h3>
                    <p class="text-sm text-gray-500">Placed on October 28, 2023</p>
                </div>
                <div class="mt-2 md:mt-0">
                    <span class="badge badge-success badge-lg">Delivered</span>
                    <p class="mt-1 text-sm text-gray-500">Delivered on November 2, 2023</p>
                </div>
            </div>

            <div class="flex flex-col gap-6 md:flex-row">
                <div class="md:w-2/3">
                    <div class="mb-4 flex items-center gap-4">
                        <div class="avatar">
                            <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-gray-200">
                                <i class="fas fa-tshirt text-2xl text-gray-500"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold">Casual Summer T-Shirt</h4>
                            <p class="text-gray-500">Size: M, Color: Blue</p>
                            <p class="text-gray-500">Quantity: 1</p>
                        </div>
                        <div class="ml-auto">
                            <p class="font-semibold">$24.99</p>
                        </div>
                    </div>

                    <div class="mb-4 flex items-center gap-4">
                        <div class="avatar">
                            <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-gray-200">
                                <i class="fas fa-socks text-2xl text-gray-500"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold">Athletic Socks (3-Pack)</h4>
                            <p class="text-gray-500">Size: 9-11, Color: White</p>
                            <p class="text-gray-500">Quantity: 1</p>
                        </div>
                        <div class="ml-auto">
                            <p class="font-semibold">$12.99</p>
                        </div>
                    </div>

                    <div class="flex justify-between border-t pt-4">
                        <div>
                            <p class="text-gray-500">Shipping: <span class="font-medium">$4.99</span></p>
                            <p class="text-gray-500">Tax: <span class="font-medium">$2.68</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-500">Total</p>
                            <p class="text-xl font-bold">$45.65</p>
                        </div>
                    </div>
                </div>

                <div class="border-l-0 pt-4 md:w-1/3 md:border-l md:pl-6 md:pt-0">
                    <h4 class="mb-3 font-semibold">Order Tracking</h4>
                    <div class="mb-4 space-y-1">
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Order Placed</p>
                            <p class="text-xs text-gray-500">Oct 28, 2023</p>
                        </div>
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Order Confirmed</p>
                            <p class="text-xs text-gray-500">Oct 28, 2023</p>
                        </div>
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Shipped</p>
                            <p class="text-xs text-gray-500">Oct 30, 2023</p>
                        </div>
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Out for Delivery</p>
                            <p class="text-xs text-gray-500">Nov 2, 2023</p>
                        </div>
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Delivered</p>
                            <p class="text-xs text-gray-500">Nov 2, 2023</p>
                        </div>
                    </div>

                    <div class="mt-6 flex flex-col gap-2">
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-redo-alt mr-2"></i> Reorder
                        </button>
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-file-invoice mr-2"></i> View Invoice
                        </button>
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-star mr-2"></i> Rate Products
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order 2 - In Transit -->
        <div class="order-card rounded-lg bg-white p-6 shadow">
            <div class="mb-4 flex flex-col justify-between md:flex-row">
                <div>
                    <h3 class="text-lg font-bold">Order #ORD-7935</h3>
                    <p class="text-sm text-gray-500">Placed on November 5, 2023</p>
                </div>
                <div class="mt-2 md:mt-0">
                    <span class="badge badge-info badge-lg">In Transit</span>
                    <p class="mt-1 text-sm text-gray-500">Expected by November 12, 2023</p>
                </div>
            </div>

            <div class="flex flex-col gap-6 md:flex-row">
                <div class="md:w-2/3">
                    <div class="mb-4 flex items-center gap-4">
                        <div class="avatar">
                            <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-gray-200">
                                <i class="fas fa-laptop text-2xl text-gray-500"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold">Wireless Bluetooth Headphones</h4>
                            <p class="text-gray-500">Color: Black</p>
                            <p class="text-gray-500">Quantity: 1</p>
                        </div>
                        <div class="ml-auto">
                            <p class="font-semibold">$89.99</p>
                        </div>
                    </div>

                    <div class="flex justify-between border-t pt-4">
                        <div>
                            <p class="text-gray-500">Shipping: <span class="font-medium">Free</span></p>
                            <p class="text-gray-500">Tax: <span class="font-medium">$7.20</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-500">Total</p>
                            <p class="text-xl font-bold">$97.19</p>
                        </div>
                    </div>
                </div>

                <div class="border-l-0 pt-4 md:w-1/3 md:border-l md:pl-6 md:pt-0">
                    <h4 class="mb-3 font-semibold">Order Tracking</h4>
                    <div class="mb-4 space-y-1">
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Order Placed</p>
                            <p class="text-xs text-gray-500">Nov 5, 2023</p>
                        </div>
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Order Confirmed</p>
                            <p class="text-xs text-gray-500">Nov 5, 2023</p>
                        </div>
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Shipped</p>
                            <p class="text-xs text-gray-500">Nov 7, 2023</p>
                        </div>
                        <div class="tracking-step active">
                            <p class="text-sm font-medium">Out for Delivery</p>
                            <p class="text-xs text-gray-500">Expected Nov 12, 2023</p>
                        </div>
                        <div class="tracking-step">
                            <p class="text-sm font-medium">Delivered</p>
                            <p class="text-xs text-gray-500">Pending</p>
                        </div>
                    </div>

                    <div class="mb-4 rounded-lg bg-blue-50 p-3">
                        <p class="text-sm font-medium text-blue-800">
                            <i class="fas fa-truck mr-2"></i> Your package is in transit
                        </p>
                        <p class="mt-1 text-xs text-blue-600">Last update: Departed from Chicago, IL</p>
                    </div>

                    <div class="flex flex-col gap-2">
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-map-marker-alt mr-2"></i> Track Package
                        </button>
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-file-invoice mr-2"></i> View Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order 3 - Processing -->
        <div class="order-card rounded-lg bg-white p-6 shadow">
            <div class="mb-4 flex flex-col justify-between md:flex-row">
                <div>
                    <h3 class="text-lg font-bold">Order #ORD-8012</h3>
                    <p class="text-sm text-gray-500">Placed on November 9, 2023</p>
                </div>
                <div class="mt-2 md:mt-0">
                    <span class="badge badge-warning badge-lg">Processing</span>
                    <p class="mt-1 text-sm text-gray-500">Preparing for shipment</p>
                </div>
            </div>

            <div class="flex flex-col gap-6 md:flex-row">
                <div class="md:w-2/3">
                    <div class="mb-4 flex items-center gap-4">
                        <div class="avatar">
                            <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-gray-200">
                                <i class="fas fa-book text-2xl text-gray-500"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold">Design Patterns: Elements of Reusable Object-Oriented
                                Software</h4>
                            <p class="text-gray-500">Hardcover</p>
                            <p class="text-gray-500">Quantity: 1</p>
                        </div>
                        <div class="ml-auto">
                            <p class="font-semibold">$49.99</p>
                        </div>
                    </div>

                    <div class="flex justify-between border-t pt-4">
                        <div>
                            <p class="text-gray-500">Shipping: <span class="font-medium">$3.99</span></p>
                            <p class="text-gray-500">Tax: <span class="font-medium">$4.30</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-500">Total</p>
                            <p class="text-xl font-bold">$58.28</p>
                        </div>
                    </div>
                </div>

                <div class="border-l-0 pt-4 md:w-1/3 md:border-l md:pl-6 md:pt-0">
                    <h4 class="mb-3 font-semibold">Order Tracking</h4>
                    <div class="mb-4 space-y-1">
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Order Placed</p>
                            <p class="text-xs text-gray-500">Nov 9, 2023</p>
                        </div>
                        <div class="tracking-step completed">
                            <p class="text-sm font-medium">Order Confirmed</p>
                            <p class="text-xs text-gray-500">Nov 9, 2023</p>
                        </div>
                        <div class="tracking-step active">
                            <p class="text-sm font-medium">Processing</p>
                            <p class="text-xs text-gray-500">In progress</p>
                        </div>
                        <div class="tracking-step">
                            <p class="text-sm font-medium">Shipped</p>
                            <p class="text-xs text-gray-500">Pending</p>
                        </div>
                        <div class="tracking-step">
                            <p class="text-sm font-medium">Delivered</p>
                            <p class="text-xs text-gray-500">Pending</p>
                        </div>
                    </div>

                    <div class="mb-4 rounded-lg bg-amber-50 p-3">
                        <p class="text-sm font-medium text-amber-800">
                            <i class="fas fa-clock mr-2"></i> We're preparing your order
                        </p>
                        <p class="mt-1 text-xs text-amber-600">Expected to ship within 2 business days</p>
                    </div>

                    <div class="flex flex-col gap-2">
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-file-invoice mr-2"></i> View Invoice
                        </button>
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-times-circle mr-2"></i> Cancel Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        <div class="join">
            <button class="join-item btn btn-sm">1</button>
            <button class="join-item btn btn-sm btn-active">2</button>
            <button class="join-item btn btn-sm">3</button>
            <button class="join-item btn btn-sm">...</button>
            <button class="join-item btn btn-sm">8</button>
        </div>
    </div>
</x-layouts.store-tw>
