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

        /* Alert Styling */
        .alert-container {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
            animation: fadeIn 0.3s ease;
        }

        .alert-content {
            background: white;
            border-radius: 12px;
            padding: 20px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: slideIn 0.4s ease;
        }

        .alert-content img {
            max-width: 80px;
            margin: 0 auto 20px;
        }

        .alert-content h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .alert-content p {
            font-size: 1rem;
            margin-bottom: 20px;
            text-align: center;
            color: #4b5563; /* Gray-600 */
        }

        .alert-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .alert-buttons button,
        .alert-buttons a {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .alert-buttons button {
            background: #9ca3af; /* Gray-500 */
            color: white;
        }

        .alert-buttons button:hover {
            background: #6b7280; /* Gray-600 */
        }

        .alert-buttons a {
            background: #2563eb; /* Blue-500 */
            color: white;
            text-decoration: none;
        }

        .alert-buttons a:hover {
            background: #1d4ed8; /* Blue-700 */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
    <script>
        function showAlert(planName, price, description) {
            const features = {
                "Plan Basique": [
                    "1 site inclus",
                    "Hébergement sécurisé",
                    "Certificat SSL inclus",
                    "Sans Support illimité",
                    "Sans sauvegardes automatiques"
                ],
                "Plan Pro": [
                    "10 sites inclus",
                    "Hébergement sécurisé",
                    "Certificat SSL inclus",
                    "Support Premium 24/7",
                    "Sauvegardes automatiques",
                    "Analyses avancées"
                ],
                "Plan Entreprise": [
                    "100 sites inclus",
                    "Hébergement sécurisé",
                    "Certificat SSL inclus",
                    "Support Premium 24/7",
                    "Sauvegardes automatiques",
                    "Analyses avancées",
                    "Gestion multilingue"
                ]
            };
    
            const featureList = features[planName]
                .map(
                    (feature) =>
                        `<li class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ${feature.includes('Sans') ? 'text-red-500' : 'text-green-500'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${
                                    feature.includes('Sans')
                                        ? 'M6 18L18 6M6 6l12 12'
                                        : 'M5 13l4 4L19 7'
                                }" />
                            </svg>
                            <span class="ml-2">${feature}</span>
                        </li>`
                )
                .join("");
    
            const alertContent = `
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full transform transition-all duration-300 scale-95">
                        <img src="https://img.icons8.com/external-flat-juicy-fish/80/000000/external-delivery-ecommerce-flat-flat-juicy-fish.png" alt="Commande" class="mx-auto mb-4">
                        <h2 class="text-2xl font-bold mb-4 text-center">${planName}</h2>
                        <p class="text-gray-700 mb-4 text-center">${description}</p>
                        <ul class="mb-6">
                            ${featureList}
                        </ul>
                        <p class="text-gray-800 font-semibold text-center mb-6">Prix : <span class="text-blue-500">${price} € / mois</span></p>
                        <div class="flex justify-end space-x-4">
                            <button onclick="closeAlert()" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Annuler</button>
                            <a href="/payment?plan=${planName}" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Continuer</a>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML("beforeend", alertContent);
    
            // Smooth animation for opening the alert
            const alertBox = document.querySelector(".transform");
            setTimeout(() => {
                alertBox.classList.remove("scale-95");
                alertBox.classList.add("scale-100");
            }, 100);
        }
    
        function closeAlert() {
            const alert = document.querySelector(".fixed.inset-0");
            if (alert) alert.remove();
        }
    </script>
    
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
                    <button class="cta-button" onclick="showAlert('Plan Basique', 10, 'Parfait pour les utilisateurs individuels. Inclut les fonctionnalités de base pour commencer facilement.')">
                        Choisir ce Plan
                    </button>
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
                    <button class="cta-button" onclick="showAlert('Plan Pro', 30, 'Idéal pour les petites entreprises en expansion. Profitez de fonctionnalités supplémentaires pour votre équipe.')">
                        Choisir ce Plan
                    </button>
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
                    <button class="cta-button" onclick="showAlert('Plan Entreprise', 100, 'Conçu pour les grandes organisations. Gérez plusieurs sites avec des outils avancés.')">
                        Choisir ce Plan
                    </button>
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