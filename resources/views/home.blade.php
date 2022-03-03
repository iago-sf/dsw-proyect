@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-message')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-message')
            <h3 class="text-center">{{ __('Dashboard') }}</h3>

            <div class="text-center">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <h5>{{ __('Your plant contributions') }}</h5>

                <div class="row justify-content-center">
                @foreach($plants as $plant)
                <div class="col col-md-3 border-2 border-dark m-3 p-3">
                    <div>{{ $plant->name }}</div>
                    <div>{{ $plant->cientificName }}</div>
                    <div>{{ $plant->family }}
                        @if($plant->family == 'Fungie') 
                            🍄
                        @elseif($plant->family == 'Bush')
                            🌿
                        @elseif($plant->family == 'Tree')
                            🌳
                        @elseif($plant->family == 'Flower')
                            🌻
                        @endif
                    </div>
                    <div><a href="{{ Route('Plant_info', $plant->id) }}">Show all info</a></div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection