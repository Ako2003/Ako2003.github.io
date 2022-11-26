<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogIn extends Controller
{
    //Check the validation of the user

    public function check(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect('dashboard');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    // Logout the user

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
