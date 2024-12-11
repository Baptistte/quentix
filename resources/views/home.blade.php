<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Inclure Tailwind CSS --}}
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold text-gray-800">Quentix</a>

            <!-- Navigation -->
            <nav class="space-x-6 flex items-center">
                <a href="#features" class="text-gray-600 hover:text-blue-500 transition">Fonctionnalité</a>
                <a href="#about" class="text-gray-600 hover:text-blue-500 transition">À propos</a>
                <a href="#contact" class="text-gray-600 hover:text-blue-500 transition">Nous contacter</a>

                @auth
                    <!-- Afficher le nom de l'utilisateur connecté -->
                    <span class="text-gray-800 font-semibold">Bonjour, {{ Auth::user()->name }}</span>
                    <!-- Bouton de déconnexion -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="ml-4 px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-lg shadow-md hover:bg-red-600 transition">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <!-- Boutons de connexion et d'inscription -->
                    <div class="space-x-4">
                        <a href="{{ route('login') }}"
                           class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 transition">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 text-sm font-semibold text-gray-800 border border-gray-300 rounded-lg shadow-md hover:bg-gray-200 transition">
                            Inscription
                        </a>
                    </div>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <section class="bg-gray-50 py-20">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Bienvenue sur Quentix</h1>
                <p class="text-lg text-gray-600 mb-6">
                    Future phrase d'accroche.
                </p>
                <a href="#features" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                    Démarrer par ici.
                </a>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nos Offres.</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <div class="text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-center text-gray-800 mb-2">Déploiement WordPress</h3>
                        <p class="text-gray-600 text-center">Un site WordPress prêt à l'emploie avec <b>votre</b> touche.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <div class="text-green-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-center text-gray-800 mb-2">Déploiement WordPress</h3>
                        <p class="text-gray-600 text-center">Un site WordPress prêt à l'emploie avec <b>votre</b> touche.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <div class="text-red-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-center text-gray-800 mb-2">Déploiement WordPress</h3>
                        <p class="text-gray-600 text-center">Un site WordPress prêt à l'emploie avec <b>votre</b> touche.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6">
        <div class="container mx-auto px-6 text-center text-white">
            <p>&copy; 2024 Quentix. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>