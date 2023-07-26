<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu">
                @foreach ($all_locales as $locale)
                    <li><a class="dropdown-item" href="{{ route('change.locale', ['locale' => $locale])}}">{{$locale}}</a></li>
                @endforeach
            </ul>
          </li>
          @auth
            <li class="nav-item">
              <form action="{{ route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="nav-link btn btn-danger text-light">Chiqish</a>
              </form>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link btn btn-outline-primary" href="{{ route('login')}}">Kirish</a>
            </li>
            @endauth
          </ul>
      </div>
    </div>
  </nav>