<header id="header" data-transparent="true">
    <div class="header-inner">
        <div class="container">
            <div id="logo">
                <a href="#">
                    <span class="logo-default">HVC</span>
                    <span class="logo-dark">HVC</span>
                </a>
            </div>
            <div class="header-extras">
                <ul>
                    <li>
                        <a href="{{ asset('/cart') }}"><i class="icon-shopping-cart"></i></a>
                    </li>
                    <li>
                        <div class="p-dropdown">
                            <a href="#"><i class="icon-user"></i></a>
                            <ul class="p-dropdown-content">
                                @auth
                                    @if(Auth::user()->role == "Admin")
                                    <li><a href="{{ asset('/dashboard') }}">Dashboard</a></li>
                                    @else
                                    <li><a href="{{ asset('/profile') }}">Account Information</a></li>
                                    <li><a href="{{ asset('/transaction') }}">Transaction</a></li>
                                    @endif
                                    <li><a href="{{ asset('/logout') }}">Logout</a></li>
                                @endauth
                                @guest
                                <li><a href="{{ asset('/login') }}">Login</a></li>
                                @endguest
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>
            <div id="mainMenu" class="menu-center">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="{{ asset('/') }}" class="{{ $page == 'Home' ? 'menu-active' : ''}}">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="{{ $page == 'Our Collection' ? 'menu-active' : ''}}">Our Collection</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ asset('/our-collection/national') }}" style="font-size: 20px;">National</a></li>
                                    <li><a href="{{ asset('/our-collection/international') }}" style="font-size: 20px;">International</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="{{ $page == 'History' ? 'menu-active' : ''}}">History</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ asset('/history/national') }}" style="font-size: 20px;">National</a></li>
                                    <li><a href="{{ asset('/history/international') }}" style="font-size: 20px;">International</a></li>
                                </ul>
                            </li>
                            <li><a class="{{ $page == 'Shop' ? 'menu-active' : ''}}">Shop</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <hr class="mt-0" style="height: 3px; color: #000;">
        </div>
    </div>
</header>