<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PublicProfileController extends Controller
{
    public function show($public_uri)
    {
        
        $user = User::where('public_uri', '/' . $public_uri)->firstOrFail();

        
        if ($user->is_public) {
            return view('public.profile', compact('user'));
        }

        
        if (Auth::check()) {
            $currentUser = Auth::user();

            
            if ($currentUser->role === 'admin') {
                return view('public.profile', [
                    'user' => $user,
                    'notice' => 'This profile is currently private (only admin can view it).'
                ]);
            }

            
            if ($currentUser->id === $user->id) {
                return view('public.profile', [
                    'user' => $user,
                    'notice' => 'This profile is currently private (only you can view it).'
                ]);
            }
        }

        
        abort(403, 'This profile is private and not accessible.');
    }
}
