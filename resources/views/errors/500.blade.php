@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <h3 class="col col-md-8 text-center">
        {{ __('Error 500') }}
    </h3>
</div>
<div class="row justify-content-center">
    <div class="col col-md-8 text-center">
        {{ __('An unexpected problem has ocurred during your petition.') }}
    </div>
</div>
<div class="row justify-content-center">
    <a href="{{ request()->url() }}" class="col col-md-8 text-center">
        {{ __('Reload') }}
    </a>
</div>
@endsection