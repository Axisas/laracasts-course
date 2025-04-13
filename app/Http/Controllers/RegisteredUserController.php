<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {

        
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'confirmed'],
            'password' => ['required', Password::min(6)->letters()->mixedCase()->numbers(), 'confirmed'], // confirmed checks for $name_confirmation

        ]);

        $user = User::create($validatedAttributes);

        Auth::login($user);

        return redirect('/jobs');

    }
}
