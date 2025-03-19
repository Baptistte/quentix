<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function create()
    {
        return view('sites.create');
    }

    public function index()
    {        
        // Récupère tous les sites appartenant à l'utilisateur connecté
        $sites = Site::where('user_id', Auth::id())->get();

        // Passe les sites à la vue
        return view('sites.index', compact('sites'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'site_name' => 'required|string|max:255',
            'service' => 'required|string',
            'domain' => 'required|string|unique:sites,domain|max:255',
            'statut_id' => 'string'
        ]);

        // Création du site
        $site = Site::create([
            'user_id' => Auth::id(), // Associe le site à l'utilisateur connecté
            'name' => $request->input('site_name'),
            'service' => $request->input('service'),
            'domain' => $request->input('domain'),
            'statut_id' => '1', // Statut par défaut
            'server_id' => '8.8.8.8'
        ]);

        return redirect()->route('sites.index')->with('success', 'Votre site a été créé avec succès.');
    }


}

