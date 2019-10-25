<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginUserRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = User::whereEmail($validated['email'])->first();

            Auth::login($user);
            return redirect('/');
        }
    }
}
