<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;

class PlanController extends Controller
{
    /**
     * Afficher tous les plans disponibles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer tous les plans disponibles
        $plans = Plan::all();

        return view('plans.index', ['plans' => $plans]);
    }

    /**
     * Afficher les détails d'un plan spécifique.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Récupérer le plan par son ID
        $plan = Plan::findOrFail($id);

        return view('plans.show', ['plan' => $plan]);
    }

    /**
     * Gérer l'abonnement à un plan.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe($id)
    {
        $user = auth()->user;

        // Vérifier si le plan existe
        $plan = Plan::findOrFail($id);

        // Mettre à jour l'utilisateur avec le plan sélectionné
        $user->subscription_plan_id = $plan->id;
        $user->save();

        return redirect()->route('user.space')->with('success', 'Vous avez souscrit avec succès au plan : ' . $plan->name);
    }
}