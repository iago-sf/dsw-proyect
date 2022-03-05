@extends('layouts.app')

@section('content')
    <h1 class="col text-center">{{ __('Welcome to PlantPedia') }}</h1>
    <div class="text-center"><small>{{ __('The biggest plant encyclopedia run by the community') }}</small></div>
    
    <div class="row justify-content-between w-75 m-auto align-items-center">
        <a href="{{ Route('Create_plant') }}" class="col col-md-2 btn btn-outline-dark">{{ __('Add a new plant') }}</a>

        <form action="" method="GET" class="col col-md-4 text-end align-items-center">
            <input type="text" name="search">
            <button type="submit" class="btn btn-dark"><i class="bi bi-search-heart"></i></button>
        </form>
    </div>

    <div class="row justify-content-center m-0 p-0">
        @foreach($plants as $plant)
        <div class="col col-md-3 border border-2 border-dark m-3 p-3 text-center">
            <div>{{ __('Name') }}: {{ $plant->name }}</div>
            <div>{{ __('Cientific name') }}: {{ $plant->cientificName }}</div>
            <div>{{ __('Family') }}: {{ $plant->family }}
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
            <div><a href="{{ Route('Plant_info', $plant->id) }}">{{ __('Show all info') }}</a></div>
        </div>
        @endforeach
        </div>
    </div>

    <div class="w-25 m-auto paginator">{{ $plants->appends($_GET)->links('pagination::bootstrap-4') }}</div>
@endsection
