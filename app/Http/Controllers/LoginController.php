<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Display the login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('auth.login');
    }

    /**
     * Authenticate user and login
     *
     * @param LoginUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function session(LoginUserRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = User::whereEmail($validated['email'])->first();

            Auth::login($user);
            return redirect('/');
        }
        return back()->with(['error_message' => 'Your email and or password is incorrect']);
    }

    /**
     * Logout the authenticated user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        auth()->logout();
        return redirect('login');
    }
}
