@extends('layouts.base')

@section('content')
    <div class="flex flex-col items-center">
        <div>Check my latest posts:</div>
        @foreach($articles as $article)
            <div>{{ $article }}</div>
        @endforeach
    </div>
@endsection
