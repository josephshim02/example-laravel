<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required|string|min:6|confirmed', //check against password_confirmation
        ]);
        $user = User::create($attributes);
        Employer::create(['user_id'=>$user->id, 'name'=>$user->first_name . ' ' . $user->last_name]);
        Auth::login($user);
        return redirect('/jobs');
    }


}
