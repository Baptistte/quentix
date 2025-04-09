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

        // URL Jenkins
        $jenkinsUrl = "http://192.168.10.21:8080/job/pipeline-test/buildWithParameters";

        // Authentification de base (⚠️ à sécuriser dans le .env)
        $username = "quentix";
        $apiToken = "11a5f6e8151b599b7cc3a0c7dc70b7e66c";

        // Requête HTTP vers Jenkins (bypass CORS car backend)
        $response = Http::asForm() // <-- ceci est crucial !
            ->withBasicAuth($username, $apiToken)
            ->post($jenkinsUrl, [
                'UserID' => $userID,
                'ServiceID' => $serviceID,
                'NomConteneur' => $nomConteneur,
            ]);

        if ($response->successful()) {
            return response()->json(['success' => true, 'message' => 'Job Jenkins lancé avec succès']);
        } else {
            return response()->json([
                'success' => false,
                'status' => $response->status(),
                'message' => 'Erreur Jenkins',
                'details' => $response->body()
            ], $response->status());
        }
    }
}