<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => ['required', 'same:password'],
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'gender' => $request->gender
        ]);
        return redirect()->route('homepage')->with(['message' => 'Successfully registered', 'user' => $user]);

        return response()->json(['message' => 'Successfully registered']);
    }


    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

//     public function login(Request $request)
// {
//     $validatedData = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:6'
//     ]);

//     if (!Auth::attempt(['email' => $request->email, 'password' => $request->password,'typeofuser' => 'viewer'])) {
//         return redirect()->back()->withErrors(['Invalid credentials']);
//     }

//     return redirect()->route('homepage');
// }

public function login(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();
        if($user->typeofuser == 'admin' || $user->typeofuser == 'author')
            return redirect()->route('add_article');
        else
            return redirect()->route('homepage');
    }

    return redirect()->back()->withErrors(['Invalid credentials']);
}



}
