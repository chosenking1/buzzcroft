@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="mb-4">
      <h1 class="text-3xl font-medium">{{ $article->title }}</h1>
      <p class="text-gray-600">by {{ $article->author }} on {{ $article->date_published }}</p>
    </div>
    
    {{-- <div class="mb-4">
      {!! $article->article_body !!}
    </div>

    <div class="mb-4">
      @foreach (json_decode($article->pictures) as $picture)
        <img src="{{ asset('storage/'.$picture) }}" alt="Article picture" class="w-full mb-4">
      @endforeach
    </div> --}}
    <div class="mb-4">
      {!! $article->article_body !!}
      @php $count = 0; @endphp
      @foreach (json_decode($article->pictures) as $picture)
        @if($count % 2 === 0)
          <img src="{{ asset('storage/'.$picture) }}" alt="Article picture" class="w-full mb-4">
        @endif
        @php $count++; @endphp
      @endforeach
    </div>


    <div class="mb-4">
      {!! $article->videoHtml !!}
    </div>
    
    <div class="mb-4">
      <h2 class="text-lg font-medium">Tags:</h2>
      <ul>
      @foreach(json_decode($article->tags) as $tag)
          <li>{{ $tag }}</li>
      @endforeach
      </ul>
  </div>
  
  
    <div class="mb-4">
      <h2 class="text-lg font-medium">Advert Space</h2>
      <img src="your-advert-image-source-goes-here" alt="Advert">
    </div>
    <div class="mb-4">
      <h2 class="text-lg font-medium">Comments:</h2>
      @forelse ($comments as $comment)
          <div class="bg-gray-200 p-4 rounded-lg mb-4">
              <p>{{ $comment->content }}</p>
              <p class="text-gray-600">by {{ $comment->user->name }}</p>
              <div class="flex">
                  <form action="{{ route('comments.like', $comment) }}" method="post">
                      @csrf
                      <button type="submit">Like</button>
                  </form>
                  <form action="{{ route('comments.dislike', $comment) }}" method="post">
                      @csrf
                      <button type="submit">Dislike</button>
                  </form>
                  <p class="text-gray-600">Likes: {{ $comment->likes }}</p>
                  <p class="text-gray-600">Dislikes: {{ $comment->dislikes }}</p>
              </div>
              @foreach($comment->childComments as $childComment)
                  <div class="bg-gray-200 p-4 rounded-lg mb-4 ml-4">
                      <p>{{ $childComment->content }}</p>
                      <p class="text-gray-600">by {{ $childComment->user->name }}</p>
                  </div>
              @endforeach
              <form method="post" action="{{ route('comments.store') }}">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                  <input type="hidden" name="username" value="{{ auth()->user()->username }}">
              
                  <input type="hidden" name="article_id" value="{{ $article->id }}">
                 
                  <textarea name="content"></textarea>
                  <input type="submit" value="Post Comment">

                  @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

              </form>
          </div>
      @empty
          <form method="post" action="{{ route('comments.store') }}">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                  <input type="hidden" name="username" value="{{ auth()->user()->username }}">
              
                  <input type="hidden" name="article_id" value="{{ $article->id }}">
                 
                  <textarea name="content"></textarea>
                  <input type="submit" value="Post Comment">
                  
                  @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

              </form>
      @endforelse
  </div>

          
          @endsection
