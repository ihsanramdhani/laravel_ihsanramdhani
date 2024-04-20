<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // login
    public function showLoginForm()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $hardcodedUsername = 'username';
        $hardcodedPassword = 'password';

        if ($credentials['username'] == $hardcodedUsername && $credentials['password'] == $hardcodedPassword) {
            return redirect()->route('hospital');
        } else {
            return redirect()->route('login')->with('failed', 'Invalid Credentials');
        }


    }
}
