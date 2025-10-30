@props(['categories'])

<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">

                    <li class="dropdown ">
                        <a href="{{route('home')}}">Home</a>
                    </li>


                    <!-- Elements -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Shop <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Basic -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Pages</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="confirmation.html">Confirmation</a></li>

                                    </ul>
                                </div>

                                <!-- Layout -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Layout</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="product-single.html">Product Details</a></li>
                                        <li><a href="shop-sidebar.html">Shop With Sidebar</a></li>

                                    </ul>
                                </div>

                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Elements -->


                    <!-- Pages -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Categories <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu ">
                            <div class="row">
                                @foreach($categories as $category)
                                    <div class="col-sm-4">
                                        <ul>
                                            <li class="dropdown-header">{{$category->name}}</li>
                                            <li role="separator" class="divider"></li>
                                            @foreach($category->subCategories()->latest()->take(4)->get() as $subCategories)
                                                <li><a href="contact.html">{{$subCategories->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                                <div class="col-sm-12">
                                    <a href="{{route('store.categories')}}" class="btn btn-main btn-medium col-sm-12">View
                                        all</a>
                                </div>
                            </div>
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Pages -->


                    <!-- Blog -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Blog <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-full-width.html">Blog Full Width</a></li>
                            <li><a href="blog-grid.html">Blog 2 Columns</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                        </ul>
                    </li><!-- / Blog -->

                    <!-- Shop -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Elements <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="alerts.html">Alerts</a></li>
                        </ul>
                    </li><!-- / Blog -->
                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>
