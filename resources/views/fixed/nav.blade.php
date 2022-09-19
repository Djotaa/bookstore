<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">Bookstore</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 w-100">
            <li class="nav-item @if(request()->routeIs('home')) active @endif">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item @if(request()->routeIs('books.index')) active @endif">
                <a class="nav-link" href="{{route('books.index')}}">Shop</a>
            </li>
            <li class="nav-item @if(request()->routeIs('contact.index')) active @endif">
                <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
            </li>
            @if(session()->has('user'))
                @if(session()->get('user')->role->role_name == 'user')
                    <li class="nav-item @if(request()->routeIs('cart')) active @endif">
                        <a class="nav-link"  href="{{route('cart')}}">Cart<i class="fas fa-shopping-cart"></i></a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.home')}}">Admin panel</a>
                    </li>
                @endif
                <li class="nav-item ml-lg-auto">
                    <span class="text-white">{{session()->get('user')->name}}</span>
                    <a class="auth-button" href="{{route('logout')}}">Logout</a>
                </li>
            @else
                <li class="nav-item px-2 ml-lg-auto">
                    <a class="auth-button" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item py-1 py-lg-0">
                    <a class="auth-button" href="{{route('register')}}">Register</a>
                </li>
            @endif

        </ul>
    </div>
</nav>
