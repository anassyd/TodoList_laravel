@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <h1 class="text-2xl font-semibold tracking-tight">Register</h1>
    <p class="mt-1 mb-6 text-sm text-zinc-500">Create a new account</p>

    <form action="{{ route('register.store') }}" method="POST" class="flex flex-col gap-6">
        @csrf

        <div>
            <x-label for="name">Name</x-label>
            <x-input name="name" id="name" placeholder="Your name" :value="old('name')" />
            <x-input-error name="name" />
        </div>

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

        <div>
            <x-label for="password_confirmation">Confirm Password</x-label>
            <x-input type="password" name="password_confirmation" id="password_confirmation" />
            <x-input-error name="password_confirmation" />
        </div>

        <x-button class="w-full">Register</x-button>

        <p class="text-center text-sm text-zinc-500">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-zinc-900 underline underline-offset-4">Login</a>
        </p>
    </form>
@endsection
