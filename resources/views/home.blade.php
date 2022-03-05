@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-message')
        </div>
    </div>
    <h3 class="text-center">{{ __('Dashboard') }}</h3>
    <div class="row justify-content-end w-75 m-auto align-items-center">
        
        <form action="" method="GET" class="col col-md-4 text-end align-items-center">
            <input type="text" name="search">
            <button type="submit" class="btn btn-dark"><i class="bi bi-search-heart"></i></button>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <h5>{{ __('Your plant contributions') }}</h5>

                <div class="row justify-content-center">
                @foreach($plants as $plant)
                <div class="col col-md-3 border border-2 border-dark m-3 p-3">
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

            <div class="w-25 m-auto paginator">{{ $plants->appends($_GET)->links('pagination::bootstrap-4') }}</div>
        </div>
    </div>
</div>
</div>
@endsection