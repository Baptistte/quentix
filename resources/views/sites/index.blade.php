<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      overflow-x: hidden;
    }

    #mobileMenuToggle {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 10000;
      background: white;
      border: none;
      padding: 8px;
      cursor: pointer;
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    #mobileMenuToggle span {
      display: block;
      width: 22px;
      height: 3px;
      margin: 4px 0;
      background: #6B21A8;
      transition: background-color 0.3s;
    }
    #mobileMenuToggle:hover span {
       background: #5A1A91;
    }

    .sidebar {
      background: white;
      color: black;
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px;
      box-shadow: 2px 0 10px rgba(0,0,0,0.2);
      display: flex;
      flex-direction: column;
      transition: transform 0.3s ease-in-out;
      z-index: 999;
    }
    .sidebar a {
      text-decoration: none;
      color: black;
      font-size: 18px;
      font-weight: 500;
      padding: 12px 0;
      transition: transform 0.3s ease-in-out, color 0.2s;
    }
    .sidebar a:hover {
      transform: translateX(5px);
      color: #6B21A8;
    }
    .sidebar .logo {
      height: 25px;
      margin-bottom: 20px;
    }

    .main-content {
      margin-top: 0;
      margin-left: 250px;
      padding: 40px;
      transition: margin-left 0.3s ease-in-out;
      overflow-y: auto;
      box-sizing: border-box;
      min-height: 100vh;
    }
    .main-content h1 {
      margin-bottom: 40px;
    }

    .section {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      transition: transform 0.3s ease;
    }
    .section:hover {
      transform: translateY(-5px);
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
    .status-badge {
      padding: 6px 10px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: bold;
    }
    .status-active {
      background: #22C55E;
      color: white;
    }
    .status-inactive {
      background: #EF4444;
      color: white;
    }
    #bottomFooter {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 190px;
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      #mobileMenuToggle {
        display: block;
      }

      .sidebar {
        transform: translateX(-100%);
        z-index: 9999;
      }
      .sidebar.active {
        transform: translateX(0);
      }

      .main-content {
        margin-left: 0;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <button id="mobileMenuToggle" aria-label="Toggle Navigation">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <div class="sidebar" id="sidebar">
    <div class="flex justify-center mb-5">
      <a href="/" class="flex items-center">
        <img src="{{ asset('images/logoQuentixsansRouNoir.svg') }}" alt="Quentix Logo" class="logo">
      </a>
    </div>
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

  <div class="main-content">

    <h1 class="text-3xl font-bold text-white mb-6 pt-10 md:pt-0">🌍 Mes Sites</h1>


    <header class="flex flex-col md:flex-row justify-between items-start md:items-center bg-white p-4 md:p-6 rounded-md shadow-md mb-8">
      <div class="space-y-1 mb-4 md:mb-0">
        <h1 class="text-xl md:text-2xl font-bold">Vue globale de vos solution(s) déployée(s)</h1>
        <p class="text-base md:text-lg font-semibold text-gray-800">
          Bonjour, {{ Auth::user()->name }}, vous avez actuellement
          <span class="text-purple-600">{{ $sites->count() }}</span> site(s) actif(s).
        </p>
      </div>
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach($sites as $site)
      <div class="bg-white p-4 md:p-6 rounded-xl shadow-lg flex flex-col justify-between relative w-full">
        <div class="absolute top-3 right-3 md:top-4 md:right-4 text-gray-400 text-xl md:text-2xl">
          @if($site->service === 'wordpress')
            📝
          @else
            🖥️
          @endif
        </div>
        <h2 class="text-lg md:text-xl font-bold text-gray-900 mr-8">{{ $site->name }}</h2>
        <p class="text-gray-600 text-xs md:text-sm mt-2 break-words">🔗 {{ $site->domain }}</p>
        <span class="mt-3 md:mt-4 inline-block px-3 py-1 text-xs font-semibold text-white rounded-lg self-start
          {{ $site->statut_id == 1 ? 'bg-green-500' : 'bg-red-500' }}">
          {{ $site->statut_id == 1 ? 'Actif' : 'Inactif' }}
        </span>
        <div class="mt-4 md:mt-6 flex flex-col space-y-2 md:flex-row md:space-y-0 md:space-x-3">
          <a class="px-4 py-2 text-sm font-semibold text-white bg-purple-600 rounded-lg hover:bg-purple-700 transition text-center">
            ⚙️ Gérer
          </a>
          <form method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
              ❌ Supprimer
            </button>
          </form>
        </div>
      </div>
      @endforeach

      <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-center cursor-pointer min-h-[150px] md:min-h-0">
        <a href="{{ route('sites.create') }}" class="text-5xl md:text-6xl text-gray-400 hover:text-gray-600 transition">
          +
        </a>
      </div>
    </div>
  </div>

  <script>
    const menuToggle = document.getElementById('mobileMenuToggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    if (menuToggle && sidebar) {
      menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
      });

      mainContent.addEventListener('click', function(event) {
          if (sidebar.classList.contains('active') && !menuToggle.contains(event.target)) {
              sidebar.classList.remove('active');
          }
      });

      sidebar.querySelectorAll('a').forEach(link => {
          link.addEventListener('click', function() {
              if (!link.closest('form')) {
                 sidebar.classList.remove('active');
              }
          });
      });
    }
  </script>

</body>
</html>