@component('mail::message')
# Congrats

{{$liker-> name}} liked your post

@component('mail::button', ['url' => route('posts.show', $post)])
Show the post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
