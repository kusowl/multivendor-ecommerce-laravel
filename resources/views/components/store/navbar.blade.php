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
                                                <li><a href="{{route('store.categories.subCategories.show', [$category, $subCategories->slug])}}">{{$subCategories->name}}</a></li>
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
            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>
