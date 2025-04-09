<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Abonnements | Quentix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Background & Body */
        html, body {
            scroll-behavior: smooth;
            height: fit-content;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #6B21A8, #EDE9FE); 
        }
        .logo {
            height: 25px;
        }
        
        /* Mobile Menu Overlay */
        .mobile-menu {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(107, 33, 168, 0.95);
          z-index: 50;
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
</head>

<body class="bg-gradient-to-b">
  <!-- Header -->
  <header class="sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex items-center h-20">
      <!-- Left Desktop Nav -->
      <div class="hidden md:flex w-1/3 justify-start">
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
      <!-- Mobile Hamburger (below md) -->
      <div class="flex md:hidden w-1/3 justify-start">
        <button id="mobile-menu-button" class="text-white focus:outline-none">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
      <!-- Logo -->
      <div class="w-1/3 flex justify-center">
        <a href="/" class="flex items-center">
          <img src="{{ asset('images/logoQuentixSansRoueBlanc.svg') }}" alt="Quentix Logo" class="logo">
        </a>
      </div>
      <!-- Right Desktop Nav -->
      <div class="hidden md:flex w-1/3 justify-end">
        <nav class="space-x-6 flex items-center">
          @auth
            <a href="/#quick-tutorial" class="px-6 py-4 text-sm font-semibold text-white bg-purple-700 border border-white rounded-lg hover:bg-white hover:text-purple-700 transition">
                Tutoriel →
            </a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="flex items-center text-white hover:text-red-500 transition">
                    <span class="ml-2">Déconnexion</span>
                </button>
            </form>
          @else
            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-white rounded-lg hover:bg-white hover:text-purple-700 transition">
              Connexion
            </a>
            <a href="/#quick-tutorial" class="px-6 py-4 text-sm font-semibold text-white bg-purple-700 border border-white rounded-lg hover:bg-white hover:text-purple-700 transition">
              Tutoriel →
            </a>
          @endauth
        </nav>
      </div>
      <!-- Espace sur mobile -->
      <div class="flex md:hidden w-1/3 justify-end"></div>
    </div>
  </header>
  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="mobile-menu flex flex-col">
    <a href="/#features" class="hover:text-blue-300 transition">Services</a>
    <a href="/#about" class="hover:text-blue-300 transition">À propos</a>
    <a href="/#contact" class="hover:text-blue-300 transition">Contacter nous</a>
    <a href="{{ route('subscriptions.index') }}" class="hover:text-blue-300 transition">Abonnement</a>
    @auth
      <a href="/#quick-tutorial" class="px-6 py-4 text-sm font-semibold text-white bg-purple-700 border border-white rounded-lg hover:text-purple-700 transition" style="margin-top: 10px;">
        Tutoriel →
      </a>
      <form action="{{ route('logout') }}" method="POST" class="py-2">
        @csrf
        <button type="submit" class="hover:text-red-500 transition text-white text-xl">Déconnexion</button>
      </form>
    @else
      <a href="{{ route('login') }}" class="text-xl font-semibold text-white hover:text-blue-300 transition">Connexion</a>
      <a href="/#quick-tutorial" class="text-xl font-semibold text-white hover:text-blue-300 transition" style="margin-top: 10px;">
        Tutoriel →
      </a>
    @endauth
  </div>

  <!-- Main content -->
  <div class="min-h-screen flex flex-col items-center text-white pt-12">
    <!-- Toggle Widget -->
    <div class="relative mt-10 flex bg-purple-900 p-1 rounded-full w-72 h-12 mx-auto">
      <div id="toggleIndicator" class="absolute top-1 left-1 w-1/2 h-10 bg-purple-500 rounded-full transition-all duration-300 ease-in-out"></div>
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

              // Plan Basique
              document.getElementById('price-basic').innerHTML = `
                <span class='text-4xl font-bold text-gray-900'>96 €</span>
                <small class='text-gray-500'>/an</small>
                <br>
                <span class='text-xs text-gray-500'>(soit 8€/mois)</span>
              `;

              // Plan Pro
              document.getElementById('price-pro').innerHTML = `
                <span class='text-4xl font-bold text-gray-900'>300 €</span>
                <small class='text-gray-500'>/an</small>
                <br>
                <span class='text-xs text-gray-500'>(soit 25€/mois)</span>
              `;

              // Plan Entreprise
              document.getElementById('price-enterprise').innerHTML = `
                <span class='text-4xl font-bold text-gray-900'>960 €</span>
                <small class='text-gray-500'>/an</small>
                <br>
                <span class='text-xs text-gray-500'>(soit 80€/mois)</span>
              `;

          } else {
              indicator.style.transform = "translateX(95%)";
              indicator.style.backgroundColor = "#a855f7"; // Violet clair
              monthlyBtn.style.opacity = "1";
              yearlyBtn.style.opacity = "0.6";

              // Plan Basique
              document.getElementById('price-basic').innerHTML = `
                <span class='text-4xl font-bold text-gray-900'>10 €</span>
                <span class='text-gray-500'>/ mois</span>
              `;

              // Plan Pro
              document.getElementById('price-pro').innerHTML = `
                <span class='text-4xl font-bold text-gray-900'>30 €</span>
                <span class='text-gray-500'>/ mois</span>
              `;

              // Plan Entreprise
              document.getElementById('price-enterprise').innerHTML = `
                <span class='text-4xl font-bold text-gray-900'>100 €</span>
                <span class='text-gray-500'>/ mois</span>
              `;
          }
      }
    </script>

    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-center mt-8">Choisissez votre plan</h1>
    <p class="text-lg text-center text-gray-200 mt-2">Essayez gratuitement pendant 7 jours</p>

    <!-- Cartes -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 w-full max-w-5xl px-4 md:px-0">
      <!-- Basique -->
      <div class="bg-white text-gray-800 p-8 rounded-xl shadow-lg transform hover:scale-105 transition w-full">
        <h3 class="text-2xl font-bold mb-4 text-center">Plan Basique</h3>
        <p class="text-center text-gray-500 mb-6">Idéal pour commencer</p>
        <div class="text-center" id="price-basic">
          <!-- Valeur par défaut mensuel -->
          <span class='text-4xl font-bold text-gray-900'>10 €</span>
          <span class='text-gray-500'>/ mois</span>
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
          <input type="hidden" name="plan_id" value="1">
          <button type="submit" class="mt-6 w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
            Choisir ce Plan
          </button>
        </form>
      </div>
      <!-- Pro -->
      <div class="bg-white text-gray-800 p-8 rounded-xl shadow-lg transform hover:scale-105 transition w-full">
        <h3 class="text-2xl font-bold mb-4 text-center">Plan Pro</h3>
        <p class="text-center text-gray-500 mb-6">Pour entreprises en croissance</p>
        <div class="text-center" id="price-pro">
          <!-- Valeur par défaut mensuel -->
          <span class='text-4xl font-bold text-gray-900'>30 €</span>
          <span class='text-gray-500'>/ mois</span>
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
          <input type="hidden" name="plan_id" value="2">
          <button type="submit" class="mt-6 w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
            Choisir ce Plan
          </button>
        </form>
      </div>
      <!-- Entreprise -->
      <div class="bg-white text-gray-800 p-8 rounded-xl shadow-lg transform hover:scale-105 transition w-full">
        <h3 class="text-2xl font-bold mb-4 text-center">Plan Entreprise</h3>
        <p class="text-center text-gray-500 mb-6">Pour grandes organisations</p>
        <div class="text-center" id="price-enterprise">
          <!-- Valeur par défaut mensuel -->
          <span class='text-4xl font-bold text-gray-900'>100 €</span>
          <span class='text-gray-500'>/ mois</span>
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
          <input type="hidden" name="plan_id" value="3">
          <button type="submit" class="mt-6 w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
            Choisir ce Plan
          </button>
        </form>
      </div>
    </div>

    <!-- CTA Bas -->
    <div class="mt-12 mb-12">
      <a href="/" class="px-8 py-4 bg-white text-purple-700 font-bold rounded-full shadow-md hover:bg-gray-100 transition">
        Retour à l'accueil
      </a>
    </div>
  </div>

  <!-- Script pour menu mobile -->
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