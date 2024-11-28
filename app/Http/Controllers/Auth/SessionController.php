<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SessionController extends Controller
{
    // Renders Login Form
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    // Handles Login Form Submission
    public function store(Request $request)
    {
        // validate request data
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // check for existing email
        $user = User::where('email', $validated['email'])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'The provided email address does not exist in our records.']);
        }

        // attempt login credentials
        if(!Auth::attempt($validated)) {
            return back()->withErrors(['password' => 'Incorrect password.  Please try again.']);
        }

        // Regenerate Session
        session()->regenerate();

        // Redirect to home page
        return redirect()->intended('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
