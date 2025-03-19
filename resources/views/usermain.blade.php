<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Quentix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Styles généraux */
        body {
            background: linear-gradient(to bottom, #6B21A8, #EDE9FE);
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            background: white;
            color: black;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar a {
            text-decoration: none;
            color: black;
            font-size: 18px;
            font-weight: 500;
            padding: 12px 0;
            transition: 0.3s ease-in-out;
        }

        .sidebar a:hover {
            transform: translateX(5px);
        }

        .sidebar .logo {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 40px;
            height: 25px;
        }

        /* Contenu principal */
        .main-content {
            margin-left: 270px;
            padding: 40px;
        }

        .main-content h1 {
            margin-bottom: 40px;
        }

        /* Section */
        .section {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .section:hover {
            transform: translateY(-5px);
        }

        /* Boutons */
        .btn-primary {
            background: #6B21A8;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background: #5A1A91;
        }

        .status-badge {
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .status-active {
            background: #22C55E;
            color: white;
        }

        .status-inactive {
            background: #EF4444;
            color: white;
        }
        #bottomFooter {
            justify-content: end;
            align-content: flex-end;
            height: 190px;
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="flex justify-center">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logoQuentixsansRouNoir.svg') }}" alt="Quentix Logo" class="logo">
            </a>
        </div>
        <a href="#profile">👤 Mon Profil</a>
        <a href="{{ route('sites.index') }}">🚀 Mes Solutions</a>
        <a href="#subscription">📜 Mon Abonnement</a>
        <a href="{{ route('purchase.history') }}">🛒 Historique</a>
        <a href="/">🏠 Accueil</a>

        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="btn-primary w-full">Déconnexion</button>
        </form>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <h1 class="text-4xl font-bold text-white mb-6">Bienvenue, {{ Auth::user()->name }} 👋</h1>

        <!-- Section Profil -->
        <section id="profile" class="section">
            <h2 class="text-2xl font-bold mb-3">👤 Mes Informations</h2>
            <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
            <p><strong>Date d'inscription :</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
        </section>

        <section id="subscription" class="section">
            <h2 class="text-2xl font-bold mb-3">📜 Mon Abonnement</h2>
            @if($subscription)
                <div class="p-3 border border-gray-300 rounded-lg bg-gray-50 flex items-center justify-between w-80">
                    <div>
                        <p class="text-lg font-semibold">{{ $subscription->name }}</p>
                        <p class="text-gray-600">{{ $subscription->price }}€ / mois</p>
                    </div>
                    <!-- Bouton "?" pour afficher les infos -->
                    <button onclick="showSubscriptionInfo()" class="text-purple-600 text-2xl font-bold bg-transparent border-none cursor-pointer">
                        ?
                    </button>
                </div>
            @else
                <p class="text-gray-500">Aucun abonnement actif.</p>
                <a href="{{ route('subscriptions.index') }}" class="btn-primary mt-4 inline-block">Souscrire</a>
            @endif
        </section>

        <!-- Section Solutions Déployées -->
        <section id="solutions" class="section">
            <h2 class="text-2xl font-bold mb-6">🚀 Mes Solutions Déployées</h2>

            @if(isset($solutions) && $solutions->count())
                <div class="flex flex-wrap gap-2.5">
                    @foreach($solutions->take(4) as $solution)
                        <div class="w-[20%] p-5 border border-gray-300 rounded-xl bg-white shadow-md flex flex-col items-center justify-center text-center hover:shadow-lg transition">
                            <h3 class="text-lg font-bold text-gray-800">{{ $solution->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $solution->domain }}</p>
                            <span class="mt-2 px-3 py-1 text-sm font-semibold rounded-full 
                                {{ $solution->status === 'Actif' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                                {{ $solution->status }}
                            </span>
                        </div>
                    @endforeach

                    <!-- Widget pour voir plus -->
                    <div class="w-[20%] p-5 flex items-center justify-center border border-gray-300 rounded-xl bg-white shadow-md hover:shadow-lg transition cursor-pointer">
                        <a href="{{ route('sites.index') }}" class="text-purple-600 text-4xl font-bold flex items-center justify-center">
                            ➜
                        </a>
                    </div>
                </div>
            @else
                <p class="text-gray-500">Aucune solution déployée.</p>
                <a href="{{ route('solutions.wordpress') }}" class="btn-primary mt-4 inline-block">
                    Déployer une Solution
                </a>
            @endif
        </section>

        <!-- Support -->
        <section class="text-center" id='bottomFooter'>
            <a href="/support" class="btn-primary">Besoin d'aide ? Contactez-nous</a>
        </section>
    </div>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showSubscriptionInfo() {
        // Données dynamiques venant de Laravel
        let features = @json(json_decode($subscription->features)); // Décode les features en JSON

        // Convertir les features en liste HTML dynamique
        let featureList = `
            <ul style="text-align:left;">
                <li>${features.sites_inclus} site(s) inclus</li>
                <li>${features.hebergement_securise ? '✔️ Hébergement sécurisé' : '❌ Hébergement non sécurisé'}</li>
                <li>${features.certificat_ssl_inclus ? '✔️ Certificat SSL inclus' : '❌ Pas de certificat SSL'}</li>
                <li>${features.support_premium_24_7 ? '✔️ Support Premium 24/7' : '❌ Pas de support premium'}</li>
                <li>${features.sauvegardes_automatiques ? '✔️ Sauvegardes automatiques' : '❌ Pas de sauvegardes automatiques'}</li>
                <li>${features.gestion_multilingue ? '✔️ Gestion multilingue' : '❌ Pas de gestion multilingue'}</li>
            </ul>
        `;

        // Afficher la pop-up avec les features dynamiques
        Swal.fire({
            title: "Détails de l'abonnement",
            html: `
                <p><strong>Type :</strong> {{ $subscription->name }}</p>
                <p><strong>Prix :</strong> {{ $subscription->price }}€ / mois</p>
                ${featureList}
            `,
            icon: "info",
            confirmButtonText: "OK",
            confirmButtonColor: "#6B21A8"
        });
    }
</script>