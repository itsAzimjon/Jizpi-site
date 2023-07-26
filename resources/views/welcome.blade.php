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
@include('layouts.main.index')
@include('layouts.main.ad')
@include('layouts.main.appoint')
@include('layouts.main.event')
@include('layouts.main.indicator')
@endsection
