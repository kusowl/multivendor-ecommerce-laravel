<x-layouts.store>
    <x-store.page-header page="Checkout"/>
    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('checkout.address', $cart)}}" method="POST">
                            @csrf
                            <div class="block billing-details">
                                <h4 class="widget-title">Delivery Details</h4>
                                <a data-toggle="modal" data-target="#address-modal" href="#!">Add address</a>
                                <p>* Separate Billing address is available on prepaid orders, in payment page</p>
                            </div>
                            <div class="block">
                                <h4 class="widget-title">Payment Method</h4>
                                <input type="radio" name="payment_method" value="razorpay">
                                <label>Razorpay (Secure payment)</label>
                                <input type="radio" name="payment_method" value="pod">
                                <label>Pay on Delivery</label>
                                <x-error field="payment_method"/>
                            </div>
                            <button type="submit" class="btn btn-main">Place your order</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="product-checkout-details">
                            <div class="block">
                                <h4 class="widget-title">Order Summary</h4>
                                @foreach($products as $product)
                                    <div class="media product-card">
                                        <a class="pull-left" href="product-single.html">
                                            <img class="media-object"
                                                 src="{{\App\Utils\File::getImage(explode(",", $product->image)[0])}}"
                                                 alt="Image"/>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a
                                                    href="product-single.html">{{$product->name}}</a>
                                            </h4>
                                            <p class="price">{{ $product->pivot->quantity }} x ${{$product->price}}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="discount-code">
                                    <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter
                                            it here</a></p>
                                </div>
                                <ul class="summary-prices">
                                    <li>
                                        <span>Subtotal:</span>
                                        <span class="price">${{$prices->subTotal}}</span>
                                    </li>
                                    <li>
                                        <span>Shipping:</span>
                                        <span>{{$prices->fees === 0 ? 'Free' : $prices->fees }}</span>
                                    </li>
                                    <li>
                                        <span>Discount:</span>
                                        <span>${{$prices->discount }}</span>
                                    </li>
                                </ul>
                                <div class="summary-total">
                                    <span>Total</span>
                                    <span>${{$prices->total}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter Coupon Code">
                        </div>
                        <button type="submit" class="btn btn-main">Apply Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="address-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="checkout-form">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="full_name">Mobile Number</label>
                            <input type="text" class="form-control" id="full_name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="user_address">
                                Line 1 Address
                            </label>
                            <input type="text" class="form-control" id="user_address" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="user_address">
                                Line 2 Address
                            </label>
                            <input type="text" class="form-control" id="user_address" placeholder="">
                        </div>
                        <div class="checkout-country-code clearfix">
                            <div class="form-group">
                                <label for="user_post_code">Zip Code</label>
                                <input type="text" class="form-control" id="user_post_code" name="zipcode"
                                       value="" placeholder="6 digits [0-9] pincode">
                            </div>
                            <div class="form-group">
                                <label for="user_city">City</label>
                                <input type="text" class="form-control" id="user_city" name="city" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_country">Country</label>
                            <input type="text" class="form-control" id="user_country" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-main">Save Address</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.store>
