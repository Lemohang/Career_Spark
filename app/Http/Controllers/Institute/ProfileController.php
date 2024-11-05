<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Get the authenticated user's institute
        $institute = Auth::user()->institute; 
        return view('institute.profile.show', compact('institute'));
    }

    public function edit()
    {
        // Get the authenticated user's institute for editing
        $institute = Auth::user()->institute;
        return view('institute.profile.edit', compact('institute'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:institutes,email,' . Auth::id(),
            // Add any other fields as necessary
        ]);

        $institute = Auth::user()->institute;
        $institute->update($request->all());

        return redirect()->route('institute.profile.show')->with('success', 'Profile updated successfully.');
    }
}
