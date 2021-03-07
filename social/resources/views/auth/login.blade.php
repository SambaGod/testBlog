@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <h2>Login</h2>

            @if (session('status'))
                <span class="text-red-500">{{session('status')}}</span>
            @endif

            <form class="mt-6" action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Choose Username"
                        value="{{old('username')}}"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                    >
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Your password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    >
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection