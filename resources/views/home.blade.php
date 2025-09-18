<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKBF KamerLink - Trouvez Votre Prochaine Opportunité Au Cameroun</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#10B981'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }
    </style>
</head>
<body class="bg-white">
    <header class="w-full bg-white border-b border-gray-100 sticky top-0 z-50">
        <nav class="w-full px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <div class="flex items-center justify-center font-['Pacifico'] text-2xl text-primary">
                        <img src="{{asset('images/logo.png')}}" alt="" class="w-20 h-20 rounded-full object-cover">
                        FKBF KamerLink
                    </div>
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('home') }}" class="px-4 py-2 bg-blue-100 text-primary rounded-button whitespace-nowrap">Accueil</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 whitespace-nowrap">Offres</a>
                        <a href="{{ route('a-propos') }}" class="text-gray-600 hover:text-gray-900 whitespace-nowrap">À propos</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 whitespace-nowrap">Contact</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 whitespace-nowrap !rounded-button">Connexion</a>
                    <a href="{{route('decision')}}" class="bg-primary text-white px-6 py-2 hover:bg-blue-600 whitespace-nowrap !rounded-button">S'inscrire</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="w-full">
        <section class="relative min-h-[600px] bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/home.jpg') }}');">
            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 to-transparent"></div>
            <div class="relative w-full px-6 py-20">
                <div class="max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="space-y-8">
                            <div class="space-y-4">
                                <h1 class="text-5xl font-bold text-gray-900 leading-tight">
                                    Trouver Votre<br>
                                    Prochaine<br>
                                    <span class="text-primary">Opportunité</span> Au<br>
                                    Cameroun
                                </h1>
                                <p class="text-xl text-gray-600 leading-relaxed">
                                    Connectez-vous aux meilleures offres d'emploi, stages et<br>
                                    missions freelance. Votre carrière commence ici, au cœur de<br>
                                    l'Afrique.
                                </p>
                            </div>
                            
                            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <div class="flex-1 relative">
                                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center">
                                            <i class="ri-briefcase-line text-gray-400"></i>
                                        </div>
                                        <input type="text" placeholder="Métier" class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    </div>
                                    <div class="flex-1 relative">
                                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center">
                                            <i class="ri-map-pin-line text-gray-400"></i>
                                        </div>
                                        <input type="text" placeholder="Ville, Région" class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    </div>
                                    <button class="bg-secondary text-white px-8 py-3 hover:bg-green-600 whitespace-nowrap !rounded-button font-medium">
                                        Recherche
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="relative">
                            <div class="absolute top-4 right-4 bg-white px-4 py-2 rounded-lg shadow-lg flex items-center space-x-2">
                                <div class="w-3 h-3 flex items-center justify-center">
                                    <i class="ri-user-line text-secondary text-xs"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700">2500+</span>
                                <span class="text-xs text-gray-500">Candidats Recrutés</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Pour qui ?</h2>
                    <p class="text-xl text-gray-600">Une plateforme adaptée à tous les profils</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="ri-user-line text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Candidats</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Trouvez l'emploi de vos rêves parmi des milliers d'offres
                        </p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="ri-computer-line text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Freelance</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Décrochez des missions qui correspondent à vos compétences
                        </p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="ri-building-line text-2xl text-yellow-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Entreprise</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Recrutez les meilleurs talents au Cameroun
                        </p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                        <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="ri-graduation-cap-line text-2xl text-pink-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Formateur</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Partagez votre expertise et formez la nouvelle génération
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <a href="{{ route('register.candidat.create') }}" class="bg-gray-50 p-12 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="flex items-start space-x-6">
                            <div class="w-16 h-16 bg-gray-900 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="ri-user-line text-2xl text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">
                                    Je suis candidat ou freelance<br>
                                    je cherche une opportunité
                                </h3>
                                <p class="text-gray-600">
                                    Accédez à des milliers d'offres d'emploi et de missions freelance adaptées à votre profil
                                </p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="{{ route('register.entreprise.create') }}" class="bg-gray-50 p-12 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="flex items-start space-x-6">
                            <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="ri-building-line text-2xl text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">
                                    Je suis une organisation à<br>
                                    la recherche de profils ou<br>
                                    je propose des formations
                                </h3>
                                <p class="text-gray-600">
                                    Trouvez les talents qu'il vous faut et proposez des formations de qualité
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-20 bg-primary">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <div class="flex justify-center mb-8">
                    <div class="flex space-x-1">
                        <i class="ri-star-fill text-3xl text-yellow-400"></i>
                        <i class="ri-star-fill text-3xl text-yellow-400"></i>
                        <i class="ri-star-fill text-3xl text-yellow-400"></i>
                        <i class="ri-star-fill text-3xl text-yellow-400"></i>
                        <i class="ri-star-fill text-3xl text-yellow-400"></i>
                    </div>
                </div>
                <blockquote class="text-2xl text-white font-medium leading-relaxed">
                    "Grâce à FKBF KamerLink, j'ai trouvé mon emploi de rêve en moins de 3 semaines. La plateforme est intuitive et les offres sont de qualité."
                </blockquote>
                <div class="mt-8">
                    <cite class="text-blue-100 text-lg">Marie Ngono, Développeuse Web</cite>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <div class="space-y-6">
                    <div class=" flex items-center justify-center gap-6 font-['Pacifico'] text-2xl text-primary">
                        <img src="{{asset('images/logo.png')}}" alt="" class="w-10 h-10 rounded-full object-cover bg-white">
                        FKBF KamerLink
                    </div>
                    <p class="text-gray-300 leading-relaxed">
                        La première plateforme d'emploi 100 % camerounaise. Connectons les talents aux opportunités.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6">Candidats</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Rechercher un emploi</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Créer un CV</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Conseils carrière</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Formations</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6">Entreprises</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Publier une Offres</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Solution RH</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Tarif</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6">Liens utiles</h4>
                    <ul class="space-y-3">
                        <li><a href="" class="text-gray-300 hover:text-white transition-colors">Nos Offres</a></li>
                        <li><a href="{{route ('a-propos')}}" class="text-gray-300 hover:text-white transition-colors">À propos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Nous Contacter</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400">2025 FKBF KamerLink. Tous droits Réservés</p>
            </div>
        </div>
    </footer>

    <script id="user-selection">
        document.addEventListener('DOMContentLoaded', function() {
            const selectionCards = document.querySelectorAll('.cursor-pointer');
            
            selectionCards.forEach(card => {
                card.addEventListener('click', function() {
                    selectionCards.forEach(c => c.classList.remove('ring-2', 'ring-primary'));
                    this.classList.add('ring-2', 'ring-primary');
                });
            });
        });
    </script>
</body>
</html>