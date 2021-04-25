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
        <div class="mt-3  mb-5">
            <a class="font-bold" href="">{{$post->user->name}}</a>
            <span class="text-gray-500 ml-3">{{$post->created_at->diffForHumans()}}</span>
            <p class="mt-3">{{$post->body}}</p>

            @if ($post->ownedBy(auth()->user()))
            <div>
                <form method="POST" action={{route('posts.destroy', $post)}}>
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 p-1 rounded-lg text-white">Delete</button>
                </form>
            </div>
            @endif
            
            <div class="mt-3 flex">
                @auth
                @if(!$post->likedBy(auth()->user()))

                <form action="{{route('posts.likes', $post->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="mr-4">👍</button>
                </form>
                @else
                <form action="{{route('posts.likes', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">👎</button>
                </form>
            </div>
            @endif
            @endauth
            <span>{{$post->likes->count()}}
                {{Str::plural('like',$post->likes->count())}}</span>
        </div>

        @endforeach
        {{$posts->links()}}
        @else
        <p class="text-center text-xl">No posts</p>
        @endif
    </div>

</div>
@endsection