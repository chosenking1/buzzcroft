@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-medium">Login</h1>
<form class="bg-white p-6 rounded-lg" method="post" action="{{ route('login') }}">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="email">Email:</label>
        <input class="border border-gray-400 p-2 rounded-lg w-full" type="email" name="email" id="email">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="password">Password:</label>
        <input class="border border-gray-400 p-2 rounded-lg w-full" type="password" name="password" id="password">
    </div>
    <button class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded-lg">Login</button>
</form>

@endsection