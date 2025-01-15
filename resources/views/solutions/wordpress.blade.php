<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress Solution</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="sticky top-0 bg-white shadow-md z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">Quentix</a>
            <nav class="space-x-6 flex items-center">
                <a href="#overview" class="text-gray-600 hover:text-blue-500 transition">Présentation</a>
                <a href="#features-pricing" class="text-gray-600 hover:text-blue-500 transition">Fonctionnalités & Tarifs</a>
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-500 transition">Retour</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-6 py-12 space-y-12">
        <!-- Overview Section -->
        <section id="overview" class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Solution WordPress</h1>
            <p class="text-gray-600 leading-relaxed">
                Avec notre solution WordPress, créez facilement un site web performant, esthétique et parfaitement adapté à vos besoins. 
                Que vous soyez un professionnel ou un particulier, cette solution vous permet de déployer votre site en quelques clics tout en conservant une personnalisation maximale.
            </p>
        </section>

        <!-- Features and Pricing Section -->
        <section id="features-pricing" class="bg-white shadow-md rounded-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Features -->
            <div class="bg-gray-100 shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Fonctionnalités</h2>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li>Installation en un clic pour un démarrage rapide.</li>
                    <li>Choix parmi des centaines de thèmes professionnels.</li>
                    <li>Extensions pour améliorer le SEO, la sécurité et les performances.</li>
                    <li>Interface simple et intuitive pour gérer vos contenus.</li>
                    <li>Support multilingue pour s'adapter à vos besoins internationaux.</li>
                </ul>
            </div>

            <!-- Pricing -->
            <div class="bg-gray-100 shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Tarifs</h2>
                <p class="text-gray-600 mb-4">Notre offre WordPress est simple et transparente :</p>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <p class="text-lg font-semibold text-gray-800 mb-2">10€/mois</p>
                    <p class="text-gray-600 mb-4">Inclus :</p>
                    <ul class="list-disc list-inside text-gray-600 ml-4">
                        <li>Hébergement sécurisé.</li>
                        <li>Certificat SSL gratuit.</li>
                        <li>Assistance technique 24/7.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="text-center">
            @auth
                <a href="{{ route('sites.create') }}" 
                   class="px-12 py-4 bg-blue-500 text-white text-lg font-bold rounded-lg shadow-md hover:bg-blue-600 transition">
                    Créer mon site WordPress
                </a>
            @else
                <button id="show-alert" class="px-12 py-4 bg-blue-500 text-white text-lg font-bold rounded-lg shadow-md hover:bg-blue-600 transition">
                    Créer mon site WordPress
                </button>
            @endauth
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6">
        <div class="container mx-auto px-6 text-center text-white">
            <p>&copy; 2025 Quentix. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- SweetAlert2 Script -->
    <script>
        document.getElementById('show-alert')?.addEventListener('click', function () {
            Swal.fire({
                title: 'Connectez-vous ou inscrivez-vous',
                text: "Veuillez vous connecter ou créer un compte pour accéder à cette fonctionnalité.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Connexion',
                cancelButtonText: 'Inscription',
                confirmButtonColor: '#2563eb',
                cancelButtonColor: '#6b7280',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = "{{ route('register') }}";
                }
            });
        });
    </script>
</body>
</html>