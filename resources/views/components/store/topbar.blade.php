<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>+91-8515975030</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="/">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-112.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">KVIATO</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
                    <li class="dropdown cart-nav dropdown-slide">
                        <x-store.cart/>
                    </li><!-- / Cart -->

                    <!-- Search -->
                    <li class="dropdown search dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            <i class="tf-ion-ios-search-strong"></i> Search
                        </a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="post"><input type="search" class="form-control" placeholder="Search...">
                                </form>
                            </li>
                        </ul>
                    </li><!-- / Search -->

                    <!-- Account -->
                    @guest
                        <li class="dropdown search dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                <i class="tf-ion-person"></i> Account
                            </a>
                            <ul class="dropdown-menu  dashboard-menu search-dropdown list-inline">
                                <li class="li">
                                    <a href="{{route('login')}}" class="btn">Login</a>
                                </li>
                                <li class="li"><a href="{{route('register')}}" class="btn">Register</a></li>
                            </ul>
                        </li>
                    @endguest
                    <!-- / Account -->

                    @auth
                        <li class="dropdown search dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                <i class="tf-ion-person"></i> {{auth()->user()->name}}
                            </a>
                            <ul class="dropdown-menu  dashboard-menu search-dropdown">
                                <li class="li">
                                    <a href="#!" class="btn mt-12">Account Settings</a>
                                </li>
                                <li class="li"><a href="#!" class="btn mt-12">Orders</a></li>
                                <li class="li">
                                    <form method="post" action="{{route('logout')}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn mt-12" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest               </ul>
            </div>
        </div>
    </div>
</section>
