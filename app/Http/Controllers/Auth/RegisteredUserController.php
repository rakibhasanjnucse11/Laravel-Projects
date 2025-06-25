<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;  // ✅ Add this import
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // 👇 Redirect to profile completion
        return redirect()->route('profile.edit');
    }

    protected function registered(Request $request, $user)  
    {
        return redirect()->route('profile.edit');
    }
    public function create()
    {
        return view('auth.register');
    }

}
