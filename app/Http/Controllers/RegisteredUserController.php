<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {

        // Validate the form data
        $attributes = request()->validate([
            'first_name' => ['required', 'string', 'max:255', 'min:2'],
            'last_name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', Password::min(6)->max(255)->numbers()->letters(), 'confirmed'],
        ]);
        // Create the user
        $user = User::create($attributes);
        //     [
        //     'first_name' => request('first_name'),
        //     'last_name' => request('last_name'),
        //     'email' => request('email'),
        //     'password' => bcrypt(request('password')),
        // ]

        // Log the user in
        Auth::login($user);
        // Redirect somewhere

        return redirect('/jobs');
    }
}
