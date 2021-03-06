@extends('layouts.app')

@section('content')
    <div class="flex justify-center mb-6">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h2>Posts</h2>

            <form action="{{route('posts')}}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea
                    name="body"
                    id="body"
                    cols="30"
                    rows="4"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Let's hear your thoughts!"
                    ></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                            Post
                        </button>
                    </div>

                </div>
            </form>

            @if($posts->count())
                <ul>
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                </ul>
                {{$posts->links()}}
            @else
                <p>
                    No posts to show
                </p>
            @endif

        </div>
    </div>
@endsection