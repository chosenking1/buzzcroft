@extends('layouts.app')

@section('content')
    <h1>Admin/Author Login</h1>
    <form method="post" action="{{ route('admin.login') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>
@endsection
