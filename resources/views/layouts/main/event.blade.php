</div>
<div class="container">
    @auth
    <a href="{{ route('events.create')}}" class="btn btn-info col-1 mx-2 post-create">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
        </svg>
    </a>
    @endauth
    <h4 class="text-center m-5">{{ __('Ommaviy tadbirlar') }}</h4>
    <div class="row allNews mt-4">
        @foreach( $events as $event)
        <div class="col-4">
            <div class="contNews">
                <img src="{{ asset('Storage/'. $event->image)}}" width="100%">
                <p class="fp">{{ __($event->category->name)}}</p>
                <p class="sp mt-0">{{ __($event->title) }}</p>
                <p class="tp">{{ \Carbon\Carbon::parse($event->created_at)->format('F j, Y')}}</p>
                <a href="{{ route('events.show', ['event' => $event->id])}}" class="lp">{{ __('O‘qishda davom eting') }} 
                    <svg width="18" height="17" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_311_23)"><path d="M12.9939 9.45878L9.26111 5.72604C9.17478 5.63964 9.05953 5.59204 8.93664 5.59204C8.81375 5.59204 8.6985 5.63964 8.61217 5.72604L8.33727 6.00087C8.1584 6.17995 8.1584 6.47101 8.33727 6.64982L11.4718 9.78434L8.33379 12.9223C8.24746 13.0087 8.19979 13.1239 8.19979 13.2467C8.19979 13.3697 8.24746 13.4849 8.33379 13.5714L8.60869 13.8461C8.69509 13.9325 8.81027 13.9801 8.93316 13.9801C9.05605 13.9801 9.1713 13.9325 9.25763 13.8461L12.9939 10.11C13.0805 10.0233 13.128 9.90757 13.1277 9.78454C13.128 9.66104 13.0805 9.54538 12.9939 9.45878Z" fill="#07813E"/></g><circle cx="10.0638" cy="9.32008" r="8.85408" stroke="#07813E" stroke-width="0.932008"/><defs><clipPath id="clip0_311_23"><rect width="8.38807" height="8.38807" fill="white" transform="translate(6.33575 5.59204)"/></clipPath></defs></svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <a href="/events" class="newsLink">
        <p>{{ __('O‘qishda davom eting')}} 🡢</p>
    </a>
</div>
