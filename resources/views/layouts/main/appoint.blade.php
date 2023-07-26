<div class="container my-4">

    <div class="row">
        <div class="col-12 bg-primary d-flex appo">
            @foreach ($appoint as $it)
            <div class="col-2 appo-png d-none d-md-block">
                <img src="appoint.png" width="100%">
            </div>
            <div class="col-12 col-md-8 p-3">
                <h4 class="appo-h">{{ __($it->title) }}</h4>
                <p class="appo-p">{{ __($it->text) }}</p>
            </div>
            <div class="col-2">
                <img src="{{ asset('Storage/'. $it->image) }}" class="mx-3 appo-img d-none d-md-block" width="100%">
            </div>
            @endforeach
        </div>
        @auth
        <a href="{{ route('appoint.edit', ['appoint' => $it->id])}}" class="btn btn-secondary col-1 mx-2 appo-edit">
            <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg>
        </a>
        @endauth
    </div>
</div>