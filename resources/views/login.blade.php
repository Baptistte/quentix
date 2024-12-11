<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Inclure Tailwind CSS --}}
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script> {{-- Lottie Player --}}
    <style>
        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: rgba(232, 233, 235, 0.8); /* Light gray with reduced opacity */
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 20px; /* Spacing from the right */
            z-index: 50;
        }

        .navbar a {
            font-size: 1.2rem;
            font-weight: bold;
            color: #4a4a4a;
            text-decoration: none;
            margin: 0 15px; /* Spacing between items */
            transition: color 0.3s ease-in-out;
        }

        .navbar a:hover {
            color: #2563eb; /* Tailwind blue */
        }

        /* Content adjustments */
        body {
            margin: 0; /* Remove default margin to fix navbar gap */
            padding-top: 60px; /* Offset content for the navbar height */
        }
    </style>
</head>
<body style="background-image: url('/images/fresque_rvb_couleur_repeat.svg'); 
             background-repeat: repeat; 
             backdrop-filter: blur(10px);" 
      class="bg-gray-900 flex items-center justify-center min-h-screen relative overflow-hidden">

    <!-- Static Navbar -->
    <div class="navbar">
        <a href="{{ route('home') }}">🏠 Accueil</a>
        <a href="#about">📘 À propos</a>
        <a href="{{ route('register') }}">📝 S'inscrire</a>
    </div>

    <!-- Main Container -->
    <div class="relative bg-white bg-opacity-90 rounded-xl shadow-2xl p-6 md:p-12 flex w-11/12 md:w-3/4 lg:w-2/3 max-w-4xl z-20">
        <!-- Lottie Animation -->
        <div class="hidden md:block w-1/2 flex items-center justify-center">
            <dotlottie-player src="https://lottie.host/b3297f97-a1da-4f7e-8f7e-28b05140e965/CQIgDZ4U7M.lottie" 
                              background="transparent" 
                              speed="1" 
                              style="width: 300px; height: 300px" 
                              loop autoplay>
            </dotlottie-player>
        </div>

        <!-- Login Form -->
        <div class="w-full md:w-1/2 flex flex-col justify-center px-6">
            <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Bienvenue</h1>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Adresse email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Entrez votre email">
                </div>
                <!-- Mot de passe -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Entrez votre mot de passe">
                </div>
                <!-- Bouton de connexion -->
                <button type="submit"
                    class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                    Connexion
                </button>
            </form>
            <!-- Lien vers l'inscription -->
            <p class="text-center text-gray-600 mt-4">
                Pas encore de compte ? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Inscrivez-vous</a>.
            </p>
        </div>
    </div>

    <!-- Messages d'erreurs ou succès -->
    <div class="absolute bottom-4 right-4 space-y-3">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg shadow-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg shadow-lg">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>
</html>