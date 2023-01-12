@extends('layouts.app') 

 @section('content') 
<div class="flex">

    <div class="w-1/2">
      <img src="your-image-source-goes-here" alt="image">
    </div>
    <div class="w-1/2 pl-4">
      <form method="post" action="{{ route('register') }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
          <label for="username" class="block text-gray-700 font-medium mb-2">Username:</label>
          <input type="text" name="username" class="w-full border border-gray-400 p-2 rounded-lg">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
          <input type="email" name="email" class="w-full border border-gray-400 p-2 rounded-lg">
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
          <input type="password" name="password" class="w-full border border-gray-400 p-2 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="w-full border border-gray-400 p-2 rounded-lg">
        </div>
        <div class="mb-4">
          <label for="fullname" class="block text-gray-700 font-medium mb-2">Full Name:</label>
          <input type="text" name="fullname" class="w-full border border-gray-400 p-2 rounded-lg">
        </div>
        <div class="mb-4">
          <label for="gender" class="block text-gray-700 font-medium mb-2">Gender:</label>
          <select name="gender" id="gender" class="w-full border border-gray-400 p-2 rounded-lg">
            @foreach(['male', 'female', 'other'] as $gender)
              <option value="{{ $gender }}">{{ ucfirst($gender) }}</option>
            @endforeach
          </select>
        </div>

          <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Register</button>

          </div>
                      @endsection