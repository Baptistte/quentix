<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Inclure Tailwind CSS --}}
    <style>
        
        /* Background Wrapper */
        html {
            scroll-behavior: smooth;
        }
        .hero-bg {
            background-image: url('/images/banner-main.jpeg');
            background-size: auto;
            background-position: top;
            background-repeat: no-repeat;
            width: 100vw;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen text-gray-600">

    <!-- Navbar -->
    <header class="shadow-md bg-white sticky top-0 z-50">
        <div class="container mx-auto px-6 py-2 flex justify-between items-center"> <!-- Changed py-4 to py-2 -->
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo-bien-removebg.png') }}" alt="Quentix Logo" class="h-20">
            </a>
    
            <!-- Navigation -->
            <nav class="space-x-6 flex items-center">
                <a href="#features" class="flex items-center text-gray-600 hover:text-blue-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" fill="black" stroke="none">
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)">
                            <path d="M4165 5114 c-11 -3 -51 -12 -89 -20 -326 -75 -584 -356 -637 -694 -13 -84 -7 -237 12 -318 l13 -53 -1187 -1186 -1186 -1187 -53 13 c-81 19 -234 25 -318 12 -354 -55 -638 -329 -704 -680 -27 -143 -19 -267 26 -414 l21 -69 279 279 278 278 227 -228 228 -227 -278 -278 -279 -279 69 -21 c147 -45 259 -53 408 -27 323 57 580 296 671 625 22 80 25 320 5 389 l-13 44 1195 1195 1194 1194 39 -11 c63 -19 232 -25 314 -12 234 37 448 173 574 365 147 225 183 475 104 729 l-21 69 -279 -279 -278 -278 -227 228 -228 227 278 278 278 278 -48 17 c-105 37 -302 58 -388 41z"/>
                        </g>
                    </svg>
                    <span class="ml-2">Services</span>
                </a>
                
                <a href="#about" class="flex items-center text-gray-600 hover:text-blue-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" fill="black" stroke="none">
                        <g id="info">
                            <path d="M16 3C9.373 3 4 8.373 4 15s5.373 12 12 12 12-5.373 12-12S22.627 3 16 3zm0 22c-5.523 0-10-4.477-10-10S10.477 5 16 5s10 4.477 10 10-4.477 10-10 10z"/>
                            <circle cx="16" cy="11.5" r="1.5"/>
                            <path d="M15 16h2v6h-2z"/>
                        </g>
                    </svg>
                    <span class="ml-2">À propos</span>
                </a>
                
                <a href="#contact" class="flex items-center text-gray-600 hover:text-blue-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 473.806 473.806" fill="black" stroke="none">
                        <g>
                            <path d="M404.256,69.55C359.015,24.309,299.434,0,236.903,0S114.792,24.309,69.551,69.55C24.31,114.791,0,174.373,0,236.903s24.31,122.112,69.551,167.352c45.241,45.241,104.823,69.551,167.352,69.551s122.112-24.31,167.353-69.551c45.241-45.241,69.551-104.823,69.551-167.352S449.497,114.791,404.256,69.55z M385.099,385.099c-41.241,41.241-96.191,63.963-154.055,63.963s-112.814-22.722-154.055-63.963S13.126,288.908,13.126,236.903S35.847,124.089,77.088,82.848s96.191-63.963,154.055-63.963s112.814,22.722,154.055,63.963s63.963,96.191,63.963,154.055S426.34,343.858,385.099,385.099z"/>
                            <path d="M315.736,153.43H158.07c-2.087,0-4.151,0.826-5.658,2.333L95.376,212.8c-3.129,3.129-3.129,8.189,0,11.318l57.036,57.036c1.507,1.507,3.571,2.333,5.658,2.333h157.666c2.087,0,4.151-0.826,5.658-2.333l57.036-57.036c3.129-3.129,3.129-8.189,0-11.318l-57.036-57.036C319.887,154.257,317.823,153.43,315.736,153.43z M234.504,234.504h-39.201c-4.183,0-7.581-3.398-7.581-7.581s3.398-7.581,7.581-7.581h39.201c4.183,0,7.581,3.398,7.581,7.581S238.687,234.504,234.504,234.504z"/>
                        </g>
                    </svg>
                    <span class="ml-2">Nous Contacter</span>
                </a>
                
                <a href="{{ route('subscriptions.index') }}" class="flex items-center text-gray-600 hover:text-blue-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" fill="black" stroke="none">
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)">
                            <path d="M2480 5104 c-82 -22 -169 -66 -249 -126 -81 -60 -2478 -2470 -2533 -2532 -89 -96 -137 -186 -166 -313 -20 -91 -19 -262 1 -353 22 -94 77 -193 146 -267 39 -41 461 -474 937 -963 594 -610 890 -905 922 -928 135 -96 326 -129 494 -85 152 40 128 -101 1666 1441 1202 1204 1500 1507 1541 1574 44 72 61 124 67 209 7 92 -1 129 -42 197 -37 63 -464 506 -965 1011 -512 514 -554 552 -670 595 -120 45 -269 51 -395 15z"/>
                        </g>
                    </svg>
                    <span class="ml-2">Abonnement</span>
                </a>
    
                @auth
                    <!-- Bouton espace utilisateur -->
                    <a href="{{ route('user.space') }}" class="flex items-center text-gray-600 hover:text-blue-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="7.25" r="5.73" />
                            <path d="M1.5,23.48l.37-2.05A10.3,10.3,0,0,1,12,13h0a10.3,10.3,0,0,1,10.13,8.45l.37,2.05" />
                        </svg>
                        <span class="ml-2">Espace Utilisateur</span>
                    </a>

                    <!-- Bouton de déconnexion -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="flex items-center text-gray-600 hover:text-red-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" fill="currentColor">
                                <polygon points="77.155 272.034 351.75 272.034 351.75 272.033 351.75 240.034 351.75 240.033 77.155 240.033 152.208 164.98 152.208 164.98 152.208 164.979 129.58 142.353 15.899 256.033 15.9 256.034 15.899 256.034 129.58 369.715 152.208 347.088 152.208 347.087 152.208 347.087 77.155 272.034" />
                                <polygon points="160 16 160 48 464 48 464 464 160 464 160 496 496 496 496 16 160 16" />
                            </svg>
                            <span class="ml-2">Déconnexion</span>
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
    <main class="hero-bg flex-grow">
        <!-- Hero Section -->
        <section class="py-20 my-[130px]">
            <div class="container mx-auto px-6 text-left pl-[240px]">
                <h1 class="text-8xl font-extrabold text-white mb-4">
                    Quentix 
                </h1>
                <p class="text-lg text-white mb-6">
                    Libérez votre potentiel en ligne avec notre solution WordPress.
                </p>
                @auth
                <div class="flex justify-left">
                    <a href="{{ route('user.space') }}" 
                        class="inline-flex items-center px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition transform hover:scale-105">
                        Créer et héberger mon site
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                @else
                    <a href="#features" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
                        Démarrer par ici.
                    </a>
                @endauth
                
            </div>
        </section>

        
        <section id="features" class="mt-40 py-10 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl text-center text-gray-600 mb-12">Nos Offres</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <div class="text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl  text-center text-gray-800 mb-2">Déploiement WordPress</h3>
                        <p class="text-gray-600 text-center mb-4">Un site WordPress prêt à l'emploi avec <b>votre</b> touche.</p>
                        <ul class="text-gray-600 list-disc list-inside mb-4">
                            <li>Installation rapide et sécurisée.</li>
                            <li>Thèmes personnalisés adaptés à votre activité.</li>
                            <li>Extensions essentielles pour SEO et performances.</li>
                        </ul>
                        <div class="text-center">
                            <a href="/wordpress_presentation" class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
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
                        <h3 class="relative z-10 text-xl  text-center text-gray-800 mb-2">Gestion Odoo</h3>
                        <p class="relative z-10 text-gray-600 text-center mb-4">Optimisez votre entreprise avec notre gestion d'ERP Odoo.</p>
                        <ul class="relative z-10 text-gray-600 list-disc list-inside mb-4">
                            <li>Gestion complète des ventes et des achats.</li>
                            <li>Suivi avancé des stocks et logistique.</li>
                            <li>Rapports et analyses en temps réel.</li>
                        </ul>
                        <div class="relative z-10 text-center">
                            <button class="px-6 py-2 bg-gray-400 text-white  rounded-lg cursor-not-allowed">
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
                        <h3 class="relative z-10 text-xl  text-center text-gray-800 mb-2">Hébergement Cloud</h3>
                        <p class="relative z-10 text-gray-600 text-center mb-4">Un hébergement rapide, sécurisé et scalable pour vos projets.</p>
                        <ul class="relative z-10 text-gray-600 list-disc list-inside mb-4">
                            <li>Serveurs haute performance pour vos applications.</li>
                            <li>Sauvegardes automatiques et sécurisées.</li>
                            <li>Support technique 24/7.</li>
                        </ul>
                        <div class="relative z-10 text-center">
                            <button class="px-6 py-2 bg-gray-400 text-white  rounded-lg cursor-not-allowed">
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
                <h2 class="text-3xl  text-gray-600 mb-4">À propos</h2>
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
                <h2 class="text-3xl text-gray-600 mb-4">Nous Contacter</h2>
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
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white  rounded-lg shadow-md hover:bg-blue-600 transition">
                        Envoyer
                    </button>
                </form>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6 bottom z-50">
        <div class="container mx-auto px-6 text-center text-white">
            <p>&copy; 2025 Quentix. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>