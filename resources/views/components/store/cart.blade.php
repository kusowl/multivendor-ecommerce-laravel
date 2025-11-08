 <a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
     <i class="tf-ion-android-cart"></i>
     Cart <span class="">{{$cart->count()}}</span>
 </a>
 <div class="dropdown-menu cart-dropdown" style="right: revert !important;">
     @if ($cart->count() > 0)
        @foreach ($cart->products as $product)
        <x-store.cart-item :cartProductDto="$product" />
        @endforeach
      <h6>and more...</h6>
     <div class="cart-summary">
         <span>Total*</span>
         <span class="total-price">${{$cart->cartPrices->total}}</span>
     </div>
     <h6>*includes discount & fees</h6>
     <ul class="text-center cart-buttons">
         <li><a href="cart.html" class="btn btn-small">View Cart</a></li>
         <li><a href="checkout.html" class="btn btn-small btn-solid-border">Checkout</a></li>
     </ul>
     @else
     <p>Add items to cart.</p>
     @endif
 </div>
