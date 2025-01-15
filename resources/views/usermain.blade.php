<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Tableau de Bord</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Inclure Tailwind CSS --}}
    <style>
        .help-tab {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #2563eb;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 10px 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            z-index: 50;
        }

        .help-tab:hover {
            background-color: #1e40af;
        }

        .add-card {
            width: 150px;
            height: 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px dashed #94a3b8; /* Tailwind color for gray-400 */
            border-radius: 12px; /* Slightly larger for rounded corners */
            background-color: #f1f5f9; /* Tailwind color for gray-50 */
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .add-card:hover {
            background-color: #e2e8f0; /* Tailwind color for gray-100 */
        }

        .add-card svg {
            width: 50px; /* Slightly larger icon */
            height: 50px;
            color: #2563eb; /* Tailwind color for blue-500 */
        }

        .add-card span {
            margin-top: 10px;
            font-size: 16px; /* Tailwind text-base */
            font-weight: 600; /* Tailwind font-semibold */
            color: #2563eb;
        }

        .add-card-message {
            font-size: 14px; /* Tailwind text-sm */
            color: #64748b; /* Tailwind gray-500 */
            text-align: center;
            margin-top: 6px;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="sticky top-0 bg-white shadow-md z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">Quentix</a>
            <nav class="space-x-6 flex items-center">
                <a href="#profile" class="text-gray-600 hover:text-blue-500 transition">Mon Profil</a>
                <a href="#solutions" class="text-gray-600 hover:text-blue-500 transition">Mes Solutions</a>
                <a href="#subscription" class="text-gray-600 hover:text-blue-500 transition">Mon Abonnement</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                            class="px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-lg shadow-md hover:bg-red-600 transition">
                        Déconnexion
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 flex-grow space-y-12">
        <!-- User Information Section -->
        <section id="profile" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Mes Informations</h2>
            <div class="text-gray-700">
                <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                <p><strong>Date d'inscription :</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
            </div>
        </section>

        <!-- Current Subscription Section -->
        <section id="subscription" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Mon Abonnement</h2>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('subscriptions.index') }}" class="add-card">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Voir les abonnements</span>
                    @unless($subscription)
                        <div class="add-card-message">Vous n'avez pas d'abonnement actif.</div>
                    @endunless
                </a>
                @if($subscription)
                    <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                        <p><strong>Type d'abonnement :</strong> {{ $subscription->plan_name }}</p>
                        <p><strong>Prix :</strong> {{ $subscription->price }}€ / mois</p>
                        <p><strong>Date de renouvellement :</strong> {{ $subscription->renewal_date->format('d/m/Y') }}</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Deployed Solutions Section -->
        <section id="solutions" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Mes Solutions Déployées</h2>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('solutions.wordpress') }}" class="add-card">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Ajouter une solution</span>
                    @if(!isset($solutions) || !$solutions->count())
                        <div class="add-card-message">Aucune solution déployée.</div>
                    @endif
                </a>
                @if(isset($solutions) && $solutions->count())
                    @foreach($solutions as $solution)
                        <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                            <p><strong>Nom :</strong> {{ $solution->name }}</p>
                            <p><strong>Domaine :</strong> {{ $solution->domain }}</p>
                            <p><strong>Status :</strong>
                                <span class="px-2 py-1 text-xs font-semibold text-white rounded-lg {{ $solution->status === 'Actif' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $solution->status }}
                                </span>
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </main>

    <!-- Help Tab -->
    <div class="help-tab">
        Besoin d'aide ?
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6">
        <div class="container mx-auto px-6 text-center text-white">
            <p>&copy; 2025 Quentix. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>