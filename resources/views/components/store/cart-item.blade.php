 @props(['cartProductDto'])
 <div class="media">
     <a class="pull-left" href="{{route('store.products.show', $cartProductDto->product->slug)}}">
         <img class="media-object" src="{{\App\Utils\File::getImage($cartProductDto->product->images()->first())}}" alt="image"/>
     </a>
     <div class="media-body">
         <h4 class="media-heading"><a href="{{route('store.products.show', $cartProductDto->product->slug)}}">{{substr($cartProductDto->product->name, 0, 45)}}...</a></h4>
         <div class="cart-price">
             <span>{{$cartProductDto->quantity}} x</span>
             <span>{{$cartProductDto->product->price}}</span>
         </div>
         <h5><strong>${{$cartProductDto->total}}</strong></h5>
     </div>
     <form  action="{{route('cart.product.delete', $cartProductDto->product->slug)}}" method="post">
         @csrf
         @method('DELETE')
         <button class="remove" type='submit'><i class="tf-ion-close"></i></button>
     </form>
 </div>
