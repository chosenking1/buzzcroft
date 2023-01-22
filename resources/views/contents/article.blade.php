@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="mb-4">
      <h1 class="text-3xl font-medium">{{ $article->title }}</h1>
      <p class="text-gray-600">by {{ $article->author }} on {{ $article->date_published }}</p>
    </div>
    
    {{-- <div class="mb-4">
      <img src="{{ $article->featured_image }}" alt="Article featured image" class="w-full">
    </div> --}}
    
    <div class="mb-4">
      {!! $article->article_body !!}
    </div>

    <div class="mb-4">
      @foreach (json_decode($article->pictures) as $picture)
        <img src="{{ asset('storage/'.$picture) }}" alt="Article picture" class="w-full mb-4">
      @endforeach
    </div>

    <div class="mb-4">
      {{-- <video src="{{ $article->featured_video }}" controls></video> --}}
      {!! $article->videoHtml !!}
    </div>
    
    <div class="mb-4">
      <h2 class="text-lg font-medium">Tags:</h2>
      <ul>
        @foreach($article->tags as $tag)
          <li>{{ $tag->name }}</li>
        @endforeach
      </ul>
    </div>
  
    <div class="mb-4">
      <h2 class="text-lg font-medium">Advert Space</h2>
      <img src="your-advert-image-source-goes-here" alt="Advert">
    </div>
  
    <div class="mb-4">
        <h2 class="text-lg font-medium">Comments:</h2>
        @if(count($comments) > 0)
          @foreach($comments as $comment)
            <div class="bg-gray-200 p-4 rounded-lg mb-4">
              <p>{{ $comment->feedback }}</p>
              <p class="text-gray-600">by {{ $comment->name }}</p>
              <p class="text-gray-600">Likes: {{ $comment->likes }}</p>
              <p class="text-gray-600">Dislikes: {{ $comment->dislikes }}</p>
            </div>
          @endforeach
  
