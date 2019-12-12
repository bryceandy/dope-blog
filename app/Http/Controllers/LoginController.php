<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // Display the login form
    public function edit()
    {
        return view('auth.login');
    }

    // Authenticate user and login
    public function session(LoginUserRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {

            Auth::login(User::where('email', $request['email'])->first());

            return redirect()->to( '/');
        }
        return back()->with(['error_message' => 'Your email and or password is incorrect']);
    }

    // Logout the authenticated user
    public function destroy()
    {
        Auth::logout();

        return redirect('login');
    }
}
