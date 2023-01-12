@extends('layouts.app')

@section('content')

  
<script>
    $(document).ready(function() {
      $("#date_published").datepicker();
    });
  </script>
<form method="post" action="{{route('articles_store')}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
        <input type="text" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
        <input type="text" name="author" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="date_published" class="block text-gray-700 text-sm font-bold mb-2">Date Published:</label>
        <input type="text" name="date_published" id="date_published" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <div class="mb-4">
            <label for="article_body" class="block text-gray-700 text-sm font-bold mb-2">Article Body:</label>
            <textarea name="article_body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Save</button>
        </div>
    </form>