@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        @if(session('status'))
        <div class="text-white text-xl text-center bg-red-500 p-2 rounded-lg mb-3">
            {{session('status')}}
            </div>
            @endif

        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-300 @enderror" type="text" name="email" id="email" placeholder="Your Email" value="{{old('email')}}">
                @error('email')
                <div class="text-red-600 mt-4 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')border-red-300 @enderror" type="text" name="password" id="password" placeholder="Your Password" value="{{old('password')}}">
                @error('password')
                <div class="text-red-600 text-sm mt-4">{{$message}}</div>
                @enderror
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember">
                <label class="ml-2" for="remember" >Remember me</label>
            </div>
            <div class="mb-4 pt-4">
                <button type="submit" class="bg-blue-500 text-white py-3 px-4 rounded font-medium w-full">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection