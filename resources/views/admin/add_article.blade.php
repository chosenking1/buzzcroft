@extends('layouts.app')

@section('content')

  
<script>
    $(document).ready(function() {
      $("#date_published").datepicker();
    });
  </script>
<form method="post" action="{{route('articles_store')}}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
        <input type="text" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        {{-- <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
        <input type="text" name="author" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="author" value="{{ auth()->user()->fullname }}">
    </div>
    <div class="mb-4">
        <label for="date_published" class="block text-gray-700 text-sm font-bold mb-2">Date Published:</label>
        <input type="text" name="date_published" id="date_published" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="article_body" class="block text-gray-700 text-sm font-bold mb-2">Article Body:</label>
        <textarea name="article_body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
    </div>
    <div class="mb-4">
        <label for="pictures" class="block text-gray-700 text-sm font-bold mb-2">Pictures:</label>
        <input type="file" name="pictures[]" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="video_url" class="block text-gray-700 text-sm font-bold mb-2">Video Url:</label>
        <input type="file" name="video_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
        <input type="text" name="tags" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white
