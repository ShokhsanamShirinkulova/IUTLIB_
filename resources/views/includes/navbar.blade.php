<div class="container-fluid">
  <div class="row">
    <header>
      <nav class="navbar navbar-custom">
        <div class="container-fluid">
          <div class="navbar-header col-md-7 col-sm-7  col-xs-7">
            <a class="navbar-brand" href="/"><img src="{{ asset("img/logo.png") }}" alt="logo"></a>
          </div>
          <div class="col-md-5 col-sm-5 col-xs-5">
            <form action="/search">
              <input type="text" name="search" placeholder="Search" /><button type="submit"><i class="fas fa-search"></i></button>    
            </form>
          </div>
        </div>
      </nav>
    </header>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <nav class="navbar navbar-expand-sm second-nav">
      <div class="container">
        <a class="navbar-brand" href="/">{{ config('appname', 'IUTLib') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/catalog"> Catalogue</a></li>
            <li class="nav-item"><a class="nav-link" href="/textbooks"> Text Books</a></li>
            <li class="nav-item"><a class="nav-link" href="/about"> About</a></li>
          </ul>
          <ul class="navbar-nav ml-auto">
            @guest
              <li><a class="nav-link" href="{{ route('login') }}">{{ ('Login') }}</a></li>
            @else
              @if(Auth::user()->userType == 2)
                <li><a class="nav-link" href="/books">{{ ('Books') }}</a></li>
                <li><a class="nav-link" href="/members">{{ ('Members') }}</a></li>
              @endif
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->firstName . ' ' . Auth::user()->lastName}} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/home">{{ ('Dashboard') }}</a>
                  <a class="dropdown-item" href="/personalinfo">{{ ('Personal Info') }}</a>
                  <a class="dropdown-item" href="/passwords/{{ Auth::user()->id }}/edit">{{ ('Change Password') }}</a>
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
  <div class="row">
    <ul class="breadcrumb" style="width: 100%">
      <li class="breadcrumb-item"><a href="/"><i class="fa fa-dashboard"></i>IUTLib</a></li>
      <?php $segments = ''; ?>
      @foreach(Request::segments() as $segment)
          
          <li class="breadcrumb-item">
              <a href="{{ $segments }}">{{$segment}}</a>
          </li>
      @endforeach
  </ul>
  </div>
</div>