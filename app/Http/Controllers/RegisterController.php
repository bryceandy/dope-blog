<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\User;

class RegisterController extends Controller
{
    public function store(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($validatedData['password']);

         return User::create($validatedData);
    }
}
