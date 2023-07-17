@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8 mt-5">
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email</label>
                    <input type="email" name="email" class="form-control" />
                </div>
                
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Parol</label>
                    <input type="password" name="password" class="form-control" />
                </div>
                
                <!-- Submit button -->
                <button type="button" class="btn btn-primary btn-block mb-4 col-12">{{__('Kirish')}}</button>
            </form>
        </div>
    </div>
</div>

@endsection