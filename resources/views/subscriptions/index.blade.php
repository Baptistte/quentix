<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Abonnements</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .check-icon {
            color: #16a34a; /* Green */
        }

        .cross-icon {
            color: #dc2626; /* Red */
        }

        .plan-card {
            border: 1px solid #e5e7eb; /* Gray-300 */
            border-radius: 10px;
            background-color: #f9fafb; /* Gray-50 */
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .plan-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .plan-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .plan-card ul {
            margin-top: 10px;
        }

        .plan-card ul li {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .plan-card ul li svg {
            margin-right: 8px;
        }

        .cta-button {
            background-color: #2563eb; /* Blue-500 */
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 8px;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #1d4ed8; /* Blue-700 */
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="sticky top-0 bg-white shadow-md z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">Quentix</a>
            <nav>
                <a href="/" class="text-gray-600 hover:text-blue-500 mx-4">Accueil</a>
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-500 mx-4">Mon Tableau de Bord</a>
            </nav>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-6 py-12 flex-grow">
        <h1 class="text-3xl font-bold text-center mb-12">Nos Offres d'Abonnement</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div class="plan-card">
                <h3 class="font-bold text-gray-800">Plan Basique</h3>
                <p class="text-gray-600 mb-4">1 site inclus pour un usage personnel ou professionnel.</p>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Hébergement sécurisé
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Certificat SSL inclus
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cross-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Support Premium 24/7
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cross-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Sauvegardes automatiques
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cross-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Analyses avancées
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cross-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Gestion multilingue
                    </li>
                </ul>
                <div class="text-center mt-6">
                    <a class="cta-button">Choisir ce Plan</a>
                </div>
            </div>

            <!-- Pro Plan -->
            <div class="plan-card">
                <h3 class="font-bold text-gray-800">Plan Pro</h3>
                <p class="text-gray-600 mb-4">10 sites pour les entreprises en expansion.</p>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Hébergement sécurisé
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Certificat SSL inclus
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Support Premium 24/7
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Sauvegardes automatiques
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Analyses avancées
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cross-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Gestion multilingue
                    </li>
                </ul>
                <div class="text-center mt-6">
                    <a class="cta-button">Choisir ce Plan</a>
                </div>
            </div>

            <!-- Enterprise Plan -->
            <div class="plan-card">
                <h3 class="font-bold text-gray-800">Plan Entreprise</h3>
                <p class="text-gray-600 mb-4">100 sites pour les grandes organisations.</p>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Hébergement sécurisé
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Certificat SSL inclus
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Support Premium 24/7
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Sauvegardes automatiques
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Analyses avancées
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Gestion multilingue
                    </li>
                </ul>
                <div class="text-center mt-6">
                    <a class="cta-button">Choisir ce Plan</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6">
        <div class="container mx-auto px-6 text-center text-white">
            <p>&copy; 2025 Quentix. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>