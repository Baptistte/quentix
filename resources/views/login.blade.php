<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Inclure Tailwind CSS --}}
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script> {{-- Lottie Player --}}
    <style>
        body {
            margin: 0; /* Remove default margin to fix navbar gap */
        }
        .logo {
            height: 25px; /* Agrandissement léger du logo */
        }
        #maincontainer {
            height: 80svh;
        }
    </style>
</head>
<body>

    <header class="sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex items-center h-20">

            <!-- Première div - Alignée à gauche -->
            <div class="w-1/3 flex justify-start">
                <nav class="space-x-6 flex items-center">
                    <a href="/#features" class="flex items-center text-black hover:text-blue-300 transition">
                        <span class="ml-2">Services</span>
                    </a>
                    <a href="/#about" class="flex items-center text-black hover:text-blue-300 transition">
                        <span class="ml-2">À propos</span>
                    </a>
                    <a href="/#contact" class="flex items-center text-black hover:text-blue-300 transition">
                        <span class="ml-2">Contacter nous</span>
                    </a>
                    <a href="{{ route('subscriptions.index') }}" class="flex items-center text-black hover:text-blue-300 transition">
                        <span class="ml-2">Abonnement</span>
                    </a>
                </nav>
            </div>

            <!-- Deuxième div - Logo centré -->
            <div class="w-1/3 flex justify-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logoQuentixsansRouNoir.svg') }}" alt="Quentix Logo" class="logo">
                </a>
            </div>

            <!-- Troisième div - Alignée à droite -->
            <div class="w-1/3 flex justify-end">
                <nav class="space-x-6 flex items-center">
                    
                        <div class="space-x-4">
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-black border border-white rounded-lg hover:bg-white hover:text-purple-700 transition">
                                Connexion
                            </a>
                            <a href="/#quick-tutorial" class="px-6 py-4 text-sm font-semibold text-white bg-purple-700 border border-purple-700 rounded-lg hover:bg-white hover:text-purple-700 transition">
                                Tutoriel →
                            </a>
                        </div>
                </nav>
            </div>
        </div>
    </header>



    <!-- Main Container -->
    <div class="relative bg-white w-full flex justify-center" id="maincontainer">
        <!-- Lottie Animation -->
        

        <!-- Login Form -->
        <div class="w-full md:w-1/4 flex flex-col justify-center px-6">
            <h1 class="text-6xl font-extralight text-center text-gray-800 mb-6 pb-11">Bienvenue</h1>
            <form action="{{ route('login.post') }}" method="POST" class="w-full max-w-sm mx-auto text-center">
                @csrf
            
                <!-- Email -->
                <div class="mb-4">
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-600 focus:outline-none text-lg"
                        placeholder="Email">
                </div>
            
                <!-- Mot de passe -->
                <div class="mb-6">
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-600 focus:outline-none text-lg"
                        placeholder="Password">
                </div>
            
                <!-- Bouton de connexion -->
                <button type="submit"
                    class="w-full bg-purple-700 text-white text-lg font-semibold py-3 rounded-md hover:bg-purple-800 transition">
                    C'est parti →
                </button>
            
                <!-- Liens d'aide -->
                <div class="mt-4 text-sm text-gray-600">
                    <a class="hover:underline">Vous avez oublié votre mot de passe ?</a>
                </div>
            
                <p class="mt-2 text-sm text-gray-600">
                    Pas encore essayé Quentix ?<a href="{{ route('register') }}" class="text-purple-700 hover:underline"> Créer votre compte →</a>
                </p>
            </form>
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