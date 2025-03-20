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
            justify-content: center;
            align-content: center;
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
        <a href="{{ route('user.space') }}">👤 Mon Profil</a>
        <a href="{{ route('user.space') }}">🚀 Mes Solutions</a>
        <a href="{{ route('user.space') }}">📜 Mon Abonnement</a>
        <a href="{{ route('purchase.history') }}">🛒 Historique</a>
        <a href="/">🏠 Accueil</a>

        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="btn-primary w-full">Déconnexion</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content flex-grow p-8 overflow-y-auto">

        <h1 class="text-3xl font-bold text-white mb-6">🌍 Mes Sites</h1>
        <!-- Header -->
        <header class="flex justify-between items-center bg-white p-6 rounded-md shadow-md mb-8">
        <div class="space-y-1">
            <h1 class="text-2xl font-bold">Vue globale de vos solution(s) déployée(s)</h1>
            <p class="text-lg font-semibold text-gray-800">
                Bonjour, {{ Auth::user()->name }}, vous avez actuellement 
                <span class="text-purple-600">{{ $sites->count() }}</span> site(s) actif(s).
            </p>
        </div>
        
        </header>


        <!-- Grille des sites -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        @foreach($sites as $site)
            <div class="bg-white p-6 rounded-xl shadow-lg flex flex-col justify-between relative w-full">
            <!-- Icône du service -->
            <div class="absolute top-4 right-4 text-gray-400 text-2xl">
                @if($site->service === 'wordpress')
                📝
                @else
                🖥️
                @endif
            </div>

            <!-- Nom du site -->
            <h2 class="text-xl font-bold text-gray-900">{{ $site->name }}</h2>
            <!-- Domaine -->
            <p class="text-gray-600 text-sm mt-2">🔗 {{ $site->domain }}</p>

            <!-- Statut -->
            <span class="mt-4 inline-block px-3 py-1 text-xs font-semibold text-white rounded-lg
                {{ $site->statut_id == 1 ? 'bg-green-500' : 'bg-red-500' }}">
                {{ $site->statut_id == 1 ? 'Actif' : 'Inactif' }}
            </span>

            <!-- Boutons d'action -->
            <div class="mt-6 flex space-x-3">
                {{-- <a href="{{ route('sites.manage', $site->id) }}" --}}
                <a 
                class="px-4 py-2 text-sm font-semibold text-white bg-purple-600 rounded-lg hover:bg-purple-700 transition">
                ⚙️ Gérer
                </a>
                {{-- <form method="POST" action="{{ route('sites.destroy', $site->id) }}"> --}}
                <form method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                    ❌ Supprimer
                </button>
                </form>
            </div>
            </div>
        @endforeach

        <!-- Widget vide pour ajouter un site -->
        <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-center cursor-pointer">
            <a href="{{ route('sites.create') }}" class="text-6xl text-gray-400 hover:text-gray-600 transition">
            +
            </a>
        </div>
        </div>
    </div>

    
</body>
</html>