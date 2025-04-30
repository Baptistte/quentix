<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de Bord - Quentix</title>
  <link rel="icon" type="image/svg+xml" href="{{ asset('images/logoQuentixRoueSeulement.svg') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    html, body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      font-family: sans-serif;
      background: linear-gradient(to bottom, #6B21A8, #EDE9FE);
      overflow-x: hidden; /* Prevent horizontal scroll */
    }

    #topbar {
      /* Mobile Only - Hidden on desktop */
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 70px;
      background: #6B21A8;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      z-index: 9999;
    }
    #topbar .logo-container { display: flex; align-items: center; }
    #topbar img { height: 25px; }

    #burgerMenu {
      /* Mobile Only */
      display: none;
      background: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    #burgerMenu span {
      display: block; width: 25px; height: 3px; margin: 4px 0;
      background: #6B21A8; transition: 0.3s;
    }

    .sidebar {
      background: white;
      color: black;
      width: 250px;
      position: fixed;
      top: 0; /* Start from top on desktop */
      left: 0;
      bottom: 0;
      display: flex;
      flex-direction: column;
      padding: 20px;
      box-shadow: 2px 0 10px rgba(0,0,0,0.2);
      transition: transform 0.3s ease-in-out;
      z-index: 1000; /* Ensure sidebar is high */
    }
    .sidebar .logo-sidebar-container { /* Container for logo inside sidebar */
        text-align: center;
        margin-bottom: 20px;
        padding-top: 10px; /* Some space at the top */
    }
     .sidebar .logo-sidebar-container img {
         height: 25px; /* Match topbar logo height */
     }
    .sidebar a {
      text-decoration: none; color: black; font-size: 18px;
      font-weight: 500; padding: 12px 0; transition: 0.3s ease-in-out;
    }
    .sidebar a:hover { transform: translateX(5px); }

    .main-content {
      margin-left: 250px;
      padding: 40px; /* Adjusted top padding for desktop */
      transition: margin-left 0.3s ease-in-out;
      box-sizing: border-box;
      min-height: 100vh;
    }
    .bg-card {
      background: white; color: #333;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border-radius: 12px; padding: 2rem;
    }
    .btn-primary {
      background: #6B21A8; color: white; padding: 10px 20px;
      border-radius: 8px; font-weight: bold; border: none;
      cursor: pointer; transition: 0.3s ease;
    }
    .btn-primary:hover { background: #5A1A91; }

    @media (max-width: 768px) {
      /* Show topbar and burger on mobile */
      #topbar { display: flex; }
      #burgerMenu { display: block; }

      /* Adjust sidebar for mobile */
      .sidebar {
        top: 70px; /* Position below mobile topbar */
        transform: translateX(-100%); /* Hide off-screen */
        height: calc(100vh - 70px); /* Adjust height */
        bottom: auto; /* Override bottom: 0 */
      }
      .sidebar.active { transform: translateX(0); }
      .sidebar .logo-sidebar-container { display: none; } /* Hide sidebar logo on mobile */


      /* Adjust main content for mobile */
      .main-content {
        margin-left: 0;
        padding-top: 110px; /* Keep space below mobile topbar (70px + 40px padding) */
      }
    }
  </style>
</head>
<body>

  <div id="topbar">
    <button id="burgerMenu" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
    <div class="logo-container">
      <a href="/" class="flex items-center">
        <img src="{{ asset('images/logoQuentixSansRoueBlanc.svg') }}" alt="Quentix Logo">
      </a>
    </div>
    <div></div>
  </div>

  <div class="sidebar" id="sidebar">
    <div class="logo-sidebar-container">
         <a href="/" class="flex justify-center items-center">
            <img src="{{ asset('images/logoQuentixsansRouNoir.svg') }}" alt="Quentix Logo">
         </a>
    </div>
    <a href="{{ route('user.space') }}">👤 Mon Profil</a>
    <a href="{{ route('sites.index') }}">🚀 Mes Solutions</a>
    <a href="{{ route('user.space') }}">📜 Mon Abonnement</a>
    <a href="{{ route('purchase.history') }}">🛒 Historique</a>
    <a href="/">🏠 Accueil</a>

    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
      @csrf
      <button type="submit" class="btn-primary w-full">Déconnexion</button>
    </form>
  </div>

  <div class="main-content">
    <div class="bg-card max-w-5xl w-full mx-auto flex flex-col md:flex-row gap-12">
      <div class="w-full md:w-1/2">
        <h1 class="text-3xl font-bold mb-6">🚀 Lancez votre site en quelques clics</h1>
        <p class="text-gray-600 mb-6">Complétez les informations ci-dessous pour générer votre site.</p>

        <form action="{{ route('sites.store') }}" method="POST" class="space-y-6" onsubmit="lancerJob(event)">
          @csrf
          <input type="hidden" id="userID" value="{{ Auth::user()->id }}">
          <input type="hidden" id="nomConteneur" name="nomConteneur">

          <div>
            <label for="site_name" class="block text-lg font-semibold text-gray-700 mb-2">Nom du site</label>
            <input type="text" id="site_name" name="site_name" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800"
                   oninput="document.getElementById('nomConteneur').value = this.value">
          </div>

          <div>
            <label for="service" class="block text-lg font-semibold text-gray-700 mb-2">Service</label>
            <select id="service" name="service" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800"
                    onchange="document.getElementById('serviceID').value = this.value">
              <option value="1">WordPress</option>
              <option value="autre">Autre</option>
            </select>
          </div>

          <div>
            <label for="domain" class="block text-lg font-semibold text-gray-700 mb-2">URL désirée</label>
            <input type="text" id="domain" name="domain" placeholder="ex: monsite.quentix.com" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none text-gray-800">
          </div>

          <button type="submit" class="w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition">
            🌍 Créer mon site
          </button>
        </form>
      </div>

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
          event.target.submit();
        } else {
          alert("❌ Échec Jenkins : " + data.message);
        }
      })
      .catch(error => {
        alert("❌ Erreur technique : " + error);
      });
    }

    const burgerMenu = document.getElementById('burgerMenu');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content'); // Select main content

    if (burgerMenu && sidebar) {
        burgerMenu.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Optional: Close sidebar when clicking outside on mobile
         mainContent.addEventListener('click', (event) => {
            // Check if sidebar is active (mobile view) and click is outside sidebar/burger
             if (window.innerWidth <= 768 && sidebar.classList.contains('active') && !sidebar.contains(event.target) && !burgerMenu.contains(event.target)) {
                sidebar.classList.remove('active');
            }
         });
    }
  </script>
</body>
</html>