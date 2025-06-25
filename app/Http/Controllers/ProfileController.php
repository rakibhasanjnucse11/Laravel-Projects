<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the user's profile and projects.
     */
    public function index()
    {
        $profile = Auth::user()->profile;
        $projects = Auth::user()->projects;
        return view('dashboard', compact('profile', 'projects'));
    }

    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        $user = Auth::user(); // get current logged-in user
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the profile data.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // validate email uniqueness except for current user
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'skills' => 'nullable|string',
            'education' => 'nullable|string',
            'experience' => 'nullable|string',
        ]);

        // Update user fields with validated data
        $user->update($validated);

        // Redirect to dashboard or profile with success message
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }
}
