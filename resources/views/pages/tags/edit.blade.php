@extends('layouts.base')

@section('content')
    <div class="p-4 bg-gray-200">
        Edit tag:
        <form method="post" action="{{ url('/tags/{photo}') }}">
            @csrf
            <div class="mt-4">
                <label for="name" class="@if($errors->any()) text-red-500 @endif">Tag name:</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ $tag->name }}"
                       class="ml-1 pl-1 border-solid border-2 border-black @if($errors->any()) border-red-500 text-red-500 @endif rounded"
                >
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="mt-1.5 text-xs text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="mt-8 inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">
                UPDATE
            </button>
        </form>
    </div>
@endsection
