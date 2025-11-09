@props(['product'])
<div class="col-md-4">
    <div class="product-item">
        <div class="product-thumb">
            <span class="bage">Sale</span>
            <img class="img-responsive" src="{{\App\Utils\File::getImage($product->images()->first())}}" alt="product-img"/>
            <div class="preview-meta">
                <ul>
                    <li>
                        <a href="{{route('store.products.show', $product->slug)}}"><i class="tf-ion-ios-search-strong"></i></a>
                    </li>
                    <li>
                        <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                    </li>
                    <li>
                        <form action="{{route('cart.store')}}" method="POST" id="cart-form">
                            @csrf
                            <input type="hidden" name="product_slug" value="{{$product->slug}}" />
                            <input type="hidden" name="product_quantity" value="1" />
                            <a href="javascript:void(0)" onclick="document.getElementById('cart-form').submit()"><i class="tf-ion-android-cart"></i></a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-content">
            <h4>
                <a href="{{route('store.products.show', $product->slug)}}" title={{$product->name}}>
                    <span>
                    {{trim(substr($product->name, 0, 40))}}
                    @if (strlen($product->name) > 40)
                    ...
                    @endif
                    </span>
                </a>
            </h4>
            <p class="price">${{$product->price}}</p>
        </div>
    </div>
</div>
