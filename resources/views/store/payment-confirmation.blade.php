<x-layouts.store>
    <section class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @if($status === 'unknown')
                        <div class="block text-center">
                            <i class="tf-ion-android-checkmark-circle"></i>
                            <h2 class="text-center">Something gone wrong!</h2>
                            <p>If money is deducted wait for 3 hours to reflect.</p>
                            <a href="shop.html" class="btn btn-main mt-20">Continue Shopping</a>
                        </div>
                    @elseif($status === 'success')
                        <div class="block text-center">
                            <i class="tf-ion-android-checkmark-circle"></i>
                            <h2 class="text-center">Thank you! For your payment</h2>
                            <p>Redirecting in 5 seconds</p>
                            <a href="shop.html" class="btn btn-main mt-20">Click here if not</a>
                        </div>
                    @elseif($status === 'failed')
                        <div class="block text-center">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-banknote-x-icon lucide-banknote-x">
                                    <path d="M13 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5"/>
                                    <path d="m17 17 5 5"/>
                                    <path d="M18 12h.01"/>
                                    <path d="m22 17-5 5"/>
                                    <path d="M6 12h.01"/>
                                    <circle cx="12" cy="12" r="2"/>
                                </svg>
                            </div>
                            <h2 class="text-center">Payment failed !</h2>
                            <p>If money is deducted wait for 3 hours to reflect.</p>
                            <a href="shop.html" class="btn btn-main mt-20">Continue Shopping</a>
                        </div
                    @else
                        <div class="block text-center">
                            <i class="tf-ion-android-cross-circle"></i>
                            <h2 class="text-center">Sorry! <br/>looks like this payment do not exist</h2>
                            <p>If money is deducted wait for 3 hours to reflect.</p>
                            <a href="shop.html" class="btn btn-main mt-20">Continue Shopping</a>
                        </div
                    @endif

                </div>
            </div>
        </div>
    </section>
</x-layouts.store>
