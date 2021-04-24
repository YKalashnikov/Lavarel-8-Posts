@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input class="bg-gray-100 border-2 w-full p-4 rounded-lg
                 @error('name')border-red-300 @enderror" 
                 type="text" name="name" id="name" placeholder="Your Name" value="{{old('name')}}">

                @error('name')
                <div class="text-red-600 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username')border-red-300 @enderror"  
                type="text" name="username" id="username" placeholder="Your username" value="{{old('username')}}">

                @error('username')
                <div class="text-red-600 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

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
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Password Confirmation</label>
                <input class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')border-red @enderror" type="text" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" value="{{old('password')}}">

                @error('password')
                <div class="text-red-600 text-sm mt-4">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-4 pt-4">
                <button type="submit" class="bg-blue-500 text-white py-3 px-4 rounded font-medium w-full">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection