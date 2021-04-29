@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
        <form action={{route('posts')}} method="POST">
            @csrf
            <label for="body" class="sr-only">Post From</label>
            <textarea id="body" name="body" rows="4" cols="30" class="border bg-gray-300 w-full rounded-lg p-4 text-lg @error('body') border-red-500 @enderror" placeholder="Post something"></textarea>
            @error('body')
            <div class="text-red-500 mb-2">
                {{$message}}
            </div>
            @enderror
            <div class="mt-2"><button type="submit" class="bg-blue-500 rounded p-2 text-white">Submit</button></div>
        </form>

        @if($posts->count())
        @foreach($posts as $post)

        <x-post :post="$post" />

        @endforeach
        {{$posts->links()}}
        @else
        <p class="text-center text-xl">No posts</p>
        @endif
    </div>

</div>
@endsection