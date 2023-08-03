@extends('layouts.base')

@section('content')
    <div>
        @foreach($articles as $article)
            <div class="p-4 bg-gray-200">
                <div class="flex items-center p-2">
                    <div class="w-16">{{ $article->id  }}</div>
                    <div class="w-80">{{ $article->title  }}</div>
                    <div>{{ $article->category->name  }}</div>
                    <div>
                        <div>{{ $article->text  }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
