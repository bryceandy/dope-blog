<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\User;

class RegisterController extends Controller
{
    // Display the registration form
    public function edit()
    {
        return view('auth.register');
    }

    // Register user and save in the db
    public function store(RegisterUserRequest $request)
    {
        $request['password'] = bcrypt($request->password); //hash password

        $user = User::where('email', $request->email)->first(); //check if user exists
        if ($user) {
            return back()->with(['error_message' => 'This user already exists']);
        }

        User::create($request->all());
        return back()->with(['success_message' => 'User registered successfully!']) ;
    }
}
