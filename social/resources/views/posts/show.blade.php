@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <h1 class="mb-4">
            Single Post Page
        </h1>
        <ul>
        <x-post :post="$post" />
        </ul>
    </div>
</div>
@endsection