<x-layouts.store :title="$title">
<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
              @if($cart->count() === 0)
                <div class="col-md-8">
                    <p class="text-center">Cart is empty !</p>
                </div>
              @else
                <div class="product-list">
                    <table class="table">
                    <thead>
                        <tr>
                        <th class="">Item Name</th>
                        <th class="">Item Price</th>
                        <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cart->products as $cartItem)
                        <tr class="">
                        <td class="">
                            <div class="product-info">
                            <img width="80" src="{{\App\Utils\File::getImage($cartItem->product->images()->first())}}" alt="" />
                            <a href="{{route('store.products.show', $cartItem->product->slug)}}">{{substr($cartItem->product->name, 0, 44)}}...</a>
                            </div>
                        </td>
                        <td>${{$cartItem->total}}</td>
                        <td>
                            <form action="{{route('cart.product.delete', $cartItem->product->slug)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-main btn-small btn-round-full" type='submit'>Remove</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <a href="checkout.html" class="btn btn-main pull-right">Checkout</a>
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-layouts.store>
