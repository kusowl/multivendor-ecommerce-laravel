<x-layouts.store>
    @vite('resources/css/tiny-mce-store.css')
    <x-store.page-header page="{{$product->name}}"/>
    @if(session('message'))
        <section>
            <p class="text-center">{{session('message')}}</p>
        </section>
    @endif
    @if(session('error'))
        <section>
            <p class="text-center">{{session('error')}}</p>
        </section>
    @endif
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-slider">
                        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                            <div class='carousel-outer'>
                                <!-- me art lab slider -->
                                <div class='carousel-inner'>
                                    @foreach(explode(',', $product->image) as $index => $image)
                                        <div class='item {{ $index == 0 ? "active" : "" }}'
                                             style="height: 47rem; overflow: hidden;">
                                            <img
                                                src='{{ \App\Utils\File::getImage($image) }}'
                                                alt=''
                                                style="max-width: 99%; max-height: 100%; margin: 0 auto;"
                                                data-zoom-image="{{ \App\Utils\File::getImage($image) }}"
                                            />
                                        </div>
                                    @endforeach
                                </div>

                                <!-- sag sol -->
                                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                    <i class="tf-ion-ios-arrow-left"></i>
                                </a>
                                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                    <i class="tf-ion-ios-arrow-right"></i>
                                </a>
                            </div>

                            <!-- thumb -->
                            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                @foreach(explode(',', $product->image) as $index => $image)
                                    <li data-target='#carousel-custom' data-slide-to='{{$index}}'
                                        class='{{$index == 0 ? 'active' : ''}}'>
                                        <img src='{{\App\Utils\File::getImage($image)}}' alt=''
                                             data-zoom-image="{{\App\Utils\File::getImage($image)}}"
                                        />
                                    </li>
                                @endforeach

                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="single-product-details">
                        <div class="">
                        </div>
                        <div class="color-swatches">
                            <span>color:</span>
                            <ul>
                                <li>
                                    <a href="#!" class="swatch-violet"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-black"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-cream"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-size">
                            <span>Size:</span>
                            <select class="form-control">
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                            </select>
                        </div>

                        <div class="product-category">
                            <span>Categories:</span>
                            <ul>
                                @foreach($product->category() as $category)
                                    <li><a href="product-single.html">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <form action="{{route('cart.store')}}" method="post" id="productForm">
                            @csrf
                            <input type="hidden" name="product_slug" value="{{$product->slug}}">

                            <div class="product-quantity">
                                <span>Quantity:</span>
                                <div class="product-quantity-slider">
                                    <input id="product-quantity" type="text" value="1" name="product_quantity">
                                </div>
                            </div>

                            <ul class="list-inline dashboard-menu">
                                <li>
                                    <button type="submit" class="btn mt-20">Add To Cart</button>
                                </li>
                                <li>
                                    <x-store.button id="buyNow" type="button"
                                                    data-action="{{route('checkout.entry.buynow')}}">
                                        Buy Now
                                    </x-store.button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-13">
                    <div class="tabCommon mt-21">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a>
                            </li>
                            <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews (2)</a></li>
                        </ul>
                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h3>Product Description</h3>
                                <div class="product_description_tiny_mce">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="post-comments">
                                    <ul class="media-list comments-list m-bot-51 clearlist">
                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-2.jpg"
                                                     alt="" width="49" height="50"/>
                                            </a>

                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h3 class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>

                                                    </h3>
                                                    <time datetime="2012-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet,
                                                    consectetur
                                                    adipisicing elit. Quod laborum minima, reprehenderit laboriosam
                                                    officiis
                                                    praesentium? Impedit minus provident assumenda quae.
                                                </p>
                                            </div>

                                        </li>
                                        <!-- End Comment Item -->

                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-5.jpg"
                                                     alt="" width="49" height="50"/>
                                            </a>

                                            <div class="media-body">

                                                <div class="comment-info">
                                                    <div class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>
                                                    </div>
                                                    <time datetime="2012-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend. Lorem ipsum dolor sit amet,
                                                    consectetur
                                                    adipisicing elit. Magni natus, nostrum iste non delectus atque ab a
                                                    accusantium optio, dolor!
                                                </p>

                                            </div>

                                        </li>
                                        <!-- End Comment Item -->

                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-2.jpg"
                                                     alt="" width="49" height="50">
                                            </a>

                                            <div class="media-body">

                                                <div class="comment-info">
                                                    <div class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>
                                                    </div>
                                                    <time datetime="2012-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.
                                                </p>

                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        document.querySelectorAll('#productForm button').forEach(button => {
            button.addEventListener('click', async (event) => {
                console.log(event);
                const form = document.getElementById('productForm');
                const formData = new FormData(form);
                const action = event.currentTarget.getAttribute('data-action');
                try {

                    const response = await axios.post(action, formData);
                    const data = response.data;
                    if (data.redirect) {
                        window.location.href = data.redirect.url;
                    }
                } catch (error) {
                    if (error.response.status === 400) {
                        window.location.href = '/login'
                    } else if (error.response.status === 418) {
                        window.location.reload();
                    } else {
                        console.error('Something gone wrong');
                    }
                }
            })
        })
    </script>
</x-layouts.store>
