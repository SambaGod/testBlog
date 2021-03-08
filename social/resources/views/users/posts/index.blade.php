@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12">
        <div class="p-6">
            <h1 class="text-2xl font-medium mb-1">
                {{$user->name}} |
                <span class="text-gray-500">({{$user->username}})</span>
            </h1>
            <p>
                Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}}
            </p>
            <p>
                Likes received = {{$user->receivedLikes()->count()}}
            </p>
        </div>
        <div class="bg-white p-6 rounded-lg">
            @if($posts->count())
                <ul>
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                </ul>
                    {{$posts->links()}}
                @else
                    <p>
                        {{$user->name}} does not have any posts
                    </p>
            @endif
        </div>
    </div>
</div>
@endsection