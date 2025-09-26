<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLoginForm()
    {

        return view('users.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:1',
        ]);

        $credentials = $request->only('username', 'password');

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('success', 'You have logged in successfully.!');

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('users.index');
            } else {
                return redirect()->route('users.employee');
            }
        }

        return back()->with('error', 'Incorrect username or password');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have successfully logged out.!');
    }
}
