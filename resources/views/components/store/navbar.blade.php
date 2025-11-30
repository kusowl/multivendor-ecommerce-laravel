<nav class="bg-base-100 border-b border-b-base-300 sticky top-0 z-50">
    <div class="navbar mx-auto w-10/12">
        <div class="flex-1 flex gap-2">
            <a href="/" class="btn btn-ghost text-xl">{{config('app.name')}}</a>
            <form action="" method="get" class="flex flex-1">
                <label class="input flex-1 mr-12">
                    <i data-lucide="search"></i>
                    <input type="search" required placeholder="Search for products, categories and more"/>
                </label>
            </form>
        </div>
        <div class="flex gap-2">
            @guest
                <a href="{{route('login')}}" tabindex="0" role="button" class="btn btn-soft ">
                    <div class="flex gap-2  items-center">
                        <i data-lucide="scan-face"></i>
                        Login
                    </div>
                </a>
            @endguest
            @auth
                <a href="{{route('cart.index')}}" tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <i data-lucide="shopping-cart"></i>
                        <span id="cart-indicator"
                              class="badge badge-sm rounded-full p-1 indicator-item">0</span>
                    </div>
                </a>

                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img
                                    alt="Tailwind CSS Navbar component"
                                    src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"/>
                            </div>
                        </div>
                        {{auth()->user()->name}}
                    </div>

                    <ul
                        tabindex="-1"
                        class="menu menu-lg md:menu-md dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li><a href="{{route('orders.index')}}">Orders</a></li>
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <i data-lucide="ellipsis-vertical"></i>
                </div>
                <ul
                    tabindex="-1"
                    class="menu menu-md dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li><a><i data-lucide="headset"></i>Helpdesk</a></li>
                    <li><a><i data-lucide="user-pen"></i>Contact Us</a></li>
                    <li><a><i data-lucide="users-round"></i>About</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
