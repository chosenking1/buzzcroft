@extends('layouts.app') 

 @section('content') 
<div class="container mx-auto px-4 py-4">
<h1 class="text-4xl font-bold text-gray-800 mb-4">Latest News</h1>
@forelse ($articles as $article)
<div class="mb-4">
<h2 class="text-2xl font-bold text-gray-800 mb-2">
<a href="/articles/{{ $article->id }}" class="text-blue-500 hover:text-blue-700">
{{ $article->title }}
</a>
</h2>
<p class="text-gray-600 mb-2">
Written by {{ $article->author }} on {{ $article->date_published }}
</p>
<p class="text-gray-700 mb-2">
{{ Str::limit($article->article_body, 100) }}
</p>
<a href="/articles/{{ $article->id }}" class="text-blue-500 hover:text-blue-700">
Read More
</a>
</div>
@empty
<p>No articles found.</p>
@endforelse
</div>
@endsection


