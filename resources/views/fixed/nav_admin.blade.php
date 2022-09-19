<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">Bookstore</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 w-100">
                <li class="nav-item @if(request()->routeIs('admin.home')) active @endif">
                    <a class="nav-link" href="{{route('admin.home')}}">Admin home</a>
                </li>
                <li class="nav-item @if(request()->routeIs('admin.products')) active @endif">
                    <a class="nav-link" href="{{route('admin.products')}}">Admin products</a>
                </li>
                <li class="nav-item @if(request()->routeIs('admin.genres')) active @endif">
                    <a class="nav-link" href="{{route('admin.genres')}}">Admin genres</a>
                </li>
                <li class="nav-item @if(request()->routeIs('admin.users')) active @endif">
                    <a class="nav-link" href="{{route('admin.users')}}">Admin users</a>
                </li>
            <li class="nav-item @if(request()->routeIs('admin.messages')) active @endif">
                <a class="nav-link" href="{{route('admin.messages')}}">Admin messages</a>
            </li>
                <li class="nav-item ml-lg-auto">
                    <span class="text-white">{{session()->get('user')->name}}</span>
                    <a class="auth-button" href="{{route('logout')}}">Logout</a>
                </li>
        </ul>
    </div>
</nav>
