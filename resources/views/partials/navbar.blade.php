<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand" href="/">Lara-Cart</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample04" style="">
            {{-- Product search --}}
            <form action="/search" method="POST" role="search" class="form-inline">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Search product">
                </div>
            </form>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">
                            <i class="fa fa-shopping-cart"></i>
                            Cart <span class="badge badge-success badge-pill">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                        </a>
                    </li>
                @endguest
                @auth
                    @if(Auth::user()->role == 'user')
                        <li class="nav-item">
                            <a class="nav-link" href="/cart">
                                <i class="fa fa-shopping-cart"></i>
                                Cart <span class="badge badge-success badge-pill">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                            </a>
                        </li>
                    @endif
                @endauth
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Sign-in</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li> --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>