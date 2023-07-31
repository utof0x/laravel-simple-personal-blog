@extends('layouts.base')

@section('content')
    <div class="p-4 bg-gray-200">
        <a href="/categories/create"
           class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded"
        >
            CREATE
        </a>
        <ul class="mt-6 border-solid border-2 border-black rounded">
            <li class="flex items-center p-2 bg-blue-200 border-solid border-black">
                <div class="w-16">#</div>
                <div>Name</div>
            </li>
            @foreach($categories as $category)
                <li class="flex items-center p-2 border-solid border-t-2 border-black">
                    <div class="w-16">{{ $category->id  }}</div>
                    <div>{{ $category->name  }}</div>
                    <a href="/categories/{{ $category->id }}/edit"
                       class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded ml-auto"
                    >
                        EDIT
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded ml-2">
                            DELETE
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
