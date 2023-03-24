<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Wrong credentials provided.'
            ]);
        }

        session()->regenerate();

        return redirect()->route('home')->with('success', 'Logged in!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('login')->with('success', 'Logged out!');
    }
}
