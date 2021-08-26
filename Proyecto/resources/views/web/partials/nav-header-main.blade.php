<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <router-link class="navbar-brand text-white" to="/home">CUCEI-Blog</router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item text-white">
          <router-link to="/home" class="nav-link text-white">HOME</router-link>
        </li>
        <li class="nav-item text-white">
          <router-link to="/home/categories" class="nav-link text-white">Categorias</router-link>
        </li>
      </ul>
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </nav>