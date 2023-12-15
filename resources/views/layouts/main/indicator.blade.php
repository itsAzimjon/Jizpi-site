<div class="container-fluid bg-primary ind-cont">
    <div class="container pt-1 p-4">
        <h4 class="appo-h py-4">{{ __('Asosiy ko‘rsatkichlar') }}</h4>
        <div class="tab-content p-2 pb-4">
            <div class="row ind-row">
                @foreach ($indicators as $ind)
                    <div class="col-6 col-md-3 ind-head">
                        <div class="ind px-4 py-3 d-flex">
                            <img class="ind-img d-inline" src="{{ asset( $ind->image)}}">
                            <div class="mx-3 mt-2 d-block">
                                <p class="ind-tit m-0">{{(__($ind->title)) }}</p>
                                <p class="ind-num m-0">{{ $ind->number }}+</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
