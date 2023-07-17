@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row temple-news">
        <h6 class="date-time px-4 pt-2 text-body">
            <span>{{ \Carbon\Carbon::parse($ad->created_at)->format('F j, Y') }}</span> 
        </h6>
        <div class="col left col-12 col-sm-12 col-md-12 p-3 col-lg-8 col-xl-8 col-xxl-8 border-light-subtle border-end">
            <img src="{{ asset('Storage/'.$ad->image) }}" class="img-thumbnail news-main-img show-img" alt="">
            <h4 class="my-4">{{ $ad->title }}</h4>
            <p>{!!nl2br ($ad->description) !!}</p>
        </div>
        <div class="col right col-lg-4 col-xl-4 col-xxl-4">
            <h5 class="news-content">{{__("Boshqa E'lonlar")}}</h5>
            @foreach ($ads->sortByDesc('created_at')->take(4) as $xad)
                @if ($xad->id != $ad->id)
                    <a href="{{ route('posts.show', ['post' => $xad->id])}}">
                        <p class="add-date">
                            <span>{{ \Carbon\Carbon::parse($xad->created_at)->format('F j, Y')}}</span>
                        </p>
                        <p class="news-right-content add-title">
                            {{ $xad->title }}
                        </p>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection