<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Afficher la page de connexion
    public function showLogin()
    {
        return view('login');
    }

    // Gérer la soumission du formulaire de connexion
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/')->with('success', 'Connexion réussie.');
        }

        return back()->withErrors([
            'email' => 'Les informations d’identification sont incorrectes.',
        ]);
    }

    // Afficher la page d'inscription
    public function showRegister()
    {
        return view('register');
    }

    // Gérer la soumission du formulaire d'inscription
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;
    
        User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
        
    }

    // Déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Vous vous êtes déconnecté.');
    }
}