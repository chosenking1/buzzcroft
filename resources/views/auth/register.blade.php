@extends('layouts.app')

@section('content')
    <h1>Register</h1>
    <form method="post" action="{{ route('admin.register.store') }}">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" id="fullname">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        <label for="typeofuser">Account Type:</label>
        <select name="typeofuser" id="typeofuser">
            <option value="viewer">Viewer</option>
            <option value="author">Author</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Register</button>
    </form>
@endsection
