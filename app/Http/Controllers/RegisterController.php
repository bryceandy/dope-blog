<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\User;

class RegisterController extends Controller
{
    public function __invoke(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return back()->with(['message' => 'User registered successfully!']) ;
    }
}
