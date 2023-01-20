<!-- deletearticle.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="bg-red-500 text-white text-center py-4 lg:px-4">
            <h2 class="text-lg">Are you sure you want to delete this article?</h2>
            <form method="post" action="{{ route('articles.destroy', $article) }}">
                @csrf
                @method('DELETE')
                <button class="bg-red-700 hover:bg-red-800 text-white py-2 px-4 rounded-lg">Delete</button>
                <a href="{{ route('articles.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded-lg">Cancel</a>
            </form>
        </div>
    </div>
@endsection
