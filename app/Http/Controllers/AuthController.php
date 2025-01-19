<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    //Inscription d’un utilisateur


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:candidat,recruteur',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        Auth::login($user);
    
        return redirect()->route('home'); // Redirige vers une page après connexion
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
    
            return redirect()->route('home'); // Redirige après connexion
        }
    
        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login'); // Redirige vers la page de connexion
    }    
}
