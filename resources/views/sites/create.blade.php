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
            display: flex;
            justify-content: center;
            align-content: center;
            margin-left: 270px;
            padding: 40px;
            margin-top: 110px;
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
    <div class="main-content">
        <div class="bg-white text-gray-900 shadow-lg rounded-xl p-8 max-w-5xl w-full flex flex-col md:flex-row gap-12">
            <!-- Formulaire -->
            <div class="w-full md:w-1/2">
                <h1 class="text-3xl font-bold text-center md:text-left mb-6">🚀 Lancez votre site en quelques clics</h1>
                <p class="text-center md:text-left text-gray-600 mb-6">Complétez les informations ci-dessous pour générer votre site.</p>
        
                <form action="{{ route('sites.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Nom du site -->
                    <div>
                        <label for="site_name" class="block text-lg font-semibold text-gray-700 mb-2">Nom du site</label>
                        <input type="text" id="site_name" name="site_name" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800">
                    </div>
        
                    <!-- Service choisi -->
                    <div>
                        <label for="service" class="block text-lg font-semibold text-gray-700 mb-2">Service</label>
                        <select id="service" name="service" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800">
                            <option value="wordpress">WordPress</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
        
                    <!-- URL du site -->
                    <div>
                        <label for="domain" class="block text-lg font-semibold text-gray-700 mb-2">URL désirée</label>
                        <input type="text" id="domain" name="domain" placeholder="ex: monsite.quentix.com" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800">
                    </div>
        
                    <!-- Bouton de validation -->
                    <button type="submit"
                        class="w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
                        🌍 Créer mon site
                    </button>
                </form>
            </div>
        
            <!-- Section Témoignages Clients -->
            <div class="w-full md:w-1/2 flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-center md:text-left mb-6">💬 Témoignages de nos utilisateurs</h2>
                <div class="space-y-6">
                    <!-- Avis 1 -->
                    <div class="bg-gray-50 text-gray-900 shadow-md p-6 rounded-lg">
                        <p class="text-lg font-semibold text-purple-600">⭐️⭐️⭐️⭐️⭐️</p>
                        <p class="text-gray-700 mt-2">"Quentix a rendu la création de site web super simple ! Mon site était en ligne en quelques minutes."</p>
                        <p class="text-sm font-semibold mt-4">— Julien D.</p>
                    </div>
                    
                    <!-- Avis 2 -->
                    <div class="bg-gray-50 text-gray-900 shadow-md p-6 rounded-lg">
                        <p class="text-lg font-semibold text-purple-600">⭐️⭐️⭐️⭐️⭐️</p>
                        <p class="text-gray-700 mt-2">"L'interface est intuitive et le support technique est excellent. Je recommande à 100% !"</p>
                        <p class="text-sm font-semibold mt-4">— Sarah L.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>