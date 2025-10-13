<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos - FKBF KamerLink</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
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
                        <a href="{{route ('home')}}"
                            data-readdy="true" class="text-gray-600 hover:text-gray-900 whitespace-nowrap">Accueil</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 whitespace-nowrap">Offres</a>
                        <a href="#" class="px-4 py-2 bg-blue-100 text-primary rounded-button whitespace-nowrap">À
                            propos</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 whitespace-nowrap">Contact</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}"
                        class="text-gray-600 hover:text-gray-900 whitespace-nowrap !rounded-button">Connexion</a>
                    <a href="{{ route('decision') }}"
                        class="bg-primary text-white px-6 py-2 hover:bg-blue-600 whitespace-nowrap !rounded-button">S'inscrire</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="w-full">
        <section class="relative min-h-[500px] bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('images/images1.jpg') }}')">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/70 to-gray-900/30"></div>
            <div class="relative w-full px-6 py-24">
                <div class="max-w-7xl mx-auto text-center">
                    <h1 class="text-5xl font-bold text-white mb-6">À Propos de FKBF KamerLink</h1>
                    <p class="text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed">
                        Découvrez l'histoire, la mission et les valeurs qui font de FKBF KamerLink la première
                        plateforme d'emploi 100% camerounaise, connectant les talents aux opportunités à travers tout le
                        pays.
                    </p>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-4xl font-bold text-gray-900 mb-6">Notre Histoire</h2>
                            <div class="space-y-6 text-gray-600 leading-relaxed">
                                <p>
                                    Fondée en 2020 par une équipe de passionnés du digital camerounais, FKBF KamerLink
                                    est née d'un constat simple : le marché de l'emploi au Cameroun manquait d'une
                                    plateforme moderne, efficace et adaptée aux réalités locales.
                                </p>
                                <p>
                                    Partant de ce besoin, nous avons développé une solution innovante qui permet aux
                                    candidats de trouver facilement des opportunités d'emploi, de stage et de missions
                                    freelance, tout en aidant les entreprises à identifier les meilleurs talents du
                                    pays.
                                </p>
                                <p>
                                    Aujourd'hui, FKBF KamerLink est devenue la référence en matière de recrutement au
                                    Cameroun, avec plus de 15 000 utilisateurs actifs et 500 entreprises partenaires qui
                                    nous font confiance.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-2xl">
                        <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Étapes Clés</h3>
                        <div class="space-y-8">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold">1</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 mb-1">2020</div>
                                    <h4 class="font-semibold text-gray-900">Création de l'entreprise</h4>
                                    <p class="text-gray-600 text-sm">Lancement officiel de FKBF KamerLink avec une
                                        équipe de 5 personnes</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold">2</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 mb-1">2021</div>
                                    <h4 class="font-semibold text-gray-900">Première levée de fonds</h4>
                                    <p class="text-gray-600 text-sm">Obtention d'un financement de 500 millions FCFA
                                        pour le développement</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold">3</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 mb-1">2023</div>
                                    <h4 class="font-semibold text-gray-900">Expansion nationale</h4>
                                    <p class="text-gray-600 text-sm">Couverture de toutes les 10 régions du Cameroun</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold">4</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 mb-1">2024</div>
                                    <h4 class="font-semibold text-gray-900">Leader du marché</h4>
                                    <p class="text-gray-600 text-sm">Plus de 15 000 utilisateurs et 500 entreprises
                                        partenaires</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div class="bg-white p-10 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                            <i class="ri-target-line text-3xl text-primary"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Notre Mission</h3>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            Démocratiser l'accès à l'emploi au Cameroun en créant un pont efficace entre les talents
                            locaux et les opportunités professionnelles, tout en favorisant le développement économique
                            du pays.
                        </p>
                    </div>
                    <div class="bg-white p-10 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mb-6">
                            <i class="ri-eye-line text-3xl text-secondary"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Notre Vision</h3>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            Devenir la plateforme de référence en Afrique centrale pour l'emploi et la formation
                            professionnelle, en contribuant à l'émergence d'une économie numérique forte et inclusive.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Nos Valeurs</h2>
                    <p class="text-xl text-gray-600">Les principes qui guident notre action au quotidien</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center space-y-4">
                        <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                            <i class="ri-lightbulb-line text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Innovation</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Nous développons constamment de nouvelles solutions pour améliorer l'expérience utilisateur
                            et répondre aux besoins du marché.
                        </p>
                    </div>
                    <div class="text-center space-y-4">
                        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                            <i class="ri-shield-check-line text-3xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Intégrité</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            La transparence et l'honnêteté sont au cœur de toutes nos relations avec nos utilisateurs et
                            partenaires.
                        </p>
                    </div>
                    <div class="text-center space-y-4">
                        <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto">
                            <i class="ri-award-line text-3xl text-yellow-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Excellence</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Nous visons l'excellence dans tout ce que nous faisons, de la qualité de notre plateforme au
                            service client.
                        </p>
                    </div>
                    <div class="text-center space-y-4">
                        <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto">
                            <i class="ri-heart-line text-3xl text-pink-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Engagement</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Nous nous engageons pour le développement du Cameroun et l'épanouissement professionnel de
                            chaque utilisateur.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Notre Équipe Dirigeante</h2>
                    <p class="text-xl text-gray-600">Les visionnaires qui portent FKBF KamerLink vers l'excellence</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center">
                        <div class="w-32 h-32 bg-cover bg-center rounded-full mx-auto mb-6"
                            style="background-image: url('{{ asset('images/profil.jpg') }}')">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Foukeng Kemayou Bavel Franck</h3>
                        <p class="text-primary font-medium mb-4">Directeur Général</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Ingénieur en informatique avec 4 ans d'expérience dans le digital. Passionné par
                            l'innovation et le développement économique africain.
                        </p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center">
                        <div class="w-32 h-32 bg-cover bg-center rounded-full mx-auto mb-6"
                            style="background-image: url('{{ asset('images/images3.jpg') }}')">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Marie-Claire Nkomo</h3>
                        <p class="text-secondary font-medium mb-4">Directrice Technique</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Experte en développement logiciel et architecture cloud. Diplômée de l'École Polytechnique
                            de Yaoundé, elle supervise toute la partie technique.
                        </p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center">
                        <div class="w-32 h-32 bg-cover bg-center rounded-full mx-auto mb-6"
                            style="background-image: url('{{ asset('images/images2.jpg') }}')">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Paul Mbarga</h3>
                        <p class="text-yellow-600 font-medium mb-4">Directeur Marketing</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Spécialiste en marketing digital et stratégie de marque. 12 ans d'expérience dans la
                            promotion de produits tech en Afrique.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-primary">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-white mb-4">Nos Statistiques Clés</h2>
                    <p class="text-xl text-blue-100">Les chiffres qui témoignent de notre impact</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-user-line text-2xl text-white"></i>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2" id="users-count">0</div>
                        <p class="text-blue-100">Utilisateurs Actifs</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-briefcase-line text-2xl text-white"></i>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2" id="jobs-count">0</div>
                        <p class="text-blue-100">Offres Publiées</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-check-line text-2xl text-white"></i>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2" id="success-count">0</div>
                        <p class="text-blue-100">Taux de Réussite</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-building-line text-2xl text-white"></i>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2" id="companies-count">0</div>
                        <p class="text-blue-100">Entreprises Partenaires</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="space-y-8">
                        <h2 class="text-4xl font-bold text-gray-900">Notre Engagement pour le Marché de l'Emploi
                            Camerounais</h2>
                        <div class="space-y-6 text-gray-600 leading-relaxed">
                            <p>
                                Chez FKBF KamerLink, nous croyons fermement au potentiel extraordinaire du Cameroun et
                                de sa jeunesse. Notre engagement va au-delà de la simple mise en relation entre
                                candidats et employeurs.
                            </p>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-6 h-6 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <i class="ri-check-line text-white text-sm"></i>
                                    </div>
                                    <p>Promotion de l'emploi local et valorisation des compétences camerounaises</p>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-6 h-6 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <i class="ri-check-line text-white text-sm"></i>
                                    </div>
                                    <p>Accompagnement des jeunes diplômés dans leur insertion professionnelle</p>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <i class="ri-check-line text-white text-sm"></i>
                                    </div>
                                    <p>Soutien aux PME locales dans leurs processus de recrutement</p>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-6 h-6 bg-pink-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <i class="ri-check-line text-white text-sm"></i>
                                    </div>
                                    <p>Développement de programmes de formation adaptés au marché</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center lg:text-left">
                            <button
                                class="bg-primary text-white px-8 py-4 hover:bg-blue-600 whitespace-nowrap !rounded-button font-medium text-lg">
                                Rejoignez Notre Communauté
                            </button>
                        </div>
                    </div>
                    <div class="bg-cover bg-center rounded-2xl min-h-[400px]"
                        style="background-image: url('{{ asset('images/images4.jpg') }}')">
                    </div>
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

    <script id="counter-animation">
        document.addEventListener('DOMContentLoaded', function() {
            function animateCounter(element, target, suffix = '') {
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current).toLocaleString() + suffix;
                }, 20);
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(document.getElementById('users-count'), 15420);
                        animateCounter(document.getElementById('jobs-count'), 3250);
                        animateCounter(document.getElementById('success-count'), 87, '%');
                        animateCounter(document.getElementById('companies-count'), 520);
                        observer.disconnect();
                    }
                });
            });

            observer.observe(document.getElementById('users-count'));
        });
    </script>
</body>

</html>
