<nav class="navbar navbar-expand-lg bg-primary nav-1">
    <div class="container">
        <a class="navbar-brand text-light" href="tel:+998722264605">{{__('Murojat uchun: +998 72 226 46 05')}} </a>
        <div class="collapse navbar-collapse justify-content-end mb-1" id="navbarNavDropdown">
            <ul class="navbar-nav nav-icons">
                <li><a href="#"><img src="{{asset('assets/icons/2.png')}}"></a></li>
                <li><a href="#"><img src="{{asset('assets/icons/3.png')}}"></a></li>
                <li><a href="#"><img src="{{asset('assets/icons/4.png')}}"></a></li>
                <li><a href="#"><img src="{{asset('assets/icons/5.png')}}"></a></li>
                <li><a href="#"><img src="{{asset('assets/icons/6.png')}}"></a></li>
                <li class="nav-item dropdown m-1">
                    <a class="nav-link text-light nav-text dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="lang-flag" src="{{ asset($current_locale . '.png')}}" width="100%">
                        {{$current_locale}}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($all_locales as $locale)
                            <li>
                                <a class="dropdown-item" href="{{ route('change.locale', ['locale' => $locale])}}">                        
                                    <img class="lang-flag" src="{{$locale}}.png" width="100%">
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
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                    <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('Yangiliklar')}}</a>
                        <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('Institut')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 1) as $firstnav)
                                <li><a class="dropdown-item" href="#">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('Tuzilma')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 2) as $firstnav)
                                <li><a class="dropdown-item" href="#">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('Faoliyat')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 3) as $firstnav)
                                <li><a class="dropdown-item" href="#">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('Qabul-2023')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 4) as $firstnav)
                                <li><a class="dropdown-item" href="#">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('Talabalar')}}</a>
                        <ul class="dropdown-menu">
                            @foreach($firstnavs->where('nav_id', 5) as $firstnav)
                                <li><a class="dropdown-item" href="#">{{$firstnav->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('Aloqa')}}</a>
                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link nav-text text-black  data-toggle" href="#" data-bs-toggle="dropdown">{{__('Interaktiv xizmatlar')}}</a>
                    </li> --}}
                    <li class="nav-item ">
                        <a class="nav-link nav-text text-light  recip" href="#">{{__('Rektorga qabul')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


