<div class="container">
    <ul class="row adsMain p-0">
        <li class="col-5 p-4 fad bg-light adHead">
            <h2>{{__("E'lonlar")}}</h2>
            <p>Bizning yaqinlashib kelayotgan tadbirlarimizdan xabardor bo‘lishni unutmang!</p>
        </li>
        <div class="col-7 d-flex">
            @foreach ($ads as $ad)
            <li class="col-4 p-2 adLi">
                <a href="{{ route('ads.show', ['ad' => $ad->id])}}">
                    <div class="card">
                        <img class="card-img" src="{{ asset('storage/'. $ad->image) }}" alt="a snow-capped mountain range"/>
                        <div class="card-img-overlay text-white">
                          <small class="adDate card-text text-light">{{ \Carbon\Carbon::parse($ad->created_at)->format('F j, Y')}}</small>
                          <p class="adText card-text text-light">{{ $ad->title}}</p>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </span>
    </ul>
</div>