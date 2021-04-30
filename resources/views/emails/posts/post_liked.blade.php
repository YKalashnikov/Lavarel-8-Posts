@component('mail::message')
# Introduction

{{$liker-> name}} liked your post

@component('mail::button', ['url' => route('post.show', $post)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
