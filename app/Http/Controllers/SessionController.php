<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store() {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($attributes)) {
            request()->session()->regenerate();
            return redirect('/jobs');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }

        //Other option:
        // if(!Auth::attempt($attributes)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'Invalid email or password'
        //     ]);
        // }

    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
