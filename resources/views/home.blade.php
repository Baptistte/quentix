<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Inclure Tailwind CSS --}}
    <style>
        /* Background Wrapper */
        .blur-bg {
            background-image: url('/images/new_main_bg.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="shadow-md bg-white sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold text-gray-800">Quentix</a>

            <!-- Navigation -->
            <nav class="space-x-6 flex items-center">
                <a href="#features" class="text-gray-600 hover:text-blue-500 transition">Fonctionnalité</a>
                <a href="#about" class="text-gray-600 hover:text-blue-500 transition">À propos</a>
                <a href="#contact" class="text-gray-600 hover:text-blue-500 transition">Nous contacter</a>

                @auth
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
        <section class="py-20 my-[100px]">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-4">
                    Bienvenue sur Quentix 
                    <span class="relative inline-block">
                        <span class="absolute inset-x-0 bottom-0 h-full bg-blue-300 rounded"></span>
                        @auth
                            <span class="relative">{{ Auth::user()->name }}</span>
                        @endauth
                    </span>
                    !
                </h1>
                <p class="text-lg text-gray-600 mb-6">
                    Libérez votre potentiel en ligne avec notre solution WordPress.
                </p>
                @auth
                    <a href="{{ route('user.space') }}" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                        Mon espace
                    </a>
                @else
                    <a href="#features" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                        Démarrer par ici.
                    </a>
                @endauth
                
            </div>
        </section>

        
        <section id="features" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nos Offres</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <div class="text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-center text-gray-800 mb-2">Déploiement WordPress</h3>
                        <p class="text-gray-600 text-center mb-4">Un site WordPress prêt à l'emploi avec <b>votre</b> touche.</p>
                        <ul class="text-gray-600 list-disc list-inside mb-4">
                            <li>Installation rapide et sécurisée.</li>
                            <li>Thèmes personnalisés adaptés à votre activité.</li>
                            <li>Extensions essentielles pour SEO et performances.</li>
                        </ul>
                        <div class="text-center">
                            <a href="/wordpress_presentation" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                                Voir plus
                            </a>
                        </div>
                    </div>
        
                    <!-- Feature 2 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md relative overflow-hidden">
                        <div class="absolute inset-0 bg-white bg-opacity-70 backdrop-blur-sm"></div>
                        <div class="relative z-10 text-green-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <h3 class="relative z-10 text-xl font-semibold text-center text-gray-800 mb-2">Gestion Odoo</h3>
                        <p class="relative z-10 text-gray-600 text-center mb-4">Optimisez votre entreprise avec notre gestion d'ERP Odoo.</p>
                        <ul class="relative z-10 text-gray-600 list-disc list-inside mb-4">
                            <li>Gestion complète des ventes et des achats.</li>
                            <li>Suivi avancé des stocks et logistique.</li>
                            <li>Rapports et analyses en temps réel.</li>
                        </ul>
                        <div class="relative z-10 text-center">
                            <button class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-lg cursor-not-allowed">
                                Prochainement
                            </button>
                        </div>
                    </div>
        
                    <!-- Feature 3 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md relative overflow-hidden">
                        <div class="absolute inset-0 bg-white bg-opacity-70 backdrop-blur-sm"></div>
                        <div class="relative z-10 text-red-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <h3 class="relative z-10 text-xl font-semibold text-center text-gray-800 mb-2">Hébergement Cloud</h3>
                        <p class="relative z-10 text-gray-600 text-center mb-4">Un hébergement rapide, sécurisé et scalable pour vos projets.</p>
                        <ul class="relative z-10 text-gray-600 list-disc list-inside mb-4">
                            <li>Serveurs haute performance pour vos applications.</li>
                            <li>Sauvegardes automatiques et sécurisées.</li>
                            <li>Support technique 24/7.</li>
                        </ul>
                        <div class="relative z-10 text-center">
                            <button class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-lg cursor-not-allowed">
                                Prochainement
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blur Background -->
        <div class="blur-bg"></div>

        <!-- About Section -->
        <section id="about" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">À propos</h2>
                <p class="text-lg text-gray-600">
                    Nous sommes un groupe d'étudiants à <strong>Ynov Campus</strong>, une école qui propose des formations innovantes en informatique,
                    design, et management. Chacun d'entre nous vient d'un parcours différent, ce qui enrichit notre travail d'équipe et notre vision.
                    <br><br>
                    Notre objectif avec Quentix est de proposer des solutions simples et efficaces pour créer et gérer des sites web rapidement.
                    Nous voulons aider les professionnels et particuliers à concrétiser leurs idées en ligne.
                </p>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Nous Contacter</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Une question, un projet, ou juste envie d'échanger ? N'hésitez pas à nous contacter !
                </p>
                <form class="max-w-lg mx-auto">
                    <div class="mb-4">
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Votre Nom">
                    </div>
                    <div class="mb-4">
                        <input type="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Votre Email">
                    </div>
                    <div class="mb-4">
                        <textarea class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Votre Message"></textarea>
                    </div>
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                        Envoyer
                    </button>
                </form>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6 sticky bottom-0 z-50">
        <div class="container mx-auto px-6 text-center text-white">
            <p>&copy; 2024 Quentix. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>