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
        //hash password
        $request['password'] = bcrypt($request->password);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return back()->with(['error_message' => 'This user already exists']);
        }
        //create user
        User::create($request->all());
        //return back with a success message
        return back()->with(['success_message' => 'User registered successfully!']) ;
    }
}
