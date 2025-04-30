<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress - Quentix</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logoQuentixRoueSeulement.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        html, body {
            scroll-behavior: smooth;
            min-height: 100vh; /* Use min-height */
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #6B21A8, #EDE9FE);
            display: flex; /* Added */
            flex-direction: column; /* Added */
        }
        .logo {
            height: 25px;
        }
        main {
            flex-grow: 1; /* Ensure main takes up space */
        }
        .hero {
            text-align: center;
            color: white;
            padding: 60px 20px; /* Adjusted padding */
        }
        #containerCard {
            /* Removed fixed width */
            width: 100%;
            max-width: 1200px; /* Keep max-width for desktop */
        }
        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%; /* Make cards fill grid height */
            display: flex; /* Use flex for content alignment */
            flex-direction: column; /* Stack content vertically */
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .btn-primary {
            background: #6B21A8;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s ease;
            text-decoration: none; /* Ensure links look like buttons */
            display: inline-block; /* Correct display */
            text-align: center;
        }
        .btn-primary:hover {
            background: #5A1A91;
        }
        .price-box {
            background: #EDE9FE;
            padding: 16px;
            border-radius: 12px;
            text-align: center;
        }

        /* Mobile Menu Styles */
        .mobile-menu {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(107, 33, 168, 0.98); z-index: 100;
            display: none; flex-direction: column; align-items: center;
            justify-content: center; padding-top: 60px;
        }
        .mobile-menu a, .mobile-menu form button {
            color: white; font-size: 1.25rem; padding: 1rem;
            text-decoration: none; display: block; width: 80%;
            text-align: center; border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
         .mobile-menu a:last-of-type { border-bottom: none; }
         .mobile-menu form { width: 80%; margin-top: 1rem; }
         .mobile-menu form button {
             background: none; border: none; cursor: pointer;
             font-family: inherit; padding: 1rem; /* Match link padding */
             width: 100%; border-bottom: 1px solid rgba(255, 255, 255, 0.2);
         }
        .mobile-menu a:hover, .mobile-menu form button:hover {
            background-color: rgba(255, 255, 255, 0.1); color: #ccc;
        }
        .mobile-menu-close {
            position: absolute; top: 20px; right: 20px; background: none;
            border: none; color: white; font-size: 2rem; cursor: pointer;
            padding: 5px; line-height: 1;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero { padding: 40px 20px; }
            .hero h1 { font-size: 2.5rem; } /* text-4xl */
            .hero p { font-size: 1.125rem; } /* text-lg */

            #containerCard { padding: 20px 15px; /* Reduced padding */ }

            .card { padding: 15px; }
             .card h2 { font-size: 1.5rem; } /* text-2xl */

             #features-pricing { grid-template-columns: 1fr; /* Stack columns */ }

             /* Header Mobile */
            header .container { justify-content: space-between; }
            header .desktop-nav-left, header .desktop-nav-right { display: none; }
            header .mobile-burger-container { display: flex; }
            header .logo-container { width: auto; flex-grow: 1; } /* Center logo */

             .testimonial-card { min-height: auto; /* Adjust height */ }
        }
    </style>
</head>
<body class="flex flex-col">
    <header class="sticky top-0 z-50 bg-purple-800 bg-opacity-80 backdrop-blur-sm">
        <div class="container mx-auto px-4 sm:px-6 py-3 flex items-center h-16 md:h-20">
            <div class="hidden md:flex w-1/3 justify-start desktop-nav-left">
                <nav class="space-x-4 lg:space-x-6 flex items-center">
                    <a href="/#features" class="text-sm lg:text-base text-white hover:text-purple-300 transition">Services</a>
                    <a href="/#about" class="text-sm lg:text-base text-white hover:text-purple-300 transition">À propos</a>
                    <a href="/#contact" class="text-sm lg:text-base text-white hover:text-purple-300 transition">Contacter nous</a>
                    <a href="{{ route('subscriptions.index') }}" class="text-sm lg:text-base text-white hover:text-purple-300 transition">Abonnement</a>
                </nav>
            </div>
            <div class="flex md:hidden w-1/3 justify-start mobile-burger-container">
                 <button id="mobile-menu-button" class="text-white focus:outline-none p-2" aria-label="Open Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                 </button>
            </div>
            <div class="w-1/3 flex justify-center logo-container">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logoQuentixSansRoueBlanc.svg') }}" alt="Quentix Logo" class="logo">
                </a>
            </div>
            <div class="hidden md:flex w-1/3 justify-end desktop-nav-right">
                <nav class="space-x-4 lg:space-x-6 flex items-center">
                    @auth
                        <a href="{{ route('user.space') }}" class="px-4 py-2 text-sm font-semibold text-white rounded-lg border border-transparent hover:border-white transition">
                            Mon Espace
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 transition">
                                Déconnexion
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-white border border-transparent rounded-lg hover:border-white transition">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" class="px-4 lg:px-6 py-2 text-sm font-semibold text-purple-700 bg-white border border-white rounded-lg hover:bg-purple-100 hover:text-purple-800 transition">
                            Inscription →
                        </a>
                    @endauth
                </nav>
            </div>
             <div class="flex md:hidden w-1/3 justify-end"></div>
        </div>
    </header>

    <div id="mobile-menu" class="mobile-menu">
        <button class="mobile-menu-close" id="mobile-menu-close-button" aria-label="Close Menu">×</button>
        <a href="/#features">Services</a>
        <a href="/#about">À propos</a>
        <a href="/#contact">Contacter nous</a>
        <a href="{{ route('subscriptions.index') }}">Abonnement</a>
        @auth
            <a href="{{ route('user.space') }}">Mon Espace</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="hover:text-red-500">Déconnexion</button>
            </form>
        @else
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Inscription →</a>
        @endauth
    </div>

    <div class="hero">
        <h1 class="text-4xl md:text-5xl font-bold">Solution WordPress 🚀</h1>
        <p class="text-lg mt-4">Créez et hébergez votre site WordPress en quelques clics.</p>
    </div>

    <main id="containerCard" class="container px-4 sm:px-6 py-8 md:py-12 space-y-8 md:space-y-12">
        <section id="overview" class="card">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Pourquoi WordPress avec Quentix ?</h2>
            <p class="text-gray-600 leading-relaxed">
                Notre solution WordPress vous permet de lancer un site moderne, sécurisé et rapide sans effort. Que vous soyez un professionnel ou un particulier, nous simplifions le processus pour que vous puissiez vous concentrer sur votre contenu.
            </p>
        </section>

        <section id="features-pricing" class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <div class="card">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-4">🔹 Fonctionnalités Clés</h2>
                <ul class="text-gray-600 space-y-2 md:space-y-3 flex-grow">
                    <li>✅ Installation en un clic</li>
                    <li>✅ Accès à des milliers de thèmes</li>
                    <li>✅ Optimisation SEO & Sécurité</li>
                    <li>✅ Interface intuitive</li>
                    <li>✅ Support multilingue</li>
                </ul>
            </div>

            <div x-data="{
                testimonials: [
                    { name: 'Alexandre Dupont', city: 'Paris', role: 'Entrepreneur', review: '“Une plateforme exceptionnelle ! J\'ai pu créer mon site en quelques minutes. Recommandé à 100% !”', img: 'https://randomuser.me/api/portraits/men/45.jpg', rating: 5 },
                    { name: 'Sophie Martin', city: 'Lyon', role: 'Freelance', review: '“Simple, rapide et efficace. Un vrai game-changer !”', img: 'https://randomuser.me/api/portraits/women/65.jpg', rating: 5 },
                    { name: 'J-B Leroy', city: 'Bordeaux', role: 'CEO', review: '“L\'outil idéal. Hébergement ultra rapide et gestion simplifiée.”', img: 'https://randomuser.me/api/portraits/men/32.jpg', rating: 5 },
                    { name: 'Marie Dubois', city: 'Marseille', role: 'Designer', review: '“Templates magnifiques et personnalisables ! Je recommande.”', img: 'https://randomuser.me/api/portraits/women/45.jpg', rating: 5 }
                ],
                currentTestimonial: 0,
                next() { this.currentTestimonial = (this.currentTestimonial + 1) % this.testimonials.length; },
                prev() { this.currentTestimonial = (this.currentTestimonial - 1 + this.testimonials.length) % this.testimonials.length; },
                interval: null,
                autoSlide() { this.interval = setInterval(() => { this.next(); }, 5000); },
                stopSlide() { clearInterval(this.interval); }
            }"
            x-init="autoSlide()" @mouseenter="stopSlide()" @mouseleave="autoSlide()"
            class="relative card testimonial-card w-full mx-auto">
                <div class="flex-grow">
                    <div class="flex items-center space-x-3 mb-3">
                        <img :src="testimonials[currentTestimonial].img" alt="Client" class="w-10 h-10 rounded-full">
                        <div>
                            <h3 class="text-base font-semibold text-gray-800" x-text="testimonials[currentTestimonial].name"></h3>
                            <p class="text-xs text-gray-500" x-text="testimonials[currentTestimonial].role + ', ' + testimonials[currentTestimonial].city"></p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic text-sm" x-text="testimonials[currentTestimonial].review"></p>
                </div>
                <div class="flex items-center mt-4">
                    <template x-for="i in testimonials[currentTestimonial].rating">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 15.27L15.18 18l-1.64-5.03L18 9.24l-5.19-.45L10 4l-2.81 4.79L2 9.24l4.46 3.73L4.82 18z"/>
                        </svg>
                    </template>
                    <span class="ml-2 text-gray-500 text-xs" x-text="testimonials[currentTestimonial].rating + '/5'"></span>
                </div>
                <button @click="prev()" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 rounded-full p-1 text-gray-600 hover:text-purple-700 focus:outline-none">
                   <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="next()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 rounded-full p-1 text-gray-600 hover:text-purple-700 focus:outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </section>

        <section class="text-center pt-4">
            @auth
                <a href="{{ route('sites.create') }}" class="btn-primary text-base md:text-lg">
                    🚀 Créer mon site WordPress
                </a>
            @else
                <button id="show-alert" class="btn-primary text-base md:text-lg">
                    🚀 Créer mon site WordPress
                </button>
            @endauth
        </section>
    </main>

    <footer class="bg-purple-800 py-4 mt-12">
        <div class="container mx-auto px-6 text-center text-gray-300 text-xs">
            <p>© {{ date('Y') }} Quentix. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // Mobile Menu Logic
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuCloseButton = document.getElementById('mobile-menu-close-button');
        const mobileMenuElements = mobileMenu.querySelectorAll('a, button');

        function openMenu() {
            if (mobileMenu) mobileMenu.style.display = "flex";
        }
        function closeMenu() {
            if (mobileMenu) mobileMenu.style.display = "none";
        }

        if (mobileMenuButton && mobileMenu && mobileMenuCloseButton) {
            mobileMenuButton.addEventListener('click', openMenu);
            mobileMenuCloseButton.addEventListener('click', closeMenu);
            mobileMenuElements.forEach(el => {
                if (el.id !== 'mobile-menu-close-button') {
                    el.addEventListener('click', () => {
                        if (el.tagName === 'A' || el.tagName === 'BUTTON') {
                           closeMenu();
                        }
                    });
                }
            });
        }

        // SweetAlert for non-authenticated users
        const showAlertButton = document.getElementById('show-alert');
        if (showAlertButton) {
            showAlertButton.addEventListener('click', function() {
                Swal.fire({
                  title: 'Connexion requise',
                  text: "Vous devez être connecté pour créer un site.",
                  icon: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#6B21A8',
                  cancelButtonColor: '#6b7280',
                  confirmButtonText: 'Se connecter',
                  cancelButtonText: 'Annuler'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}"; // Redirect to login
                  }
                })
            });
        }
    </script>
</body>
</html>