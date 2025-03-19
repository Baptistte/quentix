<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PurchaseHistory; // Import du modèle
use App\Models\Plan;


class SubscriptionController extends Controller
{
    /**
     * Display the subscription plans page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('subscriptions.index');
    }


    public function subscribe(Request $request)
    {
        // Vérifie si l'utilisateur est bien connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour choisir un abonnement.');
        }
    
        // Récupère l'utilisateur connecté
        $user = Auth::user();
    
        if (!$user instanceof User) {
            return redirect()->route('dashboard')->with('error', "Utilisateur non trouvé.");
        }
    
        $planId = $request->input('plan_id'); // Récupération de l'ID du plan
    
        // 🔹 Récupère les infos du plan depuis la base de données
        $plan = Plan::find($planId);
    
        if (!$plan) {
            return redirect()->route('subscriptions.index')->with('error', "Le plan sélectionné n'existe pas.");
        }
    
        // Met à jour le champ subscription_plan_id dans la table users
        $user->subscription_plan_id = $planId;
        $user->save(); // 🔹 Sauvegarde de l'utilisateur
    
        // 🔹 Enregistre l'achat dans l'historique
        PurchaseHistory::create([
            'user_id' => $user->id,
            'subscription_plan_id' => $planId,
            'amount' => $plan->price, // Utilise le prix du plan directement
            'purchase_date' => now(),
            'plan_id' => $planId,
            'plan_name' => $plan->name, // 🔹 On récupère le nom du plan
        ]);
    
        return redirect()->route('user.space')->with('success', "L'utilisateur \"{$user->name}\" a choisi le plan \"{$plan->name}\".");
    }
  

}