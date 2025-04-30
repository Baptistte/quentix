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
        display: block; /* Ensure it takes space correctly */
        text-align: center;
    }
    .sidebar .logo img { /* Style image inside logo link if needed */
        height: 100%;
        width: auto;
        display: inline-block;
    }

    .main-content {
        margin-top: 0;
        margin-left: 250px; /* Adjusted for potential scrollbar */
        padding: 40px;
        transition: margin-left 0.3s ease-in-out;
        overflow-y: auto;
        box-sizing: border-box;
        min-height: 100vh;
    }
    .main-content h1.page-title {
        margin-bottom: 40px;
        color: white;
        font-size: 2.25rem; /* 4xl */
        font-weight: 700;
    }
    .main-content h2.section-title {
        font-size: 1.5rem; /* 2xl */
        font-weight: 700;
        margin-bottom: 1rem; /* mb-3 or mb-4 */
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
        display: inline-block; /* Ensure proper spacing and alignment */
        text-decoration: none; /* Remove underline from links styled as buttons */
        text-align: center;
    }
    .btn-primary:hover {
        background: #5A1A91;
    }

    #subscription .subscription-info {
        padding: 1rem; /* p-4 */
        border: 1px solid #d1d5db; /* border-gray-300 */
        border-radius: 0.5rem; /* rounded-lg */
        background-color: #f9fafb; /* bg-gray-50 */
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 320px; /* Equivalent to w-80 */
    }
    #subscription .subscription-info button {
        color: #6B21A8; /* text-purple-600 */
        font-size: 1.5rem; /* text-2xl */
        font-weight: 700; /* font-bold */
        background-color: transparent;
        border: none;
        cursor: pointer;
    }
    #subscription .subscription-info p.plan-name {
        font-size: 1.125rem; /* text-lg */
        font-weight: 600; /* font-semibold */
    }
    #subscription .subscription-info p.plan-price {
        color: #4b5563; /* text-gray-600 */
    }

    /* Desktop Solutions Styles */
    .desktop-solutions-container .solution-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 10px; /* gap-2.5 */
    }
    .desktop-solutions-container .solution-card,
    .desktop-solutions-container .see-more-widget {
        width: calc(20% - 8px); /* Adjust based on gap, w-[20%] approximation */
        min-width: 150px; /* Prevent excessive shrinking */
        padding: 20px; /* p-5 */
        border: 1px solid #d1d5db; /* border-gray-300 */
        border-radius: 0.75rem; /* rounded-xl */
        background-color: white;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* shadow-md */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        transition: box-shadow 0.3s ease;
    }
    .desktop-solutions-container .solution-card:hover,
    .desktop-solutions-container .see-more-widget:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
    }
    .desktop-solutions-container .solution-card h3 {
        font-size: 1.125rem; /* text-lg */
        font-weight: 700; /* font-bold */
        color: #1f2937; /* text-gray-800 */
    }
    .desktop-solutions-container .solution-card p {
        font-size: 0.875rem; /* text-sm */
        color: #6b7280; /* text-gray-500 */
        word-break: break-all; /* Ensure long domains don't overflow */
    }
    .desktop-solutions-container .solution-card .status-badge {
        margin-top: 8px; /* mt-2 */
        padding: 4px 12px; /* px-3 py-1 */
        font-size: 0.875rem; /* text-sm */
        font-weight: 600; /* font-semibold */
        border-radius: 9999px; /* rounded-full */
    }
    .desktop-solutions-container .solution-card .status-badge.active {
        background-color: #dcfce7; /* bg-green-200 */
        color: #15803d; /* text-green-700 */
    }
    .desktop-solutions-container .solution-card .status-badge.inactive {
        background-color: #fee2e2; /* bg-red-200 */
        color: #b91c1c; /* text-red-700 */
    }
    .desktop-solutions-container .see-more-widget a {
        color: #6B21A8; /* text-purple-600 */
        font-size: 2.25rem; /* text-4xl */
        font-weight: 700; /* font-bold */
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    /* Initially hide mobile */
     .mobile-solutions-list { display: none; }

    #bottomFooter {
        text-align: center;
        padding-top: 20px;
        margin-top: 20px;
    }

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
            padding-top: 50px;
            font-size: 1.875rem; /* 3xl */
        }
        .main-content h2.section-title {
             font-size: 1.25rem; /* xl */
             margin-bottom: 0.75rem; /* mb-3 */
        }

        /* Hide Desktop solutions */
        .desktop-solutions-container {
            display: none;
        }

        /* Show and style Mobile Solutions */
        .mobile-solutions-list {
            display: block;
        }
        .mobile-solution-card {
            background: white;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
         .mobile-solution-card div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #f3f4f6; /* gray-100 */
            flex-wrap: wrap; /* Allow wrapping if content is long */
         }
         .mobile-solution-card div:last-child {
            border-bottom: none;
         }
        .mobile-solution-card .label {
            font-weight: 600;
            color: #4b5563; /* gray-600 */
            font-size: 0.875rem;
            margin-right: 10px; /* Space between label and value */
        }
        .mobile-solution-card .value {
            font-size: 0.875rem;
            color: #1f2937; /* gray-800 */
            text-align: right;
            flex-grow: 1; /* Allow value to take remaining space */
            word-break: break-all;
        }
        .mobile-solution-card .status-value .status-badge {
            padding: 4px 8px;
            border-radius: 0.5rem;
            color: white;
            font-size: 0.8rem;
            display: inline-block; /* Ensure background applies correctly */
        }
        .mobile-solution-card .status-value .status-badge.active { background-color: #22c55e; }
        .mobile-solution-card .status-value .status-badge.inactive { background-color: #ef4444; }

        .mobile-see-all-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            padding: 10px;
            background-color: #f3f4f6; /* gray-100 */
            color: #6B21A8;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .mobile-see-all-link:hover {
             background-color: #e5e7eb; /* gray-200 */
        }

        #subscription .subscription-info {
            max-width: 100%; /* Allow full width on mobile */
        }

        #bottomFooter {
             padding-bottom: 20px; /* Ensure space at bottom */
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
    <h1 class="page-title">Bienvenue, {{ Auth::user()->name }} 👋</h1>

    <section id="profile" class="section">
      <h2 class="section-title">👤 Mes Informations</h2>
      <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
      <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
      <p><strong>Date d'inscription :</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
    </section>

    <section id="subscription" class="section">
      <h2 class="section-title">📜 Mon Abonnement</h2>
      @if($subscription)
        <div class="subscription-info">
          <div>
            <p class="plan-name">{{ $subscription->name }}</p>
            <p class="plan-price">{{ number_format($subscription->price, 2, ',', ' ') }}€ / mois</p>
          </div>
          <button onclick="showSubscriptionInfo()">?</button>
        </div>
      @else
        <p class="text-gray-500">Aucun abonnement actif.</p>
        <a href="{{ route('subscriptions.index') }}" class="btn-primary mt-4">Souscrire</a>
      @endif
    </section>

    <section id="solutions" class="section">
        <h2 class="section-title">🚀 Mes Solutions Déployées</h2>

        @if(isset($solutions) && $solutions->isNotEmpty())
            <div class="desktop-solutions-container">
                <div class="solution-grid">
                    @foreach($solutions->take(4) as $solution)
                        <div class="solution-card">
                            <h3>{{ $solution->name }}</h3>
                            <p>{{ $solution->domain }}</p>
                            <span class="status-badge {{ $solution->status === 'Actif' ? 'active' : 'inactive' }}">
                                {{ $solution->status }}
                            </span>
                        </div>
                    @endforeach

                    @if($solutions->count() > 0)
                        <div class="see-more-widget">
                            <a href="{{ route('sites.index') }}">➜</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mobile-solutions-list">
                @foreach($solutions->take(4) as $solution)
                    <div class="mobile-solution-card">
                        <div>
                            <span class="label">Nom</span>
                            <span class="value">{{ $solution->name }}</span>
                        </div>
                        <div>
                            <span class="label">Domaine</span>
                            <span class="value">{{ $solution->domain }}</span>
                        </div>
                        <div>
                            <span class="label">Statut</span>
                            <span class="value status-value">
                                <span class="status-badge {{ $solution->status === 'Actif' ? 'active' : 'inactive' }}">
                                    {{ $solution->status }}
                                </span>
                            </span>
                        </div>
                    </div>
                @endforeach

                @if($solutions->count() > 4)
                   <a href="{{ route('sites.index') }}" class="mobile-see-all-link">Voir toutes les solutions</a>
                @endif
                 @if($solutions->count() > 0 && $solutions->count() <= 4)
                    <a href="{{ route('sites.index') }}" class="mobile-see-all-link">Gérer mes solutions</a>
                 @endif
            </div>

        @else
            <p class="text-gray-500">Aucune solution déployée.</p>
                <a href="{{ route('sites.create') }}" class="btn-primary mt-4"> 
                Déployer une Solution
            </a>
        @endif
    </section>


    <section id="bottomFooter">
      <a href="/support" class="btn-primary">Besoin d'aide ? Contactez-nous</a>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function showSubscriptionInfo() {
      @if(isset($subscription))
        let features = @json(json_decode($subscription->features ?? '{}'));
        let featureList = '<ul style="text-align:left; padding-left: 20px; list-style: disc;">';
         if(features.sites_inclus !== undefined) featureList += `<li>${features.sites_inclus} site(s) inclus</li>`;
         if(features.hebergement_securise !== undefined) featureList += `<li>${features.hebergement_securise ? '✔️ Hébergement sécurisé' : '❌ Hébergement non sécurisé'}</li>`;
         if(features.certificat_ssl_inclus !== undefined) featureList += `<li>${features.certificat_ssl_inclus ? '✔️ Certificat SSL inclus' : '❌ Pas de certificat SSL'}</li>`;
         if(features.support_premium_24_7 !== undefined) featureList += `<li>${features.support_premium_24_7 ? '✔️ Support Premium 24/7' : '❌ Pas de support premium'}</li>`;
         if(features.sauvegardes_automatiques !== undefined) featureList += `<li>${features.sauvegardes_automatiques ? '✔️ Sauvegardes automatiques' : '❌ Pas de sauvegardes automatiques'}</li>`;
         if(features.gestion_multilingue !== undefined) featureList += `<li>${features.gestion_multilingue ? '✔️ Gestion multilingue' : '❌ Pas de gestion multilingue'}</li>`;
        featureList += '</ul>';

        Swal.fire({
          title: "Détails de l'abonnement",
          html: `
            <p style="text-align: left;"><strong>Type :</strong> {{ $subscription->name }}</p>
            <p style="text-align: left;"><strong>Prix :</strong> {{ number_format($subscription->price, 2, ',', ' ') }}€ / mois</p>
            <h4 style="text-align: left; margin-top: 15px; font-weight: bold;">Fonctionnalités :</h4>
            ${featureList}
          `,
          icon: "info",
          confirmButtonText: "OK",
          confirmButtonColor: "#6B21A8"
        });
      @else
        Swal.fire({
          title: "Vous n'avez pas encore d'abonnement",
          text: "Souscrivez à un plan pour débloquer toutes les fonctionnalités !",
          icon: "info",
          confirmButtonText: "Voir les offres",
          confirmButtonColor: "#6B21A8",
          showCancelButton: true,
          cancelButtonText: "Annuler"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "{{ route('subscriptions.index') }}";
          }
        });
      @endif
    }

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

        sidebar.querySelectorAll('a:not(.logo), button').forEach(element => {
           element.addEventListener('click', function(e) {
                if (sidebar.classList.contains('active')) {
                    // Allow default behavior (navigation or form submit) then close.
                    // Check if it's a link and not part of the logout form
                    if (element.tagName === 'A' && !element.closest('form')) {
                         // Use timeout to allow navigation before animation starts
                        setTimeout(() => sidebar.classList.remove('active'), 50);
                    }
                    // You might keep it open for form submission or handle it differently
                }
           });
        });
    }

  </script>
</body>
</html>