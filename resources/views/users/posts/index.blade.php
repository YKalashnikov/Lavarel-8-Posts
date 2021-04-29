@extends('layouts.app')

@section('content')

<div class="text-center mb-5">
<h1  class="text-2xl font-medium" > User: {{$user->username}}</h1>
<p class="font-medium mt-5">Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}} and received {{$user->receivedLikes()->count()}} {{Str::plural('like', $user->receivedLikes()->count())}}</p>
</div>
<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
    @if($posts->count())
        @foreach($posts as $post)

        <x-post :post="$post" />

        @endforeach
        {{$posts->links()}}
        @else
        <p class="text-center text-xl">{{$user->name}} does not have any posts</p>
        @endif 
    </div>
</div>
@endsection