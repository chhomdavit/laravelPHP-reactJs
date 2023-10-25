<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Phone Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('pages.about') }}">About</a></li>

                @if (Auth::user())
                <li class="nav-item">
                    <a href="{{ route('pages.cart.index') }}" class="nav-link px-lg-3 py-3 py-lg-4">
                        card <span class="badge text-bg-danger">
                            {{ Auth::check() ? Auth::user()->cart->count() : 0 }}
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pages.wishlist.index') }}" class="nav-link px-lg-3 py-3 py-lg-4">
                        wishlist
                        <span class="badge text-bg-danger">
                            {{ Auth::check() ? Auth::user()->wishlist->count() : 0 }}
                        </span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="btn nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-regular fa-user"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('pages.profile.index') }}">
                            <i class="fa-regular fa-user"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <a class="dropdown-item" href="{{ route('pages.order.index') }}">
                            <i class="fa-regular fa-user"></i>
                            Your Order
                        </a>

                        <a class="dropdown-item" role="button" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                        </form>
                    </div>
                </li>

                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link px-lg-3 py-3 py-lg-4">
                        Login
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
