@extends('layouts.app')

@section('h1', 'Поиск')

@section('content')
    @include('search.form')

    @if ($items)
        <div class="card-columns">
            @foreach($items as $item)
                <div class="card">
                    <img src="{{$item->url}}" alt="" class="card-img">
                </div>
            @endforeach
        </div>
    @endif
@endsection