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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                            <path d="M2380 5110 c-607 -85 -1097 -523 -1235 -1104 -26 -109 -45 -259 -45 -353 0 -59 0 -59 -50 -96 -91 -68 -174 -195 -205 -314 -20 -75 -19 -219 1 -297 51 -197 212 -361 414 -420 30 -9 109 -19 175 -23 l120 -6 30 -66 c73 -162 232 -346 383 -445 l72 -48 0 -96 0 -97 -78 -32 -77 -32 -235 -5 c-135 -3 -273 -12 -325 -20 -726 -121 -1274 -726 -1321 -1458 -8 -122 2 -160 47 -183 42 -22 2066 -22 2108 -1 66 35 66 137 0 172 -24 12 -177 14 -993 14 l-965 0 5 37 c49 356 181 623 420 853 49 47 120 107 157 134 87 62 253 147 354 180 95 32 266 66 328 66 43 0 45 -1 45 -30 0 -21 34 -80 124 -212 398 -588 389 -577 444 -578 13 0 33 5 45 11 12 6 115 104 230 217 l207 207 213 -213 c195 -195 217 -214 254 -219 36 -5 45 -2 76 28 19 19 141 191 271 383 171 253 236 357 236 377 0 28 2 29 44 29 59 0 193 -25 296 -57 506 -152 895 -617 958 -1145 l8 -68 -963 0 c-815 0 -968 -2 -992 -14 -66 -35 -66 -137 0 -172 42 -21 2066 -21 2108 0 54 28 62 93 37 286 -93 695 -620 1240 -1311 1356 -52 8 -188 17 -325 20 l-235 5 -77 32 -78 32 0 97 0 96 73 48 c150 99 309 283 382 445 l30 66 120 6 c66 4 145 14 175 23 202 59 363 223 414 420 20 78 21 222 1 297 -31 119 -114 246 -205 314 -50 37 -50 37 -50 96 0 94 -19 244 -45 353 -129 542 -569 967 -1123 1084 -111 24 -368 34 -472 20z m425 -215 c245 -51 457 -164 633 -337 221 -216 346 -485 378 -810 l6 -68 -34 0 c-19 0 -62 3 -95 6 l-60 7 -7 70 c-20 215 -123 440 -281 614 -125 138 -327 258 -522 310 -87 23 -117 26 -263 26 -146 0 -176 -3 -263 -26 -195 -52 -396 -171 -523 -310 -155 -169 -260 -400 -280 -614 l-7 -70 -60 -7 c-33 -3 -76 -6 -95 -6 l-34 0 6 68 c32 326 157 594 377 809 196 192 415 302 694 349 103 17 323 12 430 -11z m-115 -385 c280 -44 525 -223 652 -475 54 -105 80 -212 86 -344 l5 -124 -54 7 c-125 16 -308 94 -454 192 -105 70 -125 71 -225 3 -288 -193 -637 -262 -960 -187 l-53 12 6 111 c12 268 155 516 384 668 107 71 247 124 368 140 62 8 182 7 245 -3z m172 -944 c130 -83 328 -161 468 -186 36 -6 76 -14 89 -16 l23 -5 -5 -302 c-4 -251 -8 -314 -23 -372 l-19 -70 -241 -3 -241 -2 -14 32 c-20 49 -76 106 -133 136 -49 26 -58 27 -201 27 -144 0 -152 -1 -201 -27 -103 -54 -164 -154 -164 -268 0 -114 61 -214 164 -268 49 -26 57 -27 201 -27 143 0 152 1 201 27 57 30 113 87 133 136 l13 32 189 0 c104 0 189 -4 189 -8 0 -18 -118 -148 -175 -195 -461 -373 -1150 -195 -1368 354 -55 138 -59 171 -64 513 l-5 319 28 -8 c315 -79 746 -8 1029 170 39 24 71 44 72 44 2 1 26 -14 55 -33z m-1382 -472 l0 -397 -70 7 c-101 10 -161 31 -220 75 -116 87 -165 193 -158 339 5 106 37 178 111 252 76 76 173 114 305 119 l32 1 0 -396z m2273 386 c133 -19 237 -94 300 -214 30 -58 32 -67 32 -171 0 -102 -2 -114 -29 -168 -37 -72 -113 -149 -180 -182 -48 -23 -148 -45 -208 -45 l-28 0 0 395 0 395 23 0 c12 0 53 -5 90 -10z m-1073 -885 c35 -18 50 -43 50 -85 0 -76 -42 -100 -175 -100 -93 0 -98 1 -126 29 -48 49 -35 137 25 161 37 15 194 12 226 -5z m-330 -765 c63 -13 134 -20 210 -20 76 0 147 7 210 20 52 11 98 20 103 20 4 0 7 -35 7 -77 l0 -78 -162 -162 -163 -163 -157 157 -158 158 0 82 c0 46 3 83 8 83 4 0 50 -9 102 -20z m-95 -440 l160 -160 -161 -161 -161 -161 -168 246 c-92 136 -165 248 -164 250 7 4 324 145 329 145 3 1 77 -71 165 -159z m931 89 c88 -38 162 -73 165 -77 5 -6 -299 -464 -325 -490 -4 -3 -79 66 -166 153 l-160 160 162 162 c90 90 163 163 164 163 1 0 73 -32 160 -71z"/>
                            <path d="M2511 186 c-87 -48 -50 -186 49 -186 51 0 100 49 100 99 0 75 -83 124 -149 87z"/>
                        </g>
                    </svg>
                    <span class="ml-2">Contacter nous</span>
                </a>
                <a href="{{ route('subscriptions.index') }}" class="flex items-center text-gray-600 hover:text-blue-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6H4v12h16V6z"></path>
                        <path d="M22 6l-10 7L2 6"></path>
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