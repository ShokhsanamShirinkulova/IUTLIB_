<div class="row">
    <header>
        <nav class="navbar navbar-custom">
          <div class="container-fluid">
            <div class="navbar-header col-md-7 col-sm-7  col-xs-7">
              <a class="navbar-brand" href="#"><img src="{{ asset("img/logo.png") }}" alt="logo"></a>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
              <form action="#">
                <input type="text" name="search" placeholder="Search" /><button type="submit"><i class="fas fa-search"></i></button>    
              </form>
            </div>
          </div>
        </nav>
    </header>
</div>

<div class="row">
    <nav class="navbar navbar-expand-sm second-nav">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('appname', 'IUTLib') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link"    href="/catalog"> Catalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> Text Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about"> About</a></li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        {{-- <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
                    @else
                        @if(Auth::user()->userType == 2)
                            <li><a class="nav-link" href="/books">{{ __('Books') }}</a></li>
                            <li><a class="nav-link" href="/members">{{ __('Members') }}</a></li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstName . ' ' . Auth::user()->lastName}} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/home">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item" href="/personalinfo">{{ __('Personal Information') }}</a>
                                <a class="dropdown-item" href="/changepswd/{{Auth()->user('id')}}">{{ __('Change Password') }}</a>
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
</div>