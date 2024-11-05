<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle user registration
     */
    public function register(RegisterRequest $request)
    {
        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Trigger email verification if applicable
        event(new Registered($user));

        // Log the user in after registration
        Auth::login($user);

        return response()->json([
            'message' => 'Registration successful. Please check your email to verify your account.',
            'user' => $user,
        ], 201);
    }

    /**
     * Handle user login
     */
    public function login(LoginRequest $request)
    {
        // Check credentials and attempt login
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login credentials'
            ], 401);
        }

        // Generate access token with Sanctum
        $token = $request->user()->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => Auth::user(),
            'token' => $token,
        ], 200);
    }

    /**
     * Update user profile
     */
    public function updateProfile(ProfileRequest $request)
    {
        $user = $request->user();

        // Update the profile with validated data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
        ], 200);
    }

    /**
     * Handle email verification (optional)
     */
    public function verifyEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.'], 200);
        }

        $request->user()->markEmailAsVerified();

        return response()->json(['message' => 'Email verified successfully.'], 200);
    }
}
