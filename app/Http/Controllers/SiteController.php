<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import DB facade for transactions
use Exception; // Import Exception for transaction error handling

class SiteController extends Controller
{
    public function create()
    {
        // Pass the current user's credits to the view if needed, though the JS already handles it
        $userCredits = Auth::user()->credits ?? 0;
        return view('sites.create', compact('userCredits'));
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
        // Define the cost
        $siteCreationCost = 500;

        // Get the authenticated user
        $user = Auth::user(); // Or $request->user();

        // --- Server-side Credit Check ---
        if ($user->credits < $siteCreationCost) {
            // Redirect back with an error message if credits are insufficient
            return redirect()->back()->withErrors(['credits' => 'Crédits insuffisants pour créer ce site.'])->withInput();
            // Using withErrors is conventional for form validation issues
            // withInput() keeps the user's entered data in the form
        }

        // Validation des données (remains the same)
        $validatedData = $request->validate([
            'site_name' => 'required|string|max:255',
            'service' => 'required|string',
            'domain' => 'required|string|unique:sites,domain|max:255',
            // Removed 'statut_id' validation as we set it manually
            // Added validation for nomConteneur if needed, assuming it comes from site_name
            'nomConteneur' => 'required|string|max:255',
        ]);

        // --- Use a Database Transaction ---
        // This ensures that both site creation and credit deduction succeed or fail together
        try {
            DB::beginTransaction();

            // Création du site
            $site = Site::create([
                'user_id' => $user->id, // Use the user object we fetched
                'name' => $validatedData['site_name'],
                'service' => $validatedData['service'],
                'domain' => $validatedData['domain'],
                'statut_id' => '1', // Statut par défaut (Actif ou En cours de création)
                'server_id' => '8.8.8.8' // Placeholder - update as needed
            ]);

            // --- Deduct Credits ---
            // Use decrement for atomic operation
            $user->decrement('credits', $siteCreationCost);

            // If everything went well, commit the transaction
            DB::commit();

            // Redirect on success
            return redirect()->route('sites.index')->with('success', 'Votre site a été créé avec succès et ' . $siteCreationCost . ' crédits ont été déduits.');

        } catch (Exception $e) {
            // If anything fails, roll back the transaction
            DB::rollBack();

            // Log the error for debugging
            // Log::error("Site creation/credit deduction failed for user {$user->id}: " . $e->getMessage());

            // Redirect back with a generic error message
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la création du site ou de la déduction des crédits. Veuillez réessayer.'])->withInput();
        }
    }
}