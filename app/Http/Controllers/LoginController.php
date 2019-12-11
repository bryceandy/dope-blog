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
        $validated = $request->validated();

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = User::where('email', $validated['email'])->first();

            Auth::login($user);
            return redirect()->to( '/');
        }
        return back()->with(['error_message' => 'Your email and or password is incorrect']);
    }

    // Logout the authenticated user
    public function destroy()
    {
        auth()->logout();
        return redirect('login');
    }
}
