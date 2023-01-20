@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-medium text-gray-800 mb-4">Update Article</h1>
    <form method="post" action="{{ route('articles.update', $article->id) }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title:</label>
            <input type="text" name="title" value="{{ $article->title }}" class="w-full border border-gray-400 p-2 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="author" class="block text-gray-700 font-medium mb-2">Author:</label>
            <input type="text" name="author" value="{{ $article->author }}" class="w-full border border-gray-400 p-2 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="date_published" class="block text-gray-700 font-medium mb-2">Date Published:</label>
            <input type="date" name="date_published" value="{{ $article->date_published }}" class="w-full border border-gray-400 p-2 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="article_body" class="block text-gray-700 font-medium mb-2">Article Body:</label>
            <textarea name="article_body" class="w-full border border-gray-400 p-2 rounded-lg">{{ $article->article_body }}</textarea>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-
