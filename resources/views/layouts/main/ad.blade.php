@auth
    <a href="{{ route('ads.create')}}" class="btn btn-info col-1 mx-2 post-create">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
        </svg>
    </a>
@endauth

<div class="container">
    <ul class="row adsMain p-0">
        <li class="col-5 p-4 fad bg-light adHead">
            <h2>{{ __("E’lonlar")}}</h2>
            <p>{{ __('Bizning yaqinlashib kelayotgan tadbirlarimizdan xabardor bo‘lishni unutmang!') }}</p>
        </li>
        <div class="col-7 d-flex">
            @foreach ($ads as $ad)
            <li class="col-4 p-2 adLi">
                <a href="{{ route('ads.show', ['ad' => $ad->id])}}">
                    <div class="card">
                        <img class="card-img" src="{{ asset('storage/'. $ad->image) }}" alt="a snow-capped mountain range"/>
                        <div class="card-img-overlay text-white">
                          <small class="adDate card-text text-light">{{ \Carbon\Carbon::parse($ad->created_at)->format('F j, Y')}}</small>
                          <p class="adText card-text text-light">{{ __($ad->title) }}</p>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </span>
    </ul>
</div>
