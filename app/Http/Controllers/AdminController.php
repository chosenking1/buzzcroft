<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
   

    public function create()
    {
        // Only authenticated admins can access this view
        $this->authorize('isAdmin');
        return view('admin.register');
    }

    public function store(Request $request)
    {
        // Only authenticated admins can register new users
        $this->authorize('isAdmin');

        // Validate the form data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'typeofuser' => 'required|in:admin,writer'
        ]);
        
        // Create the new user
        $user = User::create([
            'username' => $validatedData['username'],
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'typeofuser' => $validatedData['typeofuser'],
        ]);
        
        return redirect()->route('admin.index')->withSuccess("Successfully registered new {$validatedData['typeofuser']}!");
    }
    
    public function removeAdmin(User $user)
    {
        $this->authorize('isAdmin');
        $user->update(['typeofuser'=>'viewer']);
        return redirect()->route('admin.index')->withSuccess("Successfully removed an admin!");
    }
    
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

}
