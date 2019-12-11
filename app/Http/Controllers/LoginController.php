<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

    /**
     * Display the login form
     *
     * @return Factory|View
     */
    public function edit()
    {
        return view('auth.login');
    }

    /**
     * Authenticate user and login
     *
     * @param LoginUserRequest $request
     * @return RedirectResponse|Redirector
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
     * @return RedirectResponse|Redirector
     */
    public function destroy()
    {
        auth()->logout();
        return redirect('login');
    }
}
