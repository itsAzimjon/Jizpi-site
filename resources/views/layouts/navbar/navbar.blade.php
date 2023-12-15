<audio id="myAudio">
    <source src="{{ asset('assets/madhiya.mp3')}}" type="audio/mpeg">
</audio>


<nav class="navbar navbar-expand-lg bg-primary nav-1">
    <div class="container">
        <a class="navbar-brand text-light" href="tel:+998722264605">{{__('Murojat uchun: +998 72 226 46 05')}} </a>
        <div class="collapse navbar-collapse justify-content-end mb-1" id="navbarNavDropdown">
            <ul class="navbar-nav nav-icons">
                <li><a href="#"><img src="{{asset('assets/icons/2.png')}}"></a></li>
                <li><a href="#"><img src="{{asset('assets/icons/3.png')}}"></a></li>
                <li><a href="#"><img src="{{asset('assets/icons/4.png')}}"></a></li>
                <li><a href="#"><img src="{{asset('assets/icons/5.png')}}"></a></li>
                <li><a href="#" onclick="toggleAudio()" id="playPauseLink"><img src="{{asset('assets/icons/6.png')}}"></a></li>

                <li class="nav-item dropdown m-1">
                    <a class="nav-link text-light nav-text dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="lang-flag" src="{{ asset('assets/icons/' . $current_locale . '.png')}}" width="100%">
                        {{$current_locale}}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($all_locales as $locale)
                            <li>
                                <a class="dropdown-item" href="{{ route('change.locale', ['locale' => $locale])}}">                        
                                    <img class="lang-flag" src="{{ asset('assets/icons/' . $locale . '.png')}}" width="100%">
                                    {{$locale}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @auth
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link nav-text btn btn-danger text-light">Chiqish</a>
                </form>
           @endauth
        </div>
    </div>
</nav> 

<nav class="navbar navbar-expand-lg" style="box-shadow: none">
    <div class="container py-1">
        <a class="navbar-brand" href="/"><img class="nav-img" src="/assets/img/jizpiQora.png"></a>
        <div class="nav-main">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">=</span>
            </button> 
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                    <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('YANGILIKLAR')}}</a>
                        <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="posts">{{__('Yangiliklar')}}</a></li>
                                <li><a class="dropdown-item" href="events">{{__('Ommaviy tadbirlar')}}</a></li>
                                <li><a class="dropdown-item" href="events">{{__('E’lonlar')}}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('INSTITUT')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 1) as $firstnav)
                                <li><a class="dropdown-item" href="{{ route('firstnavs.show', ['firstnav' => $firstnav->id])}}">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('TUZILMA')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 2) as $firstnav)
                                <li><a class="dropdown-item" href="{{ route('firstnavs.show', ['firstnav' => $firstnav->id])}}">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('FAOLIYAT')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 3) as $firstnav)
                                <li><a class="dropdown-item" href="{{ route('firstnavs.show', ['firstnav' => $firstnav->id])}}">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('QABUL')}}-2023</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 4) as $firstnav)
                                <li><a class="dropdown-item" href="{{ route('firstnavs.show', ['firstnav' => $firstnav->id])}}">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('TALABALAR')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 5) as $firstnav)
                                <li><a class="dropdown-item" href="{{ route('firstnavs.show', ['firstnav' => $firstnav->id])}}">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('ALOQA')}}</a>
                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('INTERAKTIV XIZMATLAR')}}</a>
                    </li>
                    {{-- <li class="nav-item ">
                        <a class="nav-link nav-text text-light  recip" href="#">{{__('Rektorga qabul')}}</a>
                    </li> --}}

                    @auth
                    <li class="nav-item">
                        <a href="{{ route('secondnavs.create')}}" class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
    

<script>
    // serquyosh play and pause
    var play = document.getElementById("myAudio");
    var button = document.getElementById("playPauseButton");

    function toggleAudio() {
        if (play.paused) {
        play.play();
        } else {
        play.pause();
        }
    }
</script>