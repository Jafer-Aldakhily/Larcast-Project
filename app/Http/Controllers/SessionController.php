<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // check validation request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to login in
        if(auth()->attempt($attributes)) // using the provided credintails which comes from the user request 
        {
            session()->regenerate(); // saving app from session fixtion attack
            return redirect('/')->with('success' , 'Welcome Back!'); // flash message
        }

        // failed authentication

        throw ValidationException::withMessages([
            'email' => 'Your provided credintails are not verified'
        ]);

        

        
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success' , 'Goodbay!');
    }
}
