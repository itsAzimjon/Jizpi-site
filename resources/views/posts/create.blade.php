@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col my-5">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">    
                @csrf
                @if($errors->any())
                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                        {{$errors->first()}}</span>
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
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="welcome-image" class="form-control-label">Surat</label>
                            <div class="@error('image')border border-danger rounded-3 @enderror">
                                <input required class="form-control"  type="file" accept="image/*"  id="welcome-image" name="image">
                                    @error('image')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="welcome-title" class="form-control-label">Kategoriya</label>
                            <div class="@error('welcome.title')border border-danger rounded-3 @enderror">
                                <select name="category_id" aria-label="Default select example" class="form-select">
                                    @foreach($categories as $option)
                                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="welcome-title" class="form-control-label">Sarlavha uz</label>
                            <div class="@error('welcome.title')border border-danger rounded-3 @enderror">
                                <input required class="form-control" type="text" id="welcome-title" name="title">
                                    @error('title')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title" class="form-control-label">Tavsif uz</label>
                            <div class="@error('title')border border-danger rounded-3 @enderror">
                                <textarea class="form-control"  type="text" name="description">
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="welcome-title" class="form-control-label">Sarlavha en</label>
                            <div class="@error('welcome.title')border border-danger rounded-3 @enderror">
                                <input required class="form-control" type="text" id="welcome-title" name="title_en">
                                    @error('title')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title" class="form-control-label">Tavsif en</label>
                            <div class="@error('title')border border-danger rounded-3 @enderror">
                                <textarea class="form-control"  type="text" name="description_en">
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="welcome-title" class="form-control-label">Sarlavha ru</label>
                            <div class="@error('welcome.title')border border-danger rounded-3 @enderror">
                                <input required class="form-control" type="text" id="welcome-title" name="title_ru">
                                    @error('title')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title" class="form-control-label">Tavsif ru</label>
                            <div class="@error('title')border border-danger rounded-3 @enderror">
                                <textarea class="form-control"  type="text" name="description_ru">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="image-forms" class="my-4 form-group"> 
                    <div class="image-form">
                        <label class="form-control-label" for="mult_image[]">Qo‘shimcha surat:</label>
                        <input  class="form-control" type="file" name="mult_image[]" accept="image/*">
                    </div>
                </div>
                <button type="button" id="add-image" class="btn btn-secondary">Rasm qo‘shish</button>
            
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn bg-gradient-secondary  btn-md mt-4 mb-4 mx-3" data-bs-dismiss="modal">Yopish</button>
                    <button type="submit" class="btn bg-primary text-light text-w btn-md mt-4 mb-4">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var maxImages = 6;
    var imageForms = document.getElementById('image-forms');
    var addImageButton = document.getElementById('add-image');

    function updateAddButtonState() {
        if (imageForms.childElementCount >= maxImages) {
            addImageButton.disabled = true;
        } else {
            addImageButton.disabled = false;
        }
    }

    addImageButton.addEventListener('click', function () {
        if (imageForms.childElementCount < maxImages) {
            var newImageForm = document.createElement('div');
            newImageForm.className = 'image-form';
            newImageForm.innerHTML = `
                <label class="form-control-label" for="mult_image[]">Qo‘shimcha surat:</label>
                <input  class="form-control" type="file" name="mult_image[]" accept="image/*">
            `;
            imageForms.appendChild(newImageForm);
            updateAddButtonState();
        }
    });

    updateAddButtonState();
</script>
@endsection