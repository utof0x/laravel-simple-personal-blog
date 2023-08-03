@extends('layouts.base')

@section('content')
    <div class="p-4 bg-gray-200">
        Edit article:
        <form method="post" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mt-4">
                <div>
                    <label for="title" class="@error('title') text-red-500 @enderror">Article title:</label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ $article->title }}"
                           class="ml-1 pl-1 border-solid border-2 border-black @error('title') border-red-500 text-red-500 @enderror rounded w-60"
                    >
                    <div class="mt-1.5 text-xs text-red-500">{{ $errors->first('title') }}</div>
                </div>
                <div class="mt-6">
                    <label for="image" class="@error('image') text-red-500 @enderror">Article image:</label>
                    <input type="file"
                           id="image"
                           name="image"
                           value="{{ $article->image }}"
                    >
                    <div class="mt-1.5 text-xs text-red-500">{{ $errors->first('image') }}</div>
                </div>
                <div class="mt-6">
                    <label for="tags" class="@error('tags') text-red-500 @enderror">Article tags (separated by comma):</label>
                    <input type="text"
                           id="tags"
                           name="tags"
                           value="{{ $article->tags->implode('name', ',') }}"
                           class="ml-1 pl-1 border-solid border-2 border-black @error('tags') border-red-500 text-red-500 @enderror rounded w-60"
                    >
                    <div class="mt-1.5 text-xs text-red-500">{{ $errors->first('tags') }}</div>
                </div>
                <div class="mt-6">
                    <label for="category" class="@error('category') text-red-500 @enderror">Article category:</label>
                    <select name="category" id="category" class="bg-white border-solid border-2 border-black rounded">
                        <option value="0">Select category</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                @if ($article->id == $category->id) selected @endif
                            >
                                {{ $category->name  }}
                            </option>
                        @endforeach
                    </select>
                    <div class="mt-1.5 text-xs text-red-500">{{ $errors->first('category') }}</div>
                </div>
                <div class="flex mt-6">
                    <label for="text" class="@error('text') text-red-500 @enderror">Article text:</label>
                    <textarea type="text"
                              id="text"
                              name="text"
                              class="ml-1 pl-1 border-solid border-2 border-black @error('text') border-red-500 text-red-500 @enderror rounded w-60"
                    >{{ $article->text }}</textarea>
                </div>
                <div class="mt-1.5 text-xs text-red-500">{{ $errors->first('text') }}</div>
            </div>
            <button type="submit" class="mt-8 inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">
                UPDATE
            </button>
        </form>
    </div>
@endsection
