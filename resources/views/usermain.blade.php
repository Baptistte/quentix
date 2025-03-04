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
        <a href="#solutions">🚀 Mes Solutions</a>
        <a href="#subscription">📜 Mon Abonnement</a>
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

        <!-- Section Abonnement -->
        <section id="subscription" class="section">
            <h2 class="text-2xl font-bold mb-3">📜 Mon Abonnement</h2>
            @if($subscription)
                <div class="p-4 border border-gray-300 rounded-lg bg-gray-50">
                    <p><strong>Type :</strong> {{ $subscription->plan_name }}</p>
                    <p><strong>Prix :</strong> {{ $subscription->price }}€ / mois</p>
                    <p><strong>Renouvellement :</strong> {{ $subscription->renewal_date->format('d/m/Y') }}</p>
                </div>
            @else
                <p class="text-gray-500">Aucun abonnement actif.</p>
                <a href="{{ route('subscriptions.index') }}" class="btn-primary mt-4 inline-block">Souscrire</a>
            @endif
        </section>

        <!-- Section Solutions Déployées -->
        <section id="solutions" class="section">
            <h2 class="text-2xl font-bold mb-3">🚀 Mes Solutions Déployées</h2>
            @if(isset($solutions) && $solutions->count())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($solutions as $solution)
                        <div class="p-4 border border-gray-300 rounded-lg bg-gray-50">
                            <p><strong>Nom :</strong> {{ $solution->name }}</p>
                            <p><strong>Domaine :</strong> {{ $solution->domain }}</p>
                            <span class="status-badge {{ $solution->status === 'Actif' ? 'status-active' : 'status-inactive' }}">
                                {{ $solution->status }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Aucune solution déployée.</p>
                <a href="{{ route('solutions.wordpress') }}" class="btn-primary mt-4 inline-block">Déployer une Solution</a>
            @endif
        </section>

        <!-- Support -->
        <section class="text-center" id='bottomFooter'>
            <a href="/support" class="btn-primary">Besoin d'aide ? Contactez-nous</a>
        </section>
    </div>

</body>
</html>