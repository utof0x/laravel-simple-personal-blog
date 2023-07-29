@extends('layouts.base')

@section('content')
    <div>Check my latest articles:</div>
    @foreach($articles as $article)
        <div>{{ $article }}</div>
    @endforeach
@endsection
