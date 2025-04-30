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
    .sidebar .sidebar-logo-container { /* Changed class name */
        display: flex;
        justify-content: center;
        margin-bottom: 15px; /* Adjusted margin */
    }
     .sidebar .sidebar-logo-container img {
         height: 25px;
     }
     .sidebar .credits-display { /* Style for credits */
        text-align: center;
        margin-bottom: 15px; /* Spacing below credits */
        padding: 8px;
        border-radius: 6px;
        background-color: #f3e8ff; /* Light purple bg */
        border: 1px solid #d8b4fe; /* Lighter purple border */
     }
     .sidebar .credits-display span {
         font-weight: 600;
         color: #581c87; /* Darker purple text */
     }
    .sidebar a {
        text-decoration: none;
        color: black;
        font-size: 18px;
        font-weight: 500;
        padding: 10px 0; /* Adjusted padding */
        transition: transform 0.3s ease-in-out, color 0.2s;
    }
    .sidebar a:hover {
        transform: translateX(5px);
        color: #6B21A8;
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
    .main-content h1.page-title {
        margin-bottom: 40px;
        color: white;
        font-size: 2.25rem;
        font-weight: 700;
    }
    .main-content h2.section-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
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
        display: inline-block;
        text-decoration: none;
        text-align: center;
    }
    .btn-primary:hover {
        background: #5A1A91;
    }

    #subscription .subscription-info {
        padding: 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        background-color: #f9fafb;
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 320px;
    }
    #subscription .subscription-info button {
        color: #6B21A8;
        font-size: 1.5rem;
        font-weight: 700;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }
    #subscription .subscription-info p.plan-name {
        font-size: 1.125rem;
        font-weight: 600;
    }
    #subscription .subscription-info p.plan-price {
        color: #4b5563;
    }

    .desktop-solutions-container .solution-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .desktop-solutions-container .solution-card,
    .desktop-solutions-container .see-more-widget {
        width: calc(20% - 8px);
        min-width: 150px;
        padding: 20px;
        border: 1px solid #d1d5db;
        border-radius: 0.75rem;
        background-color: white;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        transition: box-shadow 0.3s ease;
    }
    .desktop-solutions-container .solution-card:hover,
    .desktop-solutions-container .see-more-widget:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    .desktop-solutions-container .solution-card h3 {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1f2937;
    }
    .desktop-solutions-container .solution-card p {
        font-size: 0.875rem;
        color: #6b7280;
        word-break: break-all;
    }
    .desktop-solutions-container .solution-card .status-badge {
        margin-top: 8px;
        padding: 4px 12px;
        font-size: 0.875rem;
        font-weight: 600;
        border-radius: 9999px;
    }
    .desktop-solutions-container .solution-card .status-badge.active {
        background-color: #dcfce7;
        color: #15803d;
    }
    .desktop-solutions-container .solution-card .status-badge.inactive {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    .desktop-solutions-container .see-more-widget a {
        color: #6B21A8;
        font-size: 2.25rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

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
            font-size: 1.875rem;
        }
        .main-content h2.section-title {
             font-size: 1.25rem;
             margin-bottom: 0.75rem;
        }

        .desktop-solutions-container {
            display: none;
        }

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
            border-bottom: 1px solid #f3f4f6;
            flex-wrap: wrap;
         }
         .mobile-solution-card div:last-child {
            border-bottom: none;
         }
        .mobile-solution-card .label {
            font-weight: 600;
            color: #4b5563;
            font-size: 0.875rem;
            margin-right: 10px;
        }
        .mobile-solution-card .value {
            font-size: 0.875rem;
            color: #1f2937;
            text-align: right;
            flex-grow: 1;
            word-break: break-all;
        }
        .mobile-solution-card .status-value .status-badge {
            padding: 4px 8px;
            border-radius: 0.5rem;
            color: white;
            font-size: 0.8rem;
            display: inline-block;
        }
        .mobile-solution-card .status-value .status-badge.active { background-color: #22c55e; }
        .mobile-solution-card .status-value .status-badge.inactive { background-color: #ef4444; }

        .mobile-see-all-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            padding: 10px;
            background-color: #f3f4f6;
            color: #6B21A8;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .mobile-see-all-link:hover {
             background-color: #e5e7eb;
        }

        #subscription .subscription-info {
            max-width: 100%;
        }

        #bottomFooter {
             padding-bottom: 20px;
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
    <div class="sidebar-logo-container">
      <a href="/" class="flex items-center">
        <img src="{{ asset('images/logoQuentixsansRouNoir.svg') }}" alt="Quentix Logo" class="logo">
      </a>
    </div>

    <div class="credits-display">
        <span>Crédits : {{ Auth::user()->credits ?? 0 }} ✨</span>
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
                    if (element.tagName === 'A' && !element.closest('form')) {
                        setTimeout(() => sidebar.classList.remove('active'), 50);
                    }
                }
           });
        });
    }

  </script>
</body>
</html>