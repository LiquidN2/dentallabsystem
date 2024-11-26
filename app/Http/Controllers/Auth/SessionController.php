<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        // check for existing email

        // attempt login credentials
        dd($request->input('email'));
    }

    public function destroy()
    {
        dd('Logout');
    }
}
