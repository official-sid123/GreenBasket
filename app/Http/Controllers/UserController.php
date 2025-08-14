<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SendEmailController;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('login');
    }

    public function validatecredential(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Prevent session fixation
            session(['email' => $credentials['email']]); //assignment
            return redirect()->route('products.index'); // Better to use named route
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showProfile()
    {
        return view('profile', [
            'user' => Auth::user() // Pass the authenticated user to the view
        ]);
    }
    public function updateProfile()
    {
        return view('profile.show', [
            'user' => Auth::user() // Pass the authenticated user to the view
        ]);
    }

    public function profileupdate(Request $request)
    {

        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4048',
        ]);

        $user = auth()->user();

        // If user uploaded a new image
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->image_url && file_exists(storage_path('app/public/' . $user->image_url))) {
                unlink(storage_path('app/public/' . $user->image_url));
            }

            // Store new image and get path
            $path = $request->file('profile_image')->store('sid', 'public');
            $user->image_url = $path; // store full path like "sid/filename.jpg"
        }


        $user->name = $validated['name']; // safer than $request->name
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }


    public function logout(Request $request)
    {
        Auth::logout(); //session destroy 
        //session_destroy();//assignment
        return redirect('/users')->with('success', 'Logged out successfully');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveregister(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'sometimes|in:user,admin'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] ?? 'user'
        ]);

        app(SendEmailController::class)->sendEmail($user);

        // Optional: Log the user in after registration
        auth()->login($user);

        return redirect()->route('users.login')->with('success', 'Registration successful!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
