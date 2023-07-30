@extends('layouts.base')

@section('content')
    <div class="p-4 bg-gray-200">
        <a href="/tags/create"
           class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded"
        >
            CREATE
        </a>
        <ul class="mt-6 border-solid border-2 border-black rounded">
            <li class="flex items-center p-2 bg-blue-200 border-solid border-b-2 border-black">
                <div class="w-16">#</div>
                <div>Name</div>
            </li>
            @foreach($tags as $tag)
                <li class="flex items-center p-2 border-solid last-of-type:border-none border-b-2 border-black">
                    <div class="w-16">{{ $tag->id  }}</div>
                    <div>{{ $tag->name  }}</div>
                    <a href="/tags/{{ $tag->id }}/edit"
                       class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded ml-auto"
                    >
                        EDIT
                    </a>
                    <a href="/tags/{{ $tag->id }}/delete"
                       class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded ml-2"
                    >
                        DELETE
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
