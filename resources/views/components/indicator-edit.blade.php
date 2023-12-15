
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<h1 class="modal-title fs-5" id="exampleModalLabel">Karusel yaratish</h1>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="{{ route('indicators.update', ['indicator' => $indicator->id])}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @if($errors->any())
                <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-text text-white">{{$errors->first()}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
                @endif
                @if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <div class="form-group">
                        <label for="welcome-title" class="form-control-label">Sarlavha</label>
                        <div class="@error('welcome.title')border border-danger rounded-3 @enderror">
                            <input class="form-control" type="text" id="welcome-title" value="{{ old('title') }}" name="title">
                                @error('title')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                        </div>
                    </div>
                </div>
        </div>

<div class="d-flex justify-content-end">
    <button type="button" class="btn bg-gradient-secondary  btn-md mt-4 mb-4 mx-3" data-bs-dismiss="modal">Yopish</button>
    <button type="submit" class="btn bg-primary text-light text-w btn-md mt-4 mb-4">Saqlash</button>
</div>

</form>    
</div>
</div>
</div>
</div>