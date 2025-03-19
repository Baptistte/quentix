<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Abonnements | Quentix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html, body {
            scroll-behavior: smooth;
            height: fit-content;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #6B21A8, #EDE9FE); 
        }
        .logo {
            height: 25px; /* Agrandissement léger du logo */
        }
    </style>
</head>

<body class="bg-gradient-to-b ">
    <header class="sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex items-center h-20">

            <!-- Première div - Alignée à gauche -->
            <div class="w-1/3 flex justify-start">
                <nav class="space-x-6 flex items-center">
                    <a href="/#features" class="flex items-center text-white hover:text-blue-300 transition">
                        <span class="ml-2">Services</span>
                    </a>
                    <a href="/#about" class="flex items-center text-white hover:text-blue-300 transition">
                        <span class="ml-2">À propos</span>
                    </a>
                    <a href="/#contact" class="flex items-center text-white hover:text-blue-300 transition">
                        <span class="ml-2">Contacter nous</span>
                    </a>
                    <a href="{{ route('subscriptions.index') }}" class="flex items-center text-white hover:text-blue-300 transition">
                        <span class="ml-2">Abonnement</span>
                    </a>
                </nav>
            </div>

            <!-- Deuxième div - Logo centré -->
            <div class="w-1/3 flex justify-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logoQuentixSansRoueBlanc.svg') }}" alt="Quentix Logo" class="logo">
                </a>
            </div>

            <!-- Troisième div - Alignée à droite -->
            <div class="w-1/3 flex justify-end">
                <nav class="space-x-6 flex items-center">
                    
                        <div class="space-x-4">
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-white  rounded-lg hover:bg-white hover:text-purple-700 transition">
                                Connexion
                            </a>
                            <a href="/#quick-tutorial" class="px-6 py-4 text-sm font-semibold text-white bg-purple-700 border border-white rounded-lg hover:bg-white hover:text-purple-700 transition">
                                Tutoriel →
                            </a>
                        </div>
                </nav>
            </div>
        </div>
    </header>



    <div class="min-h-screen flex flex-col items-center text-white pt-12">

    <!-- Toggle Widget Mensuel/Annuel -->
    <div class="relative mt-10 flex bg-purple-900 p-1 rounded-full w-72 h-12 mx-auto">
        <!-- Indicateur mobile (glisse sans changer la hauteur) -->
        <div id="toggleIndicator" class="absolute top-1 left-1 w-1/2 h-10 bg-purple-500 rounded-full transition-all duration-300 ease-in-out"></div>

        <!-- Boutons -->
        <button id="yearlyBtn" onclick="togglePricing('yearly')"
            class="relative z-10 flex-1 px-6 py-2 text-white font-semibold text-center transition-all duration-300 rounded-full focus:outline-none">
            Annuel
        </button>
        <button id="monthlyBtn" onclick="togglePricing('monthly')"
            class="relative z-10 flex-1 px-6 py-2 text-white font-semibold text-center transition-all duration-300 rounded-full focus:outline-none">
            Mensuel
        </button>
    </div>

    <script>
        function togglePricing(plan) {
            const indicator = document.getElementById("toggleIndicator");
            const yearlyBtn = document.getElementById("yearlyBtn");
            const monthlyBtn = document.getElementById("monthlyBtn");

            if (plan === "yearly") {
                indicator.style.transform = "translateX(0%)";
                indicator.style.backgroundColor = "#9333ea"; // Violet foncé
                
                yearlyBtn.style.opacity = "1";
                monthlyBtn.style.opacity = "0.6";

                document.getElementById('price-basic').innerText = '8 €';
                document.getElementById('price-pro').innerText = '25 €';
                document.getElementById('price-enterprise').innerText = '80 €';
            } else {
                indicator.style.transform = "translateX(95%)";
                indicator.style.backgroundColor = "#a855f7"; // Violet clair
                
                monthlyBtn.style.opacity = "1";
                yearlyBtn.style.opacity = "0.6";

                document.getElementById('price-basic').innerText = '10 €';
                document.getElementById('price-pro').innerText = '30 €';
                document.getElementById('price-enterprise').innerText = '100 €';
            }
        }
    </script>

        <!-- Titre -->
        <h1 class="text-4xl font-extrabold text-center mt-8">Choisissez votre plan</h1>
        <p class="text-lg text-center text-gray-200 mt-2">Essayez gratuitement pendant 7 jours</p>

        <!-- Cartes d'abonnement -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 w-full max-w-5xl">
            <!-- Plan Basique -->
            <div class="bg-white text-gray-800 p-8 rounded-xl shadow-lg transform hover:scale-105 transition w-full">
                <h3 class="text-2xl font-bold mb-4 text-center">Plan Basique</h3>
                <p class="text-center text-gray-500 mb-6">Idéal pour commencer</p>
                <div class="text-center">
                    <span id="price-basic" class="text-4xl font-bold text-gray-900">10 €</span>
                    <span class="text-gray-500">/ mois</span>
                </div>
                <ul class="mt-6 space-y-3 text-gray-700">
                    <li>✔️ 1 site inclus</li>
                    <li>✔️ Hébergement sécurisé</li>
                    <li>✔️ Certificat SSL inclus</li>
                    <li>❌ Support premium</li>
                    <li>❌ Sauvegardes automatiques</li>
                </ul>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan_id" value="1"> <!-- ID du plan Basique -->
                    <button type="submit" class="mt-6 w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
                        Choisir ce Plan
                    </button>
                </form>
            </div>

            <!-- Plan Pro -->
            <div class="bg-white text-gray-800 p-8 rounded-xl shadow-lg transform hover:scale-105 transition w-full">
                <h3 class="text-2xl font-bold mb-4 text-center">Plan Pro</h3>
                <p class="text-center text-gray-500 mb-6">Pour entreprises en croissance</p>
                <div class="text-center">
                    <span id="price-pro" class="text-4xl font-bold text-gray-900">30 €</span>
                    <span class="text-gray-500">/ mois</span>
                </div>
                <ul class="mt-6 space-y-3 text-gray-700">
                    <li>✔️ 10 sites inclus</li>
                    <li>✔️ Hébergement sécurisé</li>
                    <li>✔️ Certificat SSL inclus</li>
                    <li>✔️ Support Premium 24/7</li>
                    <li>✔️ Sauvegardes automatiques</li>
                </ul>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan_id" value="2"> <!-- ID du plan Basique -->
                    <button type="submit" class="mt-6 w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
                        Choisir ce Plan
                    </button>
                </form>
            </div>

            <!-- Plan Entreprise -->
            <div class="bg-white text-gray-800 p-8 rounded-xl shadow-lg transform hover:scale-105 transition w-full">
                <h3 class="text-2xl font-bold mb-4 text-center">Plan Entreprise</h3>
                <p class="text-center text-gray-500 mb-6">Pour grandes organisations</p>
                <div class="text-center">
                    <span id="price-enterprise" class="text-4xl font-bold text-gray-900">100 €</span>
                    <span class="text-gray-500">/ mois</span>
                </div>
                <ul class="mt-6 space-y-3 text-gray-700">
                    <li>✔️ 100 sites inclus</li>
                    <li>✔️ Hébergement sécurisé</li>
                    <li>✔️ Certificat SSL inclus</li>
                    <li>✔️ Support Premium 24/7</li>
                    <li>✔️ Sauvegardes automatiques</li>
                    <li>✔️ Gestion multilingue</li>
                </ul>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan_id" value="3"> <!-- ID du plan Basique -->
                    <button type="submit" class="mt-6 w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
                        Choisir ce Plan
                    </button>
                </form>
            </div>
        </div>

        <!-- CTA Bas -->
        <div class="mt-12">
            <a href="/" class="px-8 py-4 bg-white text-purple-700 font-bold rounded-full shadow-md hover:bg-gray-100 transition">
                Retour à l'accueil
            </a>
        </div>
    </div>
    

</body>
</html>
