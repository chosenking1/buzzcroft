<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
   
    public function create()
    {
        // Only authenticated admins can access this view
        $this->authorize('isAdmin');
        return view('auth.register');
    }

    // public function showUpdateForm()
    // {
    //     return view('user.register');
    // }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function register(Request $request)
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

    public function adminLogin(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    if (!Auth::attempt(['email' => $request->email, 'password' => $request->password, 'typeofuser' => ['admin','author']])) {
        return redirect()->back()->withErrors(['Invalid credentials']);
    }

    return redirect()->route('admin.home');
}


    
    
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

}
