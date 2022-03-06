@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mx-5 align-items-center">
        <h1 class="col col-md-6 text-center">{{ __('Edit') }} {{ $cientificName ?? '' }}</h1>
    </div>
    <form class="row justify-content-center mx-5 align-items-center" method="POST" action="{{ Route('Edit_plant', $id) }}">
        <div class="col col-md-8">
            @csrf
            <div class="row mt-3 align-items-center">
                <div class="col col-md-4 text-end">
                    {{ __('Name') }}:
                </div>
                <input class="col col-md-8 text-start w-50 p-1 px-2" type="text" value="{{ $name ?? old('name') }}" name="name"/>
            </div>
            @error('name')
            {{ Alert::wrongInput($message) }}
            @enderror

            <div class="row mt-3 align-items-center">
                <div class="col col-md-4 text-end">
                    {{ __('Description') }}:
                </div>
                <input class="col col-md-8 text-start w-50 p-1 px-2" type="text" value="{{ $description ?? old('description') }}" name="description"/>
            </div>
            @error('description')
            {{ Alert::wrongInput($message) }}
            @enderror

            <div class="row mt-3 align-items-center justify-content-center">
                <input class="btn btn-outline-dark col col-md-4 text-center" type="submit" value="Update plant">
            </div>
        </div>
    </form>
@endsection