@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row temple-news">
        <h6 class="date-time px-4 pt-2 text-body">
            <span>{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</span> 
        </h6>
        <div class="col left col-12 col-sm-12 col-md-12 p-3 col-lg-8 col-xl-8 col-xxl-8 border-light-subtle border-end">
            <img src="{{ asset('Storage/'.$post->image) }}" class="img-thumbnail news-main-img show-img" alt="">
            <h4 class="my-4">{{ __($post->title) }}</h4>
            <p>{!!nl2br (__($post->description)) !!}</p>
            {{-- <div class="row">
                <div class="col mb-4 mt-3">
                    <img src="images/mss.jpg" class="img-thumbnail">
                </div>
                <div class="col mb-4 mt-3">
                    <img src="images/sm.jpg" class="img-thumbnail">
                </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <img src="images/dsad.jpg" class="img-thumbnail main-img">
                </div>
            </div> --}}
        </div>
        <div class="col right col-lg-4 col-xl-4 col-xxl-4">
            <h5 class="news-content">{{__('Boshqa Yangliklar')}}</h5>
            @foreach ($posts->sortByDesc('created_at')->take(5) as $add)
                @if ($add->id != $post->id)
                    <a href="{{ route('posts.show', ['post' => $add->id])}}">
                        <p class="add-date">
                            <span>{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y')}}</span>
                        </p>
                        <p class="news-right-content add-title">
                            {{__($add->title) }}
                        </p>    
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    @auth
    <div class="row">
        <form class="col-1 mx-2 d-flex justify-contend-between" action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('{{ $post->id}} O\'chirishni tasdiqlaysizmi?')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
            </button>
        </form>
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-light btn-sm col-1" >
            <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg>
        </a>
    </div>
    @endauth
</div>
@endsection