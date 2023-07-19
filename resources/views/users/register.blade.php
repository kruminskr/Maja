@extends('layout')
@section('content')
<x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            @lang('messages.register')
        </h2>
    </header>

    <form method="POST" action="/users">
        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
            @lang('messages.name')
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="name"
                value="{{old('name')}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >@lang('messages.email')</label
            >
            <input
                type="email"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{old('email')}}"/>
            @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="password"
                class="inline-block text-lg mb-2">
            @lang('messages.password')
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password"/>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
        </div>

        <div class="mb-6">
            <label
                for="password2"
                class="inline-block text-lg mb-2">
            @lang('messages.password2')
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password_confirmation"/>
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            @lang('messages.signup')
            </button>
        </div>

        <div class="mt-8">
            <p>
            @lang('messages.yes-acc')
                <a href="/login" class="text-laravel"
                    >@lang('messages.login')</a
                >
            </p>
        </div>
    </form>
</x-card>
@endsection