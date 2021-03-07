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
                    <li class="mb-4">
                        <a href="#" class="font-bold">
                            {{$post->user->name}}
                        </a>
                        <span class="text-gray-600 text-sm">
                            {{$post->created_at->diffForHumans()}}
                        </span>
                        <p class="mb-2">
                            {{$post->body}}
                        </p>

                        {{-- Delete Button --}}
                        @if($post->ownedBy(auth()->user()))
                            <form action="{{route('posts.destroy', $post)}}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        @endif

                        {{-- Like/unlike button --}}
                        <div class="flex items-center">
                            @auth
                                @if(!$post->likedBy(auth()->user()))
                                    <form action="{{route('posts.likes', $post)}}" method="POST" class="mr-1">
                                        @csrf
                                        <button type="submit" class="text-blue-500">Like</button>
                                    </form>
                                @else
                                    <form action="{{route('posts.likes', $post)}}" method="POST" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">Unlike</button>
                                    </form>
                                @endif

                            @endauth
                            <span>
                                {{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}
                            </span>
                        </div>
                    </li>
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