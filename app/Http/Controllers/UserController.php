<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('Auth.login');
    }

    public function registerForm()
    {
        return view('Auth.register');
    }

    public function loginUser(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Logic for user authentication
        // If authentication is successful, redirect to dashboard
        // If authentication fails, redirect back with an error message
        if (auth()->attempt($validate)) {
            // Authentication passed, redirect to dashboard
            session()->regenerate();
            Auth::login(auth()->user());
            //get users playlists
            $user = auth()->user();
            $user->playlists = $user->playlists()->get();
            return redirect()->route('dashboard', compact('user'));
        }
        
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function registerUser(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
        ]);

       
        if ($user) {
            return redirect()->route('loginForm')->with('success', 'Registration successful. Please log in.');
        }
        return redirect()->back()->withErrors(['registration' => 'Registration failed. Please try again.'])->withInput();
        
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('loginForm');
    }
}
