@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <h3 class="col col-md-8 text-center">
        {{ __('Error 404') }}
    </h3>
</div>
<div class="row justify-content-center">
    <div class="col col-md-8 text-center">
        {{ __('Unluckily the page you are looking for is not available any more.') }}
    </div>
</div>
<div class="row justify-content-center">
    <a href="{{ Route('welcome') }}" class="col col-md-8 text-center">
        {{ __('Return to homepage.') }}
    </a>
</div>
@endsection