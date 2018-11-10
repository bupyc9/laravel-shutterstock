@extends('layouts.app')

@section('h1', 'Поиск')

@section('content')
    @include('search.form')

    @if ($searchRequest)
        <a href="{{route('searchResultsEmails', ['id' => $searchRequest->id])}}"
           class="btn btn-primary mt-2 mb-2 send-to-email-js" title="Send to email">
            <span class="far fa-envelope"></span>
        </a>
        <div class="card-columns">
            @foreach($searchRequest->results as $result)
                <div class="card">
                    <img src="{{$result->url}}" alt="" class="card-img">
                </div>
            @endforeach
        </div>
    @endif
@endsection