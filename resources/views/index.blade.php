
@extends('layouts.app')

@section('content')


<div class="container mx-auto px-4 py-4">
  <h1 class="text-4xl font-bold text-gray-800 mb-4">Latest News</h1> 
  {{-- @php
  echo $articles
  @endphp --}}

  @foreach ($articles as $article)
  <div >
    <h2 >
      <a href="/articles/{{ $article->id }}">
        {{ $article->title }}
      </a>
    </h2>
    <p>
      Written by {{ $article->author }} on {{ $article->date_published }}
    </p>
    <p>
      {{ Str::limit($article->article_body, 100) }}
    </p>
    <a href="/articles/{{ $article->id }}">
      Read More
    </a>
  </div>

  @endforeach
</div> 
@endsection

