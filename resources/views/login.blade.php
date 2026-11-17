@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1 class="text-2xl font-semibold tracking-tight">Login</h1>
    <p class="mt-1 mb-6 text-sm text-zinc-500">Please enter your credentials to login</p>

    <form action="{{ route('login.store') }}" method="POST" class="flex flex-col gap-6">
        @csrf

        <div>
            <x-label for="email">Email</x-label>
            <x-input type="email" name="email" id="email" placeholder="m@example.com" :value="old('email')" />
            <x-input-error name="email" />
        </div>

        <div>
            <x-label for="password">Password</x-label>
            <x-input type="password" name="password" id="password" />
            <x-input-error name="password" />
        </div>

        <x-button class="w-full">Login</x-button>

        <p class="text-center text-sm text-zinc-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-zinc-900 underline underline-offset-4">Register</a>
        </p>
    </form>
@endsection
