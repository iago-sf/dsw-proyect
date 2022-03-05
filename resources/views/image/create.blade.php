@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mx-5 align-items-center">
        <h1 class="col col-md-6 text-center">Upload a new photo</h1>
    </div>
    <form class="row justify-content-center mx-5 align-items-center" method="POST" action="{{ Route('Store_image') }}" enctype='multipart/form-data'>
        <div class="col col-md-8">
            @csrf
            <input type="hidden" name="plant" value="{{ $id }}">
            <div class="row mt-3 align-items-center">
                <div class="col col-md-4 text-end">
                   {{ __('Image') }}:
                </div>
                <input class="col col-md-8 text-start w-50 p-1 px-2" type="file" value="{{ old('image') }}" name="image"/>
            </div>
            @error('image')
            <div class="row align-items-center justify-content-center">
                <div class="col col-md-4 text-center text-danger mt-2 border border-2 border-danger p-2 m-1 mb-2 bg-soft-red">{{ $message }}</div>
            </div>
            @enderror

            <div class="row mt-3 align-items-center justify-content-center">
                <input class="btn btn-outline-dark col col-md-4 text-center" type="submit" value="Upload image">
            </div>
        </div>
    </form>
@endsection