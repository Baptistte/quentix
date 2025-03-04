<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress - Quentix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Background général */
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

        /* Section Hero */
        .hero {
            text-align: center;
            color: white;
            padding: 80px 20px;
        }

        /* Container */
        .container {
            margin: auto;
        }
        #containerCard {
            width: 1200px;
        }
        /* Carte */
        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Bouton CTA */
        .btn-primary {
            background: #6B21A8;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background: #5A1A91;
        }

        /* Tarification */
        .price-box {
            background: #EDE9FE;
            padding: 16px;
            border-radius: 12px;
            text-align: center;
        }

    </style>
</head>
<body>
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

    <!-- Hero Section -->
    <div class="hero">
        <h1 class="text-5xl font-bold">Solution WordPress 🚀</h1>
        <p class="text-lg mt-4">Créez et hébergez votre site WordPress en quelques clics.</p>
    </div>

    <!-- Contenu Principal -->
    <div id="containerCard" class="container px-6 py-12 space-y-12">

        <!-- Présentation -->
        <section id="overview" class="card">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Pourquoi WordPress avec Quentix ?</h2>
            <p class="text-gray-600 leading-relaxed">
                Notre solution WordPress vous permet de lancer un site moderne, sécurisé et rapide sans effort. Que vous soyez un professionnel ou un particulier, nous simplifions le processus pour que vous puissiez vous concentrer sur votre contenu.
            </p>
        </section>

        <!-- Fonctionnalités et Tarification -->
        <section id="features-pricing" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Fonctionnalités -->
            <div class="card">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">🔹 Fonctionnalités Clés</h2>
                <ul class="text-gray-600 space-y-3">
                    <li>✅ Installation en un clic</li>
                    <li>✅ Accès à des milliers de thèmes professionnels</li>
                    <li>✅ Optimisation SEO & Sécurité intégrée</li>
                    <li>✅ Interface intuitive et gestion simplifiée</li>
                    <li>✅ Support multilingue</li>
                </ul>
            </div>

            <!-- Tarification -->
            <div class="card">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">💰 Tarification</h2>
                <div class="price-box">
                    <p class="text-3xl font-bold text-gray-800">10€/mois</p>
                    <p class="text-gray-600">Inclus :</p>
                    <ul class="text-gray-700 space-y-2 mt-2">
                        <li>🔒 Hébergement sécurisé</li>
                        <li>🔐 Certificat SSL offert</li>
                        <li>📞 Support technique 24/7</li>
                    </ul>
                </div>
            </div>

        </section>

        <!-- Call to Action -->
        <section class="text-center">
            @auth
                <a href="{{ route('sites.create') }}" class="btn-primary text-lg">
                    🚀 Créer mon site WordPress
                </a>
            @else
                <button id="show-alert" class="btn-primary text-lg">
                    🚀 Créer mon site WordPress
                </button>
            @endauth
        </section>

    </div>

</body>
</html>