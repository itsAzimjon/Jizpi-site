@extends('layouts.app')
@section('content')

<div id="carouselExampleDark" class="carousel carousel-dark slide">
	<div class="carousel-inner">
		@foreach ($welcomes as $key => $welcome)
			<div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-bs-interval="10000">
				<img src="{{ asset('storage/'.$welcome->image) }}" class="d-block w-100 crsl" alt="...">
				<div class="carousel-caption">
					<h2 class="text-uppercase">{{ __($welcome->title) }}</h2>
					<p>{{__($welcome->description) }}</p>
					<div class="row d-flex">
						<a href="{{ $welcome->video_link }}" target="_blank" class="btn btn-light btn-sm col-3" >
							<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M13 1C6.376 1 1 6.376 1 13C1 19.624 6.376 25 13 25C19.624 25 25 19.624 25 13C25 6.376 19.624 1 13 1ZM13 22.6C7.708 22.6 3.4 18.292 3.4 13C3.4 7.708 7.708 3.4 13 3.4C18.292 3.4 22.6 7.708 22.6 13C22.6 18.292 18.292 22.6 13 22.6ZM17.8 13L10.6 18.4V7.6L17.8 13Z" fill="#1566B7" stroke="#1566B7"/>
							</svg>
							{{ __('Videoni ko‘rish') }}
						</a>
						@auth
							<form class="col-1 mx-2" action="{{ route('welcome.destroy', $welcome->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger" onclick="return confirm('{{ $welcome->id}} O\'chirishni tasdiqlaysizmi?')">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
									<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
									</svg>
								</button>
							</form>	
						@endauth
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="dropdown-flash">
		<button class="dropdown-btn" aria-label="menu button" aria-haspopup="menu" aria-expanded="false" aria-controls="dropdown-menu">
			<span class="arrow">
				<svg width="26" height="24" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<rect width="28" height="25.8462" fill="url(#pattern0)"/>
					<defs>
					<pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
					<use xlink:href="#image0_569_189" transform="matrix(0.0102564 0 0 0.0111111 0.0384615 0)"/>
					</pattern>
					<image id="image0_569_189" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAADG0lEQVR4nO2cOYgUQRSGf68RwVGjVVGMFBVE8EAUMXMVYVPRFTTRyANFDBV2BWVRA28w3cDRwMBQXTxCRVwxMVHxYFY8FvEAb0eKbXF2Z7anq6veVE3V/8ELe16/b4ph+lW9BgghhBBCYmICgBMA3gCoWIoygB4ABdfF+cQxi4JHhpJNAIwDMCgoWq1sAmCJoGQVr2h5iF3ConuTPNFTEha9PnrDCS8FJat/MeP/JYqZWcKr+ZTrAn1hs7DoFa4L9IUzgpKfABjjukBf6BcU3eW6OF+YDOCnoOj5rgv0hXZByfdcF+cTXYKi97ouziduCEn+BWCG6+J8aiR9EhJ9zXVxsTSStrkuzid2C0n+CmCq6+JiaCSVXBcWSyOpw3VhPjFHSLLapeH+YBWdQqLPVychwFkh0aspV76R9JyduuEUkyc326KPjMgTPe1CPxuLojfbhEZSPyXX0icg+gBFyzeSfgOYTdHDWSqwmm9Sci17BERvp+haLlmW/A3ANIqWbyRdoeTmNZIqhhHcYfVOD6RGcVj9nAcy0+I1AuGBBzLTYgABUBRqJNmMowiAdR6ITIvPANoQAN0eyEyLQwiEPg9kpk0EqJ+2IBj0QOhosRMBUfZAaL14GtKDCpKHgYqHsQmBUUhk+7Sy73MztzkzL2sb5Ime6xYk81hvBl4YSv4DYFmWRDEzKdkjNBF90XURrcBiQ8k/AMx1XUQrsNFQ9GnXBbQKBw0bR9NdF9Aq9BqI5hStBndzSn4LYIpOotj5kFO0Ok9CMtKWU/IzABOzJiHAmpyi1e470WBHDskPAYzVSUKQ6wWEaq+SaHJVU/Jt3QRkiMeajaOVyXVEA/U6te8aoi/rfDj5zzwNyerVQQuqriUadGiI5vSsAfszSv4CYKZJoti5kFH0Ydc32urcyiD5HRtH5gxkEL3PQp6oKSb/ixsN3LNxZMjyDKt5q53vNG62NJD8iI2j5pyt3mApT/SUUiTfid5Ok4aMVlG0PT6OIplTs5Yp15GsJrwW2k4UOz11RJ90fVMhUqg6xP4ewPHQxiEIIYQQQmCVv2YoMvvF69ayAAAAAElFTkSuQmCC"/>
					</defs>
				</svg>
			</span>
		</button>
		<ul class="dropdown-content" role="menu" id="dropdown-menu">
			<li style="--delay: 1;"><a href="http://lib.jizpi.uz/" target="_blank"><img src="{{asset('assets/icons/f2.png')}}" class="mx-3">{{__('Kutubxona')}}</a></li>
			<li style="--delay: 1;"><a href="https://unilibrary.uz/" target="_blank"><img src="{{asset('assets/icons/f2.png')}}" class="mx-3">{{__('Unilibrary')}}</a></li>
			<li style="--delay: 2;"><a href="http://jurnal.jizpi.uz/index.php/JOURNAL" target="_blank"><img src="{{asset('assets/icons/f5.png')}}" class="mx-3">{{__('Onlayn jurnal')}}</a></li>
			<li style="--delay: 3;"><a href="#" target="_blank"><img src="{{asset('assets/icons/f3.png')}}" class="mx-3">{{__('Interaktiv xizmatlar')}}</a></li>
			<li style="--delay: 4;"><a href="https://hemis.jizpi.uz/dashboard/login" target="_blank"><img src="{{asset('assets/icons/f6.png')}}" class="mx-3">{{__('Hemis teacher')}}</a></li>
			<li style="--delay: 5;"><a href="https://student.jizpi.uz/dashboard/login" target="_blank"><img src="{{asset('assets/icons/f1.png')}}" class="mx-3">{{__('Hemis student')}}</a></li>
			<li style="--delay: 6;"><a href="http://moodle.jizpi.uz/" target="_blank"><img src="{{asset('assets/icons/f4.png')}}" class="mx-3">{{__('Moodle')}}</a></li>
			<li style="--delay: 9;" class="nav-item ">
				<a class="nav-link nav-text text-light  recip" href="#">{{__('Rektorga qabul')}}</a>
			</li> 
		</ul>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>
@auth
	<button type="submit" class="btn btn-info col-1 mx-2 create-carusel" data-bs-toggle="modal" data-bs-target="#createModal">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
		<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
		</svg>
	</button>
@endauth
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<h1 class="modal-title fs-5" id="exampleModalLabel">Karusel yaratish</h1>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="{{ route('welcome.store')}}" method="POST" enctype="multipart/form-data">
			<x-carusel-create></x-carusel-create>
			</form>    
		</div>
	</div>
	</div>
</div>
	
  
@include('layouts.main.post')
@include('layouts.main.ad')
@include('layouts.main.appoint')
@include('layouts.main.event')
@include('layouts.main.indicator')
@include('layouts.no-back-main.facultates')
@include('layouts.no-back-main.usefull-links')
@endsection

@section('js')
<script>
	const dropdownBtn = document.querySelector(".dropdown-btn");
	const dropdownCaret = document.querySelector(".arrow");
	const dropdownContent = document.querySelector(".dropdown-content");

	// add click event to dropdown button
	dropdownBtn.addEventListener("click", () => {
	// add rotate to caret element
	dropdownCaret.classList.toggle("arrow-rotate");
	// add open styles to menu element
	dropdownContent.classList.toggle("menu-open");
	dropdownBtn.setAttribute(
		"aria-expanded",
		dropdownBtn.getAttribute("aria-expanded") === "true" ? "false" : "true"
	);
	});
</script>
@endsection
