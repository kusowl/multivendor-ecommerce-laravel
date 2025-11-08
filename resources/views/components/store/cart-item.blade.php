 @props(['cartProductDto'])
 <div class="media">
     <a class="pull-left" href="#!">
         <img class="media-object" src="{{\App\Utils\File::getImage($cartProductDto->product->images()->first())}}" alt="image"/>
     </a>
     <div class="media-body">
         <h4 class="media-heading"><a href="#!">{{$cartProductDto->product->name}}</a></h4>
         <div class="cart-price">
             <span>{{$cartProductDto->quantity}} x</span>
             <span>{{$cartProductDto->product->price}}</span>
         </div>
         <h5><strong>${{$cartProductDto->total}}</strong></h5>
     </div>
     <a href="#!" class="remove"><i class="tf-ion-close"></i></a>
 </div>
