<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                ],
                [
                    'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, and one number.'
                ]
            );

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ]);

            Role::assignRole($user->id, 'admin');
            return redirect()->route('login')->with('success', 'Registration successful! Please login.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }
}
