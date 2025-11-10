@props(['order'])
<div class="ui-card order-card">
    <div class="mb-4 flex flex-col justify-between md:flex-row">
        <div>
            <h3 class="text-lg font-bold">Order #{{ $order->orderNo }}</h3>
            <p class="text-sm text-gray-500">Placed on October 28, 2023</p>
        </div>
        <div class="mt-2 md:mt-0">
            <span class="badge badge-success badge-lg">Delivered</span>
            <p class="mt-1 text-sm text-gray-500">Delivered on November 2, 2023</p>
        </div>
    </div>

    <div class="flex flex-col gap-6 md:flex-row">
        <div class="md:w-2/3">
            @foreach ($order->items as $product)
                <div class="mb-4 flex items-center gap-4">
                    <div class="avatar">
                        <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-gray-200">
                            <i class="fas fa-tshirt text-2xl text-gray-500"></i>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold">{{ $product->product->name }}</h4>
                        <p class="text-gray-500">Size: M, Color: Blue</p>
                        <p class="text-gray-500">Quantity: {{ $product->product->quantity }}</p>
                    </div>
                    <div class="ml-auto">
                        <p class="font-semibold">$24.99</p>
                    </div>
                </div>
            @endforeach

            <div class="border-t-base-300 flex justify-between border-t pt-4">
                <div>
                    <p class="text-gray-500">Shipping: <span class="font-medium">${{ $order->shippingFee }}</span></p>
                    <p class="text-gray-500">Tax: <span class="font-medium">$2.68</span></p>
                    <p class="text-gray-500">Discount: <span class="font-medium">${{ $order->discount }}</span></p>
                </div>
                <div class="text-right">
                    <p class="text-gray-500">Total</p>
                    <p class="text-xl font-bold">${{ $order->totalAmount }}</p>
                </div>
            </div>
        </div>

        <div class="border-l-base-300 fpt-4 border-l-0 md:w-1/3 md:border-l md:pl-6 md:pt-0">
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
