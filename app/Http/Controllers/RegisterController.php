<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\User;

class RegisterController extends Controller
{
    /**
     * Display the registration form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('auth.register');
    }

    /**
     * Register user
     *
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return back()->with(['success_message' => 'User registered successfully!']) ;
    }
}
