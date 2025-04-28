<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Quentix</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logoQuentixRoueSeulement.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <style>
        html, body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f9fafb; /* Keep light background */
            scroll-behavior: smooth;
        }
        .logo {
            height: 25px;
        }
        #maincontainer {
            /* Original desktop height behavior */
            height: 80svh;
            /* Flex properties for centering desktop form */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem; /* Default padding */
            flex-grow: 1; /* Allow filling space */
        }

        /* Desktop Header: Keep original 3-column layout */
        header .container {
             display: flex;
             align-items: center;
             height: 5rem; /* h-20 */
        }
         header .desktop-nav-left, header .desktop-nav-right, header .logo-container {
            width: 33.3333%; /* w-1/3 */
         }
         header .desktop-nav-left { justify-content: flex-start; }
         header .logo-container { justify-content: center; }
         header .desktop-nav-right { justify-content: flex-end; }

        /* Hide Mobile Burger Button by default */
        .mobile-burger-container { display: none; }

        /* Mobile Menu Styles (Hidden on Desktop) */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(107, 33, 168, 0.98);
            z-index: 100;
            display: none; /* Hidden by default */
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 60px;
        }
        .mobile-menu a {
            color: white;
            font-size: 1.25rem;
            padding: 1rem;
            text-decoration: none;
            display: block;
            width: 80%;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
         .mobile-menu a:last-of-type { border-bottom: none; }
        .mobile-menu a:hover { background-color: rgba(255, 255, 255, 0.1); }
        .mobile-menu-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            padding: 5px;
            line-height: 1;
        }

        /* Desktop Form Styles (Original) */
        #register-form-container {
            width: 100%;
            /* Original width restriction for desktop */
            /* md:w-1/4 applied via Tailwind below */
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 1.5rem; /* px-6 */
            padding-right: 1.5rem; /* px-6 */
        }
        #register-form {
             max-width: 24rem; /* max-w-sm */
             margin-left: auto;
             margin-right: auto;
             text-align: center;
        }
         #register-form .name-inputs-container {
            display: flex;
            gap: 1rem; /* space-x-4 */
            margin-bottom: 1rem; /* mb-4 */
         }
         #register-form .name-inputs-container input {
            width: 50%; /* w-1/2 */
         }
         #register-form input {
             /* Original desktop input styles */
             width: 100%;
             padding: 0.75rem 1rem; /* px-4 py-3 */
             border: 1px solid #d1d5db; /* border-gray-300 */
             border-radius: 0.375rem; /* rounded-md */
             font-size: 1.125rem; /* text-lg */
             outline: none;
         }
         #register-form input:focus {
              box-shadow: 0 0 0 2px #a855f7; /* focus:ring-2 focus:ring-purple-600 */
         }
         #register-form button {
             /* Original desktop button styles */
             width: 100%;
             background-color: #7e22ce; /* bg-purple-700 */
             color: white;
             font-size: 1.125rem; /* text-lg */
             font-weight: 600; /* font-semibold */
             padding: 0.75rem 0; /* py-3 */
             border-radius: 0.375rem; /* rounded-md */
             transition: background-color 0.15s ease-in-out;
         }
         #register-form button:hover {
             background-color: #6b21a8; /* hover:bg-purple-800 */
         }
         #register-form-container h1 {
             font-size: 3.75rem; /* text-6xl */
             font-weight: 200; /* font-extralight */
             text-align: center;
             color: #1f2937; /* text-gray-800 */
             margin-bottom: 1.5rem; /* mb-6 */
             padding-bottom: 2.75rem; /* pb-11 */
         }


        /* --- MOBILE REDESIGN --- */
        @media (max-width: 768px) {
            /* Mobile Header */
            header .container { justify-content: space-between; }
            header .desktop-nav-left,
            header .desktop-nav-right { display: none; }
            header .logo-container { width: auto; order: 2; flex-grow: 1; } /* Let logo center itself */
            header .mobile-burger-container {
                 display: flex;
                 justify-content: flex-start;
                 order: 1;
                 width: auto;
            }
            #mobile-menu-button { /* Style the burger icon itself */
                 padding: 0.5rem;
                 color: #374151;
            }

            /* Mobile Main Content & Form */
            #maincontainer {
                height: auto; /* Allow height to adjust */
                padding: 1.5rem 1rem;
                align-items: flex-start;
                padding-top: 4rem;
            }
            #register-form-container {
                width: 100%;
                max-width: none;
                padding: 0;
            }
            #register-form-container h1 {
                font-size: 2.25rem; /* Smaller title */
                margin-bottom: 2rem;
                padding-bottom: 1rem;
            }
            #register-form { width: 100%; max-width: none; } /* Form takes full width */
            #register-form input, #register-form button {
                font-size: 1rem; /* Smaller text */
            }

            /* Stack Name inputs on mobile */
            #register-form .name-inputs-container {
                flex-direction: column; /* Stack vertically */
                gap: 1rem; /* Keep gap */
            }
            #register-form .name-inputs-container input {
                width: 100%; /* Full width when stacked */
            }

            /* Adjust error messages position slightly if needed */
            .fixed.bottom-4.right-4 {
                 bottom: 1rem;
                 right: 1rem;
                 left: 1rem; /* Allow full width if needed */
                 max-width: calc(100% - 2rem); /* Prevent overflow */
            }
        }
    </style>
</head>
<body>

    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 sm:px-6"> {{-- Use Tailwind container padding --}}

            <div class="desktop-nav-left flex items-center"> {{-- Kept desktop structure --}}
                <nav class="space-x-4 lg:space-x-6 flex items-center">
                    <a href="/#features" class="text-sm lg:text-base text-gray-600 hover:text-purple-700 transition">Services</a>
                    <a href="/#about" class="text-sm lg:text-base text-gray-600 hover:text-purple-700 transition">À propos</a>
                    <a href="/#contact" class="text-sm lg:text-base text-gray-600 hover:text-purple-700 transition">Contacter nous</a>
                    <a href="{{ route('subscriptions.index') }}" class="text-sm lg:text-base text-gray-600 hover:text-purple-700 transition">Abonnement</a>
                </nav>
            </div>

            <div class="mobile-burger-container"> {{-- Mobile only container --}}
                 <button id="mobile-menu-button" aria-label="Open Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                 </button>
            </div>

            <div class="logo-container flex items-center"> {{-- Kept desktop structure --}}
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logoQuentixsansRouNoir.svg') }}" alt="Quentix Logo" class="logo">
                </a>
            </div>

            <div class="desktop-nav-right flex items-center"> {{-- Kept desktop structure --}}
                <nav class="space-x-4 lg:space-x-6 flex items-center">
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-purple-700 border border-purple-700 rounded-lg hover:bg-purple-100 transition">
                        Connexion
                    </a>
                    <a href="/#quick-tutorial" class="px-4 lg:px-6 py-2 text-sm font-semibold text-white bg-purple-700 border border-purple-700 rounded-lg hover:bg-purple-800 transition">
                        Tutoriel →
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <div id="mobile-menu" class="mobile-menu">
         <button class="mobile-menu-close" id="mobile-menu-close-button" aria-label="Close Menu">×</button>
         <a href="/#features">Services</a>
         <a href="/#about">À propos</a>
         <a href="/#contact">Contacter nous</a>
         <a href="{{ route('subscriptions.index') }}">Abonnement</a>
         <a href="{{ route('login') }}">Connexion</a>
         <a href="/#quick-tutorial">Tutoriel →</a>
    </div>


    <div id="maincontainer" class="relative bg-white w-full"> {{-- Removed explicit flex from here --}}
        <div id="register-form-container" class="w-full md:w-1/3 lg:w-1/4"> {{-- Use Tailwind for desktop width --}}
            <h1>Rejoignez-nous</h1> {{-- Removed Tailwind classes, handled in CSS --}}
            <form id="register-form" action="{{ route('register.post') }}" method="POST"> {{-- Removed Tailwind classes --}}
                @csrf

                <div class="name-inputs-container"> {{-- Specific container for names --}}
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required placeholder="Nom">
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required placeholder="Prénom">
                </div>

                <div class="mb-4">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                </div>

                <div class="mb-4">
                    <input type="password" id="password" name="password" required placeholder="Mot de passe">
                </div>

                <div class="mb-6">
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirmation mot de passe">
                </div>

                <button type="submit">Créer mon compte →</button>

                 <p class="mt-4 text-sm text-gray-600">
                    Déjà un compte ?<a href="{{ route('login') }}" class="text-purple-700 font-semibold hover:underline"> Connectez-vous →</a>
                </p>
            </form>
        </div>
    </div>

    <div class="fixed bottom-4 right-4 space-y-3 z-50">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative shadow-lg" role="alert">
                <strong class="font-bold">Oups !</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow-lg" role="alert">
                <strong class="font-bold">Succès !</strong>
                <span class="block sm:inline mt-1 sm:mt-0">{{ session('success') }}</span>
            </div>
        @endif
    </div>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuCloseButton = document.getElementById('mobile-menu-close-button');
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');

        function openMenu() { mobileMenu.style.display = "flex"; }
        function closeMenu() { mobileMenu.style.display = "none"; }

        mobileMenuButton.addEventListener('click', openMenu);
        mobileMenuCloseButton.addEventListener('click', closeMenu);
        mobileMenuLinks.forEach(link => link.addEventListener('click', closeMenu));
    </script>
</body>
</html>