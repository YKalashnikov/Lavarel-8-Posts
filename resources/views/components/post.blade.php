@props(['post'=>$post])

<div class="mt-3 mb-5">
    <a href="{{route("users.posts", $post->user)}}" class="font-bold">{{$post->user->name}}</a>
    <span class="text-gray-500 ml-3">{{$post->created_at->diffForHumans()}}</span>
    <p class="mt-3">{{$post->body}}</p>

    @can('delete', $post)<p>YES</p>     @endcan

    <form method="POST" action={{route('posts.destroy', $post)}}>
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 p-1 rounded-lg text-white">Delete</button>
    </form>



    <div class="mt-3 flex">
        @auth
        @if(!$post->likeBy(auth()->user()))

        <form action="{{route('posts.likes', $post->id)}}" method="POST">
            @csrf
            <button type="submit" class="mr-4">👍</button>
        </form>
        @else
        <form action="{{route('posts.likes', $post->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="mr-4" type="submit">👎</button>
        </form>
    @endif
    @endauth
    <span>{{$post->likes->count()}}
        {{Str::plural('like',$post->likes->count())}}</span>
</div>
</div>