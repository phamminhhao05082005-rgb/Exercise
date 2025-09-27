<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function indexWeb()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }



    public function storeUser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password), 
            'role' => $request->role ?? 'employee',
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
            'is_public' => $request->has('is_public'),
        ]);

        return redirect()->route('users.index');
    }



    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }



    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role ?? $user->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
            'public_uri' => $request->public_uri,
            'is_public' => $request->has('is_public'),
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password); 
        }

        $user->update($data);

        return redirect()->route('users.index');
    }




    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }

    public function employeeView()
    {
        $user = Auth::user();
        return view('users.employee', compact('user'));
    }
}
