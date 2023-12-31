@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row allNews">
        @php
            $prevMonth = '';
            $ads = $ads->sortByDesc('created_at');
        @endphp
        @foreach ($ads as $ad)
            @php
                $currentMonth = \Carbon\Carbon::parse($ad->created_at)->format('F Y');
            @endphp

            @if ($currentMonth !== $prevMonth)
                <div class="col-12 mb-4 mt-2">
                    <h4>{{ __($currentMonth) }} </h5>
                </div>
            @endif

            <div class="col-4">
                <div class="contNews p-2">
                    <a href="{{ route('ads.show', ['ad' => $ad->id])}}">
                       <img src="{{ asset('Storage/'. $ad->image)}}" width="100%">
                       <p class="sp mt-4">{{ __($ad->title) }}</p>
                       <p class="tp">{{ \Carbon\Carbon::parse($ad->created_at)->format('F j, Y')}}</p>
                       <p class="lp">{{ __('O‘qishda davom eting') }} <svg width="18" height="17" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_311_23)"><path d="M12.9939 9.45878L9.26111 5.72604C9.17478 5.63964 9.05953 5.59204 8.93664 5.59204C8.81375 5.59204 8.6985 5.63964 8.61217 5.72604L8.33727 6.00087C8.1584 6.17995 8.1584 6.47101 8.33727 6.64982L11.4718 9.78434L8.33379 12.9223C8.24746 13.0087 8.19979 13.1239 8.19979 13.2467C8.19979 13.3697 8.24746 13.4849 8.33379 13.5714L8.60869 13.8461C8.69509 13.9325 8.81027 13.9801 8.93316 13.9801C9.05605 13.9801 9.1713 13.9325 9.25763 13.8461L12.9939 10.11C13.0805 10.0233 13.128 9.90757 13.1277 9.78454C13.128 9.66104 13.0805 9.54538 12.9939 9.45878Z" fill="#07813E"/></g><circle cx="10.0638" cy="9.32008" r="8.85408" stroke="#07813E" stroke-width="0.932008"/><defs><clipPath id="clip0_311_23"><rect width="8.38807" height="8.38807" fill="white" transform="translate(6.33575 5.59204)"/></clipPath></defs></svg></p>
                   </a>
                </div>
            </div>

            
            @php
                $prevMonth = $currentMonth;
            @endphp
        @endforeach
    </div>
</div>
@endsection