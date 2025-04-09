<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de Bord - Quentix</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    /* Background global */
    html, body {
      margin: 0;
      padding: 0;
      min-height: 100vh; /* pour conserver le fond */
      font-family: sans-serif;
      background: linear-gradient(to bottom, #6B21A8, #EDE9FE);
    }

    /* Barre du haut (avec logo + burger) */
    #topbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 70px;
      background: #6B21A8;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      z-index: 9999;
    }
    #topbar .logo-container {
      display: flex;
      align-items: center;
    }
    #topbar img {
      height: 25px;
    }
    /* Bouton Burger (visible sur mobile) */
    #burgerMenu {
      background: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      display: none; /* caché en desktop */
    }
    #burgerMenu span {
      display: block;
      width: 25px;
      height: 3px;
      margin: 4px 0;
      background: #6B21A8;
      transition: 0.3s;
    }

    /* Sidebar */
    .sidebar {
      background: white;
      color: black;
      width: 250px;
      position: fixed;
      top: 70px; /* juste sous la barre du haut */
      left: 0;
      bottom: 0;
      display: flex;
      flex-direction: column;
      padding: 20px;
      box-shadow: 2px 0 10px rgba(0,0,0,0.2);
      transition: transform 0.3s ease-in-out;
    }
    .sidebar a {
      text-decoration: none;
      color: black;
      font-size: 18px;
      font-weight: 500;
      padding: 12px 0;
      transition: 0.3s ease-in-out;
    }
    .sidebar a:hover {
      transform: translateX(5px);
    }

    /* Contenu principal */
    .main-content {
      margin-left: 250px; /* espace pour la sidebar */
      padding: 40px;
      padding-top: 110px; /* pour bien respirer sous le topbar */
      transition: margin 0.3s ease-in-out;
    }
    .bg-card {
      background: white;
      color: #333;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border-radius: 12px;
      padding: 2rem;
    }
    .btn-primary {
      background: #6B21A8;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: 0.3s ease;
    }
    .btn-primary:hover {
      background: #5A1A91;
    }

    /* Responsive */
    @media (max-width: 768px) {
      /* Afficher le burger */
      #burgerMenu {
        display: block;
      }
      /* Masquer la sidebar par défaut */
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.active {
        transform: translateX(0);
      }
      /* Le contenu prend toute la largeur */
      .main-content {
        margin-left: 0;
        padding-top: 110px; /* on garde un espace pour la topbar */
      }
    }
  </style>
</head>
<body>
  <!-- Top bar : Logo + Burger -->
  <div id="topbar">
    <!-- Bouton burger (à gauche) -->
    <button id="burgerMenu" aria-label="Menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <!-- Logo centré ou à gauche, comme souhaité -->
    <div class="logo-container">
      <a href="/" class="flex items-center">
        <img src="{{ asset('images/logoQuentixsansRouNoir.svg') }}" alt="Quentix Logo">
      </a>
    </div>
    <!-- Espace vide à droite (ou éventuellement y ajouter d'autres éléments) -->
    <div></div>
  </div>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <a href="{{ route('user.space') }}">👤 Mon Profil</a>
    <a href="{{ route('user.space') }}">🚀 Mes Solutions</a>
    <a href="{{ route('user.space') }}">📜 Mon Abonnement</a>
    <a href="{{ route('purchase.history') }}">🛒 Historique</a>
    <a href="/">🏠 Accueil</a>

    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
      @csrf
      <button type="submit" class="btn-primary w-full">Déconnexion</button>
    </form>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="bg-card max-w-5xl w-full mx-auto flex flex-col md:flex-row gap-12">
      <!-- Formulaire -->
      <div class="w-full md:w-1/2">
        <h1 class="text-3xl font-bold mb-6">🚀 Lancez votre site en quelques clics</h1>
        <p class="text-gray-600 mb-6">Complétez les informations ci-dessous pour générer votre site.</p>

        <form action="{{ route('sites.store') }}" method="POST" class="space-y-6" onsubmit="lancerJob(event)">
          @csrf

          <!-- Champs masqués -->
          <input type="hidden" id="userID" value="{{ Auth::user()->id }}">
          <input type="hidden" id="nomConteneur" name="nomConteneur">

          <!-- Nom du site -->
          <div>
            <label for="site_name" class="block text-lg font-semibold text-gray-700 mb-2">Nom du site</label>
            <input type="text" id="site_name" name="site_name" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800"
                   oninput="document.getElementById('nomConteneur').value = this.value">
          </div>

          <!-- Service choisi -->
          <div>
            <label for="service" class="block text-lg font-semibold text-gray-700 mb-2">Service</label>
            <select id="service" name="service" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800"
                    onchange="document.getElementById('serviceID').value = this.value">
              <option value="1">WordPress</option>
              <option value="autre">Autre</option>
            </select>
          </div>

          <!-- URL du site -->
          <div>
            <label for="domain" class="block text-lg font-semibold text-gray-700 mb-2">URL désirée</label>
            <input type="text" id="domain" name="domain" placeholder="ex: monsite.quentix.com" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800">
          </div>

          <!-- Bouton de validation -->
          <button type="submit" class="w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
            🌍 Créer mon site
          </button>
        </form>
      </div>

      <!-- Témoignages -->
      <div class="w-full md:w-1/2 flex flex-col justify-center">
        <h2 class="text-2xl font-bold mb-6">💬 Témoignages de nos utilisateurs</h2>
        <div class="space-y-6">
          <div class="bg-gray-50 text-gray-900 shadow-md p-6 rounded-lg">
            <p class="text-lg font-semibold text-purple-600">⭐️⭐️⭐️⭐️⭐️</p>
            <p class="text-gray-700 mt-2">"Quentix a rendu la création de site web super simple ! Mon site était en ligne en quelques minutes."</p>
            <p class="text-sm font-semibold mt-4">— Julien D.</p>
          </div>
          <div class="bg-gray-50 text-gray-900 shadow-md p-6 rounded-lg">
            <p class="text-lg font-semibold text-purple-600">⭐️⭐️⭐️⭐️⭐️</p>
            <p class="text-gray-700 mt-2">"L'interface est intuitive et le support technique est excellent. Je recommande à 100% !"</p>
            <p class="text-sm font-semibold mt-4">— Sarah L.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function lancerJob(event) {
      event.preventDefault();

      const userID = document.getElementById("userID").value;
      const serviceID = document.getElementById("service").value;
      const nomConteneur = document.getElementById("nomConteneur").value;

      if (!nomConteneur) {
        alert("❌ Veuillez entrer un nom de site.");
        return;
      }

      fetch("{{ route('jenkins.trigger') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute('content')
        },
        body: JSON.stringify({
          UserID: userID,
          ServiceID: serviceID,
          NomConteneur: nomConteneur
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert("🚀 Jenkins lancé avec succès !");
          event.target.submit(); // Soumission du formulaire après succès
        } else {
          alert("❌ Échec Jenkins : " + data.message);
        }
      })
      .catch(error => {
        alert("❌ Erreur technique : " + error);
      });
    }

    // Script du bouton burger pour mobile
    const burgerMenu = document.getElementById('burgerMenu');
    const sidebar = document.getElementById('sidebar');
    burgerMenu.addEventListener('click', () => {
      sidebar.classList.toggle('active');
    });
  </script>
</body>
</html>