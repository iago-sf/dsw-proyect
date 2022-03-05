@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-message')
        </div>
    </div>
    <div class="row justify-content-center mx-5 align-items-center">
        <div class="col col-md-8">
            <div class="row">
                <div class="col col-md-4 text-end">
                    Name:
                </div>
                <div class="col col-md-8 text-start">
                    {{ $plant->name }}
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4 text-end">
                    Cientific name:
                </div>
                <div class="col col-md-8 text-start">
                    {{ $plant->cientificName }}
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4 text-end">
                    Family:
                </div>
                <div class="col col-md-8 text-start">
                    {{ $plant->family }}
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4 text-end">
                    Description:
                </div>
                <div class="col col-md-8 text-start">
                    {{ $plant->description }}
                </div>
            </div>
            @if(count($contributions) > 0)
            <div class="row">
                <div class="col col-md-4 text-end">
                    Contributers:
                </div>
                <div class="col col-md-8 text-start">
                    @foreach($contributions as $contributer)
                    <div class="row">
                        <div class="col col-md-12">{{ $contributer->contribution->name }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        
        <div class="col col-md-4 text-center">
            <div><a class="btn btn-outline-dark w-25 mb-2" href="{{ route('Generate_pdf', $plant->id)}}"><i class="bi bi-filetype-pdf"></i> {{ __('Download') }}</a></div>
            @if(!is_null(Auth::user()))
                <div><a class="btn btn-outline-dark w-25 mb-2" href="{{ route('Upload_image', $plant->id)}}"><i class="bi bi-image"></i> {{ __('Upload photo') }}</a></div>
                @if(Auth::user()->role == 'mod')
                <div><a class="btn btn-outline-dark w-25 mb-2" href="{{ route('Edit_plant', $plant->id) }}"><i class="bi bi-pencil-square"></i> {{ __('Edit') }}</a></div>
                @endif
                @if(Auth::user()->id == $plant->user)
                <div><button class="btn btn-outline-dark w-25 mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i> {{ __('Delete') }}</button></div>
                @endif
            @endif
        </div>
    </div>
    <div class="row justify-content-center align-content-start mx-5 pt-5">
        <a class="col col-md-2 btn btn-white {{request()->exists('latest') ? 'disabled' : 'border-0 border-bottom border-2 border-dark' }}" href="{{ request()->fullUrlWithQuery(['latest' => '']) }}">Latest</a>
        <a class="col col-md-2 btn btn-white {{request()->exists('latest') ? 'border-0 border-bottom border-2 border-dark' : 'disabled' }}" href="{{ request()->url() }}">Most popular</a>
    </div>
    <div class="row justify-content-center">
        @foreach($images as $image)
            <div class="col col-md-3 m-3 shadow-lg p-2">
                
                <div class="row h-92 my-auto align-items-center">
                    <img src="{{ $image->image }}" alt="Imagen" class="col w-100 mb-2">
                </div>

                @php 
                    $liked = false;
                    foreach($image->likes as $like)
                    {
                        if(!is_null(Auth::user()) && $like->user == Auth::user()->id)
                        {
                            $liked = true;
                        }
                    }
                @endphp
                
                <form action="{{ Route('Create_like', ['image' => $image]) }}" method="POST">
                    @csrf
                    @if($liked)
                    <button type="submit" class="bg-transparent border-0 text-warning fs-4"><i class="bi bi-star-fill"></i></button> {{ count($image->likes) }}
                    @else
                    <button type="submit" class="bg-transparent border-0 text-black fs-4"><i class="bi bi-star"></i></button> {{ count($image->likes) }}
                    @endif
                </form>
            </div>
        @endforeach
    </div>

    <div class="w-25 m-auto paginator">{{ $images->appends($_GET)->links('pagination::bootstrap-4') }}</div>

    @if(!is_null(Auth::user()) && Auth::user()->id == $plant->user)
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('Are you sure about deleting this plant?') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small>{{ __('Have in mind that this changes can not be reverted.') }}</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <a href="{{ Route('Delete_plant', $plant) }}" class="btn btn-dark">{{ __('Go ahead') }}</a>
            </div>
            </div>
        </div>
    </div>
    @endif
@endsection