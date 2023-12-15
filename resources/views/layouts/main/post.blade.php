@php
    $posts = $posts->sortByDesc('created_at');
@endphp

<div class="container">
    @auth
        <a href="{{ route('posts.create')}}" class="btn btn-info col-1 mx-2 post-create">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg>
        </a>
    @endauth
    <h4 class="text-center mt-5">{{ __('So‘ngi yangiliklar') }}</h4>
    <div class="col-lg-12 col-md-12 my-sm-auto ms-sm-auto me-sm-0 mx-auto p-3">
		<div class="nav-wrapper position-relative end-0">
			<ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
				@foreach($categories as $key => $row)
                    <li class="nav-item ">
                        <a class="nav-link mb-0 px-0 py-1 {{$key == 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#menu{{ $row->id }}">
                            <span class="ms-1">{{ __($row->name) }}</span>
                        </a>
                    </li>
                @endforeach
			</ul>
		</div>
        <div class="tab-content">
            <div id="menu1" class="tab-pane fade show active">
                <div class="row allNews">
                    @foreach ($posts->take(8) as $post)
                        <div class="col-3">
                            <a href="{{ route('posts.show', ['post' => $post->id])}}">
                                <div class="contNews">
                                    <img src="{{ asset('storage/'. $post->image)}}" width="100%">
                                    <p class="sp">{{ __($post->title) }}</p>
                                    <p class="tp">{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y')}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            @foreach ($categories as $menu)
                <div id="menu{{ $menu->id }}" class="tab-pane fade">
                    <div class="row allNews">
                        @foreach ($posts->where('category_id', $menu->id)->take(8) as $post)
                            <div class="col-3">
                                <a href="{{ route('posts.show', ['post' => $post->id])}}">
                                    <div class="contNews">
                                        <img src="{{ asset('storage/'. $post->image)}}" width="100%">
                                        <p class="sp">{{ __($post->title) }}</p>
                                        <p class="tp">{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y')}}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach 
                    </div>
                </div>
            @endforeach       
        </div>
        <a href="/posts" class="newsLink">
            <p>{{ __('O‘qishda davom eting')}} 🡢</p>
        </a>
        
    </div>
    
