<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Plan;
use App\Models\Site;

class UserSpaceController extends Controller
{
    /**
     * Afficher l'espace utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les informations de l'abonnement de l'utilisateur
        $subscription = $user->subscription_plan_id 
            ? Plan::find($user->subscription_plan_id) 
            : null;

        // Récupérer les sites associés à l'utilisateur
        $sites = Site::where('user_id', $user->id)->get();

        return view('usermain', [
            'user' => $user,
            'subscription' => $subscription,
            'sites' => $sites,
        ]);
    }
}