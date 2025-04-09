<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JenkinsController extends Controller
{
    public function triggerJob(Request $request)
    {
        $userID = $request->input('UserID');
        $serviceID = $request->input('ServiceID');
        $nomConteneur = $request->input('NomConteneur');

        // Récupérer les données depuis le .env
        $jenkinsUrl   = env('JENKINS_URL');
        $username     = env('JENKINS_USERNAME');
        $apiToken     = env('JENKINS_API_TOKEN');

        // Requête HTTP vers Jenkins en utilisant les données du .env
        $response = Http::asForm() // Nécessaire pour envoyer des données en x-www-form-urlencoded
            ->withBasicAuth($username, $apiToken)
            ->post($jenkinsUrl, [
                'UserID'      => $userID,
                'ServiceID'   => $serviceID,
                'NomConteneur'=> $nomConteneur,
            ]);

        if ($response->successful()) {
            return response()->json(['success' => true, 'message' => 'Job Jenkins lancé avec succès']);
        } else {
            return response()->json([
                'success' => false,
                'status'  => $response->status(),
                'message' => 'Erreur Jenkins',
                'details' => $response->body()
            ], $response->status());
        }
    }
}