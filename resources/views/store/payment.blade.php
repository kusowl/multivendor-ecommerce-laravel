<x-layouts.store>
    <x-store.page-header page="Payment"/>
    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="block billing-details">
                            <h4 class="widget-title">Billing Details</h4>
                            <input type="checkbox" id="sameBillingAddress">
                            <label for="sameBillingAddress">Same as shipping address</label>
                            <form class="checkout-form">
                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="user_address">Address</label>
                                    <input type="text" class="form-control" id="user_address" placeholder="">
                                </div>
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="user_post_code">Zip Code</label>
                                        <input type="text" class="form-control" id="user_post_code" name="zipcode"
                                               value="">
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
                            </form>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block billing-details">
                            <h4 class="widget-title">Pay</h4>
                            <button type="submit" class="btn btn-main" id="razorpay-btn"
                                    data-route="{{route('checkout.payment.razorpay', $cart)}}"
                            >
                                Pay via Razorpay
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @vite('resources/js/razorpay.js')
</x-layouts.store>
