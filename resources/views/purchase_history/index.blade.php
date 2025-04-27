<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
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
        overflow-x: hidden;
    }

    #burgerMenu {
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
    #burgerMenu span {
        display: block;
        width: 22px;
        height: 3px;
        margin: 4px 0;
        background: #6B21A8;
        transition: background-color 0.3s;
    }
    #burgerMenu:hover span {
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
    .main-content h1.page-title { /* Added class for specific targeting */
        margin-bottom: 40px;
        color: white;
        font-size: 1.875rem; /* 3xl */
        font-weight: 700;
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
        display: inline-block; /* Ensure badge behaves well */
    }
    .status-active {
        background: #22C55E;
        color: white;
    }
    .status-inactive {
        background: #EF4444;
        color: white;
    }

    /* Desktop Table Styles */
    .purchase-table-container {
        background: white;
        padding: 24px;
        border-radius: 0.5rem; /* lg */
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* lg */
        overflow-x: auto; /* Allows horizontal scroll on small desktops if needed */
    }
    .purchase-table {
        width: 100%;
        border-collapse: collapse;
    }
    .purchase-table thead tr {
        background-color: #6B21A8; /* purple-700 */
        color: white;
    }
    .purchase-table th {
        padding: 12px; /* p-3 */
        text-align: left;
        font-weight: 600; /* Semibold */
    }
    .purchase-table tbody tr {
        border-bottom: 1px solid #e5e7eb; /* Gray-200 */
    }
    .purchase-table tbody tr:last-child {
        border-bottom: none;
    }
    .purchase-table td {
        padding: 12px; /* p-3 */
        vertical-align: middle;
    }
    .purchase-table .status-cell span {
        padding: 4px 8px; /* px-2 py-1 */
        border-radius: 0.5rem; /* lg */
        color: white;
        font-size: 0.875rem; /* sm */
    }
    .purchase-table .status-completed { background-color: #22c55e; /* green-500 */ }
    .purchase-table .status-failed { background-color: #ef4444; /* red-500 */ }
    .purchase-table .status-pending { background-color: #f59e0b; /* yellow-500 */ } /* Example for pending */

    @media (max-width: 768px) {
        #burgerMenu {
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
        .main-content h1.page-title {
            padding-top: 50px; /* Ensure title is below burger */
            font-size: 1.5rem; /* text-2xl */
            margin-bottom: 24px; /* mb-6 */
        }

        /* Hide Desktop Table */
        .purchase-table-container {
            display: none;
        }

        /* Mobile Card List Styles */
        .mobile-purchase-list {
            display: block; /* Make sure it's visible */
        }
        .mobile-purchase-card {
            background: white;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .mobile-purchase-card div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #f3f4f6; /* gray-100 */
        }
         .mobile-purchase-card div:last-child {
            border-bottom: none;
         }
        .mobile-purchase-card .label {
            font-weight: 600;
            color: #4b5563; /* gray-600 */
            font-size: 0.875rem;
        }
        .mobile-purchase-card .value {
            font-size: 0.875rem;
            color: #1f2937; /* gray-800 */
            text-align: right;
        }
        .mobile-purchase-card .status-value span {
            padding: 4px 8px;
            border-radius: 0.5rem;
            color: white;
            font-size: 0.8rem;
        }
        .mobile-purchase-card .status-completed { background-color: #22c55e; }
        .mobile-purchase-card .status-failed { background-color: #ef4444; }
        .mobile-purchase-card .status-pending { background-color: #f59e0b; }
    }

    /* Hide mobile list on desktop */
    @media (min-width: 769px) {
        .mobile-purchase-list {
            display: none;
        }
    }
  </style>
</head>
<body>

  <button id="burgerMenu" aria-label="Menu">
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
    <h1 class="page-title">Historique des Achats</h1>

    <!-- Desktop Table -->
    <div class="purchase-table-container">
      <table class="purchase-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Plan</th>
            <th>Montant</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($purchases as $purchase)
            <tr>
              <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/Y H:i') }}</td>
              <td>{{ $purchase->plan->name ?? 'Plan inconnu' }}</td>
              <td>{{ number_format($purchase->amount, 2, ',', ' ') }} €</td>
              <td class="status-cell">
                <span class="status-{{ $purchase->status === 'completed' ? 'completed' : ($purchase->status === 'failed' ? 'failed' : 'pending') }}">
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

    <!-- Mobile Card List -->
    <div class="mobile-purchase-list">
      @forelse ($purchases as $purchase)
        <div class="mobile-purchase-card">
          <div>
            <span class="label">Date</span>
            <span class="value">{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/Y H:i') }}</span>
          </div>
          <div>
            <span class="label">Plan</span>
            <span class="value">{{ $purchase->plan->name ?? 'Plan inconnu' }}</span>
          </div>
          <div>
            <span class="label">Montant</span>
            <span class="value">{{ number_format($purchase->amount, 2, ',', ' ') }} €</span>
          </div>
          <div>
            <span class="label">Statut</span>
            <span class="value status-value">
              <span class="status-{{ $purchase->status === 'completed' ? 'completed' : ($purchase->status === 'failed' ? 'failed' : 'pending') }}">
                  {{ ucfirst($purchase->status) }}
              </span>
            </span>
          </div>
        </div>
      @empty
        <div class="bg-white p-4 rounded-lg shadow text-center text-gray-500">
          Aucun achat enregistré.
        </div>
      @endforelse
    </div>

  </div>

  <script>
    const menuToggle = document.getElementById('burgerMenu');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        if (mainContent) {
            mainContent.addEventListener('click', function(event) {
                if (sidebar.classList.contains('active') && !menuToggle.contains(event.target) && !sidebar.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            });
        }

        sidebar.querySelectorAll('a:not(.logo-link), button').forEach(element => {
            element.addEventListener('click', function(e) {
                // Prevent closing for form submission button if needed, but allow for links
                if (element.tagName === 'A' && sidebar.classList.contains('active')) {
                   setTimeout(() => sidebar.classList.remove('active'), 100); // Allow navigation before closing
                } else if (element.tagName === 'BUTTON' && element.closest('form') && sidebar.classList.contains('active')) {
                   // Optionally keep open or close after delay if form submit redirects
                } else if (sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });
        });
    }
  </script>
</body>
</html>