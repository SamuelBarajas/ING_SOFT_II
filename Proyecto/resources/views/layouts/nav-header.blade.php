<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <router-link class="navbar-brand text-white" to="/home">CUCEI-Blog</router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto"></ul>
      <ul class="navbar-nav">
        @if (Route::has('login'))
            @auth
                @if (auth()->user()->rol_id == 1)
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/dashboard/post') }}">Home</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/home') }}">Home</a>
                </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">Log In</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            @endauth
        @endif
      </ul>
    </div>
</nav>