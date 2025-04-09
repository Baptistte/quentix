<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Inclure Tailwind CSS --}}
  <style>
    /* Background Wrapper */
    html, body {
      scroll-behavior: smooth;
      height: 100%;
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom, #6B21A8, #EDE9FE);
      position: relative;
    }
    .container {
      max-width: 85%;
      margin-left: auto;
      margin-right: auto;
    }
    .hero-bg {
      background-size: auto;
      background-position: top;
      background-repeat: no-repeat;
      width: 100vw;
    }
    .logo {
      height: 25px; /* Agrandissement léger du logo */
    }
    #ctaButton {
      background-color: #9141e9; 
    }
    
    /* Mobile Menu Overlay */
    .mobile-menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(107, 33, 168, 0.95); /* fond violet avec opacité */
      z-index: 40;
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .mobile-menu a {
      color: white;
      font-size: 20px;
      padding: 15px;
      text-decoration: none;
      display: block;
    }
    .mobile-menu a:hover {
      color: #ccc;
    }
  </style>
  <script
    src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
    type="module"
  ></script>
</head>
<body class="flex flex-col">

  <!-- Navbar -->
  <header class="sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex items-center h-20">
      <!-- Desktop Left Navigation (visible from md and up) -->
      <div class="hidden md:flex w-1/3 justify-start">
        <nav class="space-x-6 flex items-center">
          <a href="#features" class="flex items-center text-white hover:text-blue-300 transition">
            <span class="ml-2">Services</span>
          </a>
          <a href="#about" class="flex items-center text-white hover:text-blue-300 transition">
            <span class="ml-2">À propos</span>
          </a>
          <a href="#contact" class="flex items-center text-white hover:text-blue-300 transition">
            <span class="ml-2">Contacter nous</span>
          </a>
          <a href="{{ route('subscriptions.index') }}" class="flex items-center text-white hover:text-blue-300 transition">
            <span class="ml-2">Abonnement</span>
          </a>
        </nav>
      </div>
      <!-- Mobile Hamburger (visible en dessous de md) -->
      <div class="flex md:hidden w-1/3 justify-start">
        <button id="mobile-menu-button" class="text-white focus:outline-none">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
      <!-- Logo Centré -->
      <div class="w-1/3 flex justify-center">
        <a href="/" class="flex items-center">
          <img src="{{ asset('images/logoQuentixSansRoueBlanc.svg') }}" alt="Quentix Logo" class="logo">
        </a>
      </div>
      <!-- Desktop Right Navigation (visible from md and up) -->
      <div class="hidden md:flex w-1/3 justify-end">
        <nav class="space-x-6 flex items-center">
          @auth
            <a href="{{ route('user.space') }}" class="flex items-center text-white hover:text-blue-300 transition">
              <span class="ml-2">Espace Utilisateur</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
              @csrf
              <button type="submit" class="flex items-center text-white hover:text-red-500 transition">
                <span class="ml-2">Déconnexion</span>
              </button>
            </form>
          @else
            <div class="space-x-4">
              <a href="{{ route('login') }}" class="text-sm font-semibold text-white hover:text-blue-300 transition">
                Connexion
              </a>
              <a href="{{ route('register') }}" class="px-6 py-4 text-sm font-semibold text-white border border-white rounded-lg hover:bg-white hover:text-purple-700 transition">
                Inscription
              </a>
            </div>
          @endauth
        </nav>
      </div>
      <!-- Espace réservé sur mobile (facultatif) -->
      <div class="flex md:hidden w-1/3 justify-end"></div>
    </div>
  </header>

  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="mobile-menu flex flex-col">
    <a href="#features" class="hover:text-blue-300 transition">Services</a>
    <a href="#about" class="hover:text-blue-300 transition">À propos</a>
    <a href="#contact" class="hover:text-blue-300 transition">Contacter nous</a>
    <a href="{{ route('subscriptions.index') }}" class="hover:text-blue-300 transition">Abonnement</a>
    @auth
      <a href="{{ route('user.space') }}" class="hover:text-blue-300 transition">Espace Utilisateur</a>
      <form action="{{ route('logout') }}" method="POST" class="py-2">
        @csrf
        <button type="submit" class="hover:text-red-500 transition text-white text-xl">Déconnexion</button>
      </form>
    @else
      <a href="{{ route('login') }}" class="text-xl font-semibold text-white hover:text-blue-300 transition">Connexion</a>
      <a href="{{ route('register') }}" class="text-xl font-semibold text-white hover:text-blue-300 transition">Inscription</a>
    @endauth
  </div>

  <!-- Main Content -->
  <main class="hero-bg flex-grow">
    <!-- Hero Section -->
    <section class="py-20 my-[130px]">
      <div class="container mx-auto px-6 text-center">
        <h1 class="text-6xl font-light text-white mb-4">
          Libérez votre potentiel en ligne <br> avec notre solution WordPress.
        </h1>
        <p class="text-lg text-white mb-6">
          Vous créer une identité numérique <br> est accessible à tout le monde grâce à Quentix
        </p>
        @auth
          <div class="flex justify-center pt-8">
            <a href="{{ route('user.space') }}" 
              class="inline-flex items-center px-6 py-3 text-white rounded-lg shadow-md hover:bg-blue-600 transition transform hover:scale-105" id="ctaButton">
              Créer et héberger mon site
            </a>
          </div>
        @else
          <a href="#features" class="inline-flex items-center px-6 py-3 text-white rounded-lg shadow-md hover:bg-blue-600 transition transform hover:scale-105" id="ctaButton">
            Démarrer par ici.
          </a>
        @endauth
      </div>
    </section>

    <!-- Section Nos Offres avec du violet et une superposition -->
    <section id="features" class="relative py-20 bg-gradient-to-r from-gray-100 to-white self-center">
      <div class="container mx-auto px-6 bg-white p-10 -mt-32 rounded-xl shadow-lg border-t-8">
        <h2 class="text-4xl text-center font-bold text-gray-800 mb-12">Nos Offres</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
          <!-- Déploiement WordPress -->
          <div class="bg-white border-2 p-8 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-center text-gray-800 mb-3">Déploiement WordPress</h3>
            <p class="text-gray-600 text-center mb-4">Un site WordPress prêt à l'emploi avec <b>votre</b> touche.</p>
            <ul class="text-gray-600 list-disc list-inside mb-4">
              <li>Installation rapide et sécurisée.</li>
              <li>Thèmes personnalisés adaptés à votre activité.</li>
              <li>Extensions essentielles pour SEO et performances.</li>
            </ul>
            <div class="text-center">
              <a href="/wordpress_presentation" class="px-6 py-3 bg-purple-700 text-white rounded-lg shadow-md hover:bg-purple-800 transition">
                Voir plus
              </a>
            </div>
          </div>

          <!-- Gestion Odoo -->
          <div class="bg-white border-2 p-8 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 relative">
            <div class="absolute inset-0 bg-white bg-opacity-60 backdrop-blur-md rounded-lg"></div>
            <div class="relative z-10 flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
              </svg>
            </div>
            <h3 class="relative z-10 text-xl font-semibold text-center text-gray-800 mb-3">Gestion Odoo</h3>
            <p class="relative z-10 text-gray-600 text-center mb-4">Optimisez votre entreprise avec notre gestion d'ERP Odoo.</p>
            <ul class="relative z-10 text-gray-600 list-disc list-inside mb-4">
              <li>Gestion complète des ventes et des achats.</li>
              <li>Suivi avancé des stocks et logistique.</li>
              <li>Rapports et analyses en temps réel.</li>
            </ul>
            <div class="relative z-10 text-center">
              <button class="px-6 py-3 bg-gray-400 text-white rounded-lg cursor-not-allowed opacity-75">
                Prochainement
              </button>
            </div>
          </div>

          <!-- Hébergement Cloud -->
          <div class="bg-white border-2 p-8 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 relative">
            <div class="absolute inset-0 bg-white bg-opacity-60 backdrop-blur-md rounded-lg"></div>
            <div class="relative z-10 flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z" />
              </svg>
            </div>
            <h3 class="relative z-10 text-xl font-semibold text-center text-gray-800 mb-3">Hébergement Cloud</h3>
            <p class="relative z-10 text-gray-600 text-center mb-4">Un hébergement rapide, sécurisé et scalable pour vos projets.</p>
            <ul class="relative z-10 text-gray-600 list-disc list-inside mb-4">
              <li>Serveurs haute performance pour vos applications.</li>
              <li>Sauvegardes automatiques et sécurisées.</li>
              <li>Support technique 24/7.</li>
            </ul>
            <div class="relative z-10 text-center">
              <button class="px-6 py-3 bg-gray-400 text-white rounded-lg cursor-not-allowed opacity-75">
                Prochainement
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Blur Background (optionnel) -->
    <div class="blur-bg"></div>
    
    <!-- Comment ça marche -->
    <section id="how-it-works" class="py-20 flex justify-center bg-gradient-to-r from-gray-100 to-white">
      <div class="container mx-auto flex flex-col lg:flex-row items-center justify-center px-6">
        <!-- Texte à gauche -->
        <div class="lg:w-1/2 text-center lg:text-left">
          <h2 class="text-4xl font-bold text-gray-900 mb-6">
            Votre site en ligne en quelques clics.
          </h2>
          <p class="text-lg text-gray-600 mb-6">
            Avec <strong>Quentix</strong>, créez et hébergez votre site web en toute simplicité. 
            Suivez ces étapes et obtenez votre solution en un instant !
          </p>
          <a href="#features" 
            class="px-6 py-3 bg-purple-700 text-white rounded-lg shadow-md hover:bg-purple-800 transition inline-flex items-center">
            Démarrer maintenant →
          </a>
        </div>
        <!-- Cartes inclinées -->
        <div class="lg:w-1/2 flex flex-col space-y-6 relative mt-12 lg:mt-0 items-center">
          <!-- Étape 1 -->
          <div class="bg-purple-700 text-white p-6 rounded-lg shadow-lg transform -rotate-2 w-96">
            <h3 class="text-lg font-semibold">Choisissez un abonnement.</h3>
            <p class="text-sm mt-2">
              Sélectionnez l'offre qui correspond à vos besoins et commencez dès maintenant.
            </p>
          </div>
          <!-- Étape 2 -->
          <div class="bg-purple-600 text-white p-6 rounded-lg shadow-lg transform rotate-2 w-96">
            <h3 class="text-lg font-semibold">Personnalisez votre site.</h3>
            <p class="text-sm mt-2">
              Remplissez les informations de votre site (nom, couleurs, options) et laissez Quentix faire le reste.
            </p>
          </div>
          <!-- Étape 3 -->
          <div class="bg-purple-500 text-white p-6 rounded-lg shadow-lg transform -rotate-2 w-96">
            <h3 class="text-lg font-semibold">Accédez à votre site.</h3>
            <p class="text-sm mt-2">
              Votre site est prêt ! Connectez-vous à votre espace utilisateur pour le gérer facilement.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Tutoriel rapide -->
    <section id="quick-tutorial" class="py-20 bg-gradient-to-r from-gray-100 to-white">
      <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-black mb-6">Tutoriel rapide</h2>
        <p class="text-lg text-black mb-10">
          Découvrez en quelques clics comment créer votre site web avec Quentix.
        </p>
        <!-- Étapes interactives -->
        <div class="flex flex-col lg:flex-row items-center justify-center space-y-6 lg:space-y-0 lg:space-x-6 mt-24">
          <!-- Étape 1 -->
          <div class="bg-purple-700 border-4 border-purple-700 p-6 rounded-lg shadow-lg transform -rotate-2 w-96 hover:scale-105 transition duration-300">
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 10h11M9 21l-6-6 6-6M21 16h-3m0 0a3 3 0 00-3-3H9m0 0H5m4 0V5a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2v-4z"/>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-3">1. Sélectionner un abonnement</h3>
            <p class="text-white">Choisissez parmi nos offres adaptées à vos besoins.</p>
          </div>
          <!-- Étape 2 -->
          <div class="bg-purple-600 border-4 border-purple-600 p-6 rounded-lg shadow-lg transform rotate-2 w-96 hover:scale-105 transition duration-300">
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 20h9m-9-4h6m-6-4h4M4 3h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z"/>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-3">2. Remplir les paramètres</h3>
            <p class="text-white">Ajoutez votre logo, nom de domaine et couleurs.</p>
          </div>
          <!-- Étape 3 -->
          <div class="bg-purple-500 border-4 border-purple-500 p-6 rounded-lg shadow-lg transform -rotate-2 w-96 hover:scale-105 transition duration-300">
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16v16H4zM10 12h4m-4 4h4"/>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-3">3. Votre site est en ligne !</h3>
            <p class="text-white">Gérez votre site en toute simplicité.</p>
          </div>
        </div>
        <!-- Bouton d'action -->
        <div class="mt-36">
          <a href="{{ route('subscriptions.index') }}" 
             class="px-6 py-3 bg-purple-700 text-white font-bold rounded-lg shadow-md">
            Commencer maintenant 🚀
          </a>
        </div>
      </div>
    </section>

    <!-- À propos -->
    <section id="about" class="py-20 bg-gradient-to-r from-purple-900 to-purple-600 text-white">
      <div class="container mx-auto px-6 text-center lg:text-left flex flex-col lg:flex-row items-center">
        <!-- Texte -->
        <div class="lg:w-1/2">
          <h2 class="text-4xl font-bold mb-6">À propos de Quentix</h2>
          <p class="text-lg mb-6">
            Nous sommes un groupe d'étudiants passionnés de <strong>Ynov Campus</strong>, spécialisés dans l'informatique, 
            le design et le management. Notre diversité de parcours nous permet de créer des solutions innovantes et accessibles à tous.
          </p>
          <p class="text-lg">
            Avec <strong>Quentix</strong>, nous avons pour mission de simplifier la création et la gestion de sites web, 
            pour que chacun puisse concrétiser ses idées en ligne, sans tracas techniques.
          </p>
        </div>
        <!-- Image -->
        <div class="lg:w-1/2 mt-10 lg:mt-0 flex justify-center">
          <dotlottie-player
            src="https://lottie.host/9a64ab74-b8af-42a5-83f5-2258e9fbbbf7/pukz40Qqyj.lottie"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px"
            loop
            autoplay
          ></dotlottie-player>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-20 bg-gradient-to-r from-gray-100 to-white text-gray-900">
      <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-6">Nous Contacter</h2>
        <p class="text-lg text-gray-600 mb-10">
          Une question, un projet, ou juste envie d’échanger ? Nous sommes à votre écoute !
        </p>
        <!-- Formulaire de contact -->
        <form class="max-w-lg mx-auto bg-gray-100 p-8 rounded-lg shadow-lg">
          <div class="mb-4">
            <label class="block text-gray-700 text-left mb-2" for="name">Nom</label>
            <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Votre Nom">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-left mb-2" for="email">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Votre Email">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-left mb-2" for="message">Message</label>
            <textarea id="message" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500" rows="4" placeholder="Votre Message"></textarea>
          </div>
          <button type="submit" class="px-6 py-3 bg-purple-700 text-white rounded-lg shadow-md hover:bg-purple-800 transition transform hover:scale-105">
            Envoyer 📩
          </button>
        </form>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-purple-700 py-6 bottom z-50">
    <div class="container mx-auto px-6 text-center text-white">
      <p>&copy; 2025 Quentix. Tous droits réservés.</p>
    </div>
  </footer>

  <!-- Script pour le menu mobile -->
  <script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenuButton.addEventListener('click', () => {
      if (mobileMenu.style.display === "flex") {
        mobileMenu.style.display = "none";
      } else {
        mobileMenu.style.display = "flex";
      }
    });
  </script>
</body>
</html>