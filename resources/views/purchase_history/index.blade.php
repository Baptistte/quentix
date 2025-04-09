<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de Bord - Quentix</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    /* Styles généraux */
    body {
      background: linear-gradient(to bottom, #6B21A8, #EDE9FE);
      height: 100vh;
      margin: 0;
      font-family: sans-serif;
    }

    /* Sidebar */
    .sidebar {
      background: white;
      color: black;
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: column;
      padding: 20px;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
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

    .sidebar .logo {
      text-align: center;
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 40px;
      height: 25px;
    }

    /* Contenu principal */
    .main-content {
      margin-left: 270px;
      padding: 40px;
      transition: margin 0.3s ease-in-out;
    }

    .main-content h1 {
      margin-bottom: 40px;
    }

    /* Sections */
    .section {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      transition: transform 0.3s ease;
    }

    .section:hover {
      transform: translateY(-5px);
    }

    /* Boutons */
    .btn-primary {
      background: #6B21A8;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
      transition: 0.3s ease;
      border: none;
      cursor: pointer;
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
      justify-content: end;
      align-content: flex-end;
      height: 190px;
    }

    /* Bouton Burger (caché sur ordinateur) */
    #burgerMenu {
      display: none;
      position: fixed;
      top: 20px;
      left: 20px;
      z-index: 10000;
      background: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    
    /* Styles pour les barres du burger */
    #burgerMenu span {
      display: block;
      width: 25px;
      height: 3px;
      margin: 4px 0;
      background: #6B21A8;
      transition: 0.3s;
    }
    
    /* Responsive : version mobile */
    @media (max-width: 768px) {
      /* Masquer la sidebar par défaut */
      .sidebar {
        transform: translateX(-100%);
      }
      
      /* Afficher la sidebar quand elle a la classe "active" */
      .sidebar.active {
        transform: translateX(0);
      }
      
      /* Afficher le bouton burger */
      #burgerMenu {
        display: block;
      }
      
      /* Adapter le contenu principal */
      .main-content {
        margin-left: 0;
        padding: 20px;
      }
      
      /* Transformation du tableau en affichage "stacké" sur mobile */
      table, thead, tbody, th, td, tr {
        display: block;
      }
      
      thead tr {
        display: none;
      }
      
      tr {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 8px;
        background: #fff;
      }
      
      td {
        display: flex;
        align-items: center;
        padding: 5px 5px 5px 140px;
        position: relative;
      }
      
      td:before {
        position: absolute;
        left: 10px;
        width: 120px;
        padding-right: 10px;
        white-space: nowrap;
        font-weight: bold;
      }
      
      /* Libellés de chaque colonne */
      td:nth-of-type(1):before { content: "Date"; }
      td:nth-of-type(2):before { content: "Plan"; }
      td:nth-of-type(3):before { content: "Montant"; }
      td:nth-of-type(4):before { content: "Statut"; }
    }
  </style>
</head>
<body>

  <!-- Bouton burger pour mobile -->
  <button id="burgerMenu" aria-label="Menu">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="flex justify-center">
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

  <!-- Contenu principal -->
  <div class="main-content">
    <h1 class="text-3xl font-bold text-white mb-6">Historique des Achats</h1>
    
    <!-- Tableau des achats transformé en affichage "stacké" sur mobile -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-purple-700 text-white rounded-lg">
            <th class="p-3 text-left">Date</th>
            <th class="p-3 text-left">Plan</th>
            <th class="p-3 text-left">Montant</th>
            <th class="p-3 text-left">Statut</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($purchases as $purchase)
            <tr class="border-b">
              <td class="p-3">{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/Y H:i') }}</td>
              <td class="p-3">{{ $purchase->plan->name ?? 'Plan inconnu' }}</td>
              <td class="p-3">{{ $purchase->amount }} €</td>
              <td class="p-3">
                <span class="px-2 py-1 rounded-lg text-white 
                  {{ $purchase->status === 'completed' ? 'bg-green-500' : ($purchase->status === 'failed' ? 'bg-red-500' : 'bg-yellow-500') }}">
                  {{ ucfirst($purchase->status) }}
                </span>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="p-3 text-center text-gray-500">Aucun achat enregistré.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    // Script pour le menu burger sur mobile
    document.getElementById('burgerMenu').addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
    });
  </script>
</body>
</html>