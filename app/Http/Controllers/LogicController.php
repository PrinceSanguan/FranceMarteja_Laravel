<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LogicController extends Controller
{
    public function login() {
        return view ('login');
    }

    public function register() {
        return view ('register');
    }

    public function registerForm(Request $request) {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
    
        // Remove spaces and numbers from the name
        $data['name'] = preg_replace('/[^a-zA-Z]/', '', $request->input('name'));
    
        // Saving in the database
        $user = User::create([
            'name' => $data['name'],
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    
        if (!$user) {
            return redirect()->route('register');
        }
    
        return redirect()->route('login');
    }

    public function loginPost(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

    // Authentication
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Find the corresponding user name based on the ID
            $userName = User::where('id', $user->id)->value('name');

            // Redirect to dashboard with the user name
            return redirect()->route('dashboard', ['name' => $userName]);
        } else {
            // Authentication failed, redirect back with errors
            return redirect()->route('login')->withErrors(['error' => 'Invalid email or password']);
        }
    }

    public function dashboard($userName) {
        // Fetch information for the currently authenticated user based on the provided name
        $users = User::where('name', $userName)->first();

            // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }
    
        // Pass the information to the view
        return view('dashboard', ['users' => $users]);
    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }

}
