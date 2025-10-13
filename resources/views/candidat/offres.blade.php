@extends('candidat.layouts.app')

@section('title', 'Profil Candidat')

@section('content')
    <div class="flex-1 m-5">
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                Offres D'emplois
            </h1>
            <p class="text-gray-600">
                Découvrez les meilleures opportunités d'emploi au Cameroun
            </p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Total Offres</p>
                        <p class="text-3xl font-bold text-gray-800">1,247</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined  text-blue-600">business_center</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Nouvelles Offres</p>
                        <p class="text-3xl font-bold text-green-600">89</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined  text-green-600">add_circle</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Entreprises</p>
                        <p class="text-3xl font-bold text-purple-600">156</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-purple-600">source_environment</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">
                            Offres Sauvegardées
                        </p>
                        <p class="text-3xl font-bold text-orange-600">23</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-orange-600">bookmark</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-800">
                    Filtres de Recherche
                </h2>
                <button id="resetFilters" class="text-sm text-gray-500 hover:text-gray-700 flex items-center space-x-1">
                    <span class="material-symbols-outlined">cached</span>
                    <span>Réinitialiser</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Secteur Filter -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Secteur d'activité</label>
                    <button id="sectorDropdown"
                        class="w-full px-4 py-2 text-left bg-gray-50 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-between">
                        <span class="text-sm text-gray-700">Tous les secteurs</span>
                        <span class="material-symbols-outlined text-gray-400">keyboard_arrow_down</span>
                    </button>
                    <div id="sectorMenu" class="dropdown-menu w-full">
                        <div class="p-2 space-y-1">
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-sector="all">
                                Tous les secteurs
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-sector="technologie">
                                Technologie
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-sector="finance">
                                Finance
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-sector="sante">
                                Santé
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-sector="education">
                                Éducation
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-sector="commerce">
                                Commerce
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Contract Type Filter -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Type de contrat</label>
                    <button id="contractDropdown"
                        class="w-full px-4 py-2 text-left bg-gray-50 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-between">
                        <span class="text-sm text-gray-700">Tous les contrats</span>
                        <span class="material-symbols-outlined text-gray-400">keyboard_arrow_down</span>
                    </button>
                    <div id="contractMenu" class="dropdown-menu w-full">
                        <div class="p-2 space-y-1">
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-contract="all">
                                Tous les contrats
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-contract="cdi">
                                CDI
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-contract="cdd">
                                CDD
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-contract="stage">
                                Stage
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-contract="freelance">
                                Freelance
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Location Filter -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                    <button id="locationDropdown"
                        class="w-full px-4 py-2 text-left bg-gray-50 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-between">
                        <span class="text-sm text-gray-700">Toutes les villes</span>
                        <span class="material-symbols-outlined text-gray-400">keyboard_arrow_down</span>
                    </button>
                    <div id="locationMenu" class="dropdown-menu w-full">
                        <div class="p-2 space-y-1">
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-location="all">
                                Toutes les villes
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-location="yaounde">
                                Yaoundé
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-location="douala">
                                Douala
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-location="bafoussam">
                                Bafoussam
                            </button>
                            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded"
                                data-location="bamenda">
                                Bamenda
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Salary Range -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Fourchette de salaire</label>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <input type="range" id="salaryRange" min="0" max="2000000" value="500000"
                                class="flex-1 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" />
                        </div>
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <span>0 FCFA</span>
                            <span id="salaryValue" class="font-medium text-primary">500,000 FCFA</span>
                            <span>2M+ FCFA</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sort and View Options -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-700">Trier par :</span>
                    <div class="flex items-center space-x-2">
                        <button class="sort-btn px-3 py-1 text-sm bg-[#3B82F6] text-white rounded-full" data-sort="date">
                            Date
                        </button>
                        <button class="sort-btn px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200"
                            data-sort="salary">
                            Salaire
                        </button>
                        <button class="sort-btn px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200"
                            data-sort="relevance">
                            Pertinence
                        </button>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-sm text-gray-600">1,247 offres trouvées</span>
                    <div class="flex items-center space-x-2">
                        <button id="gridView" class="p-2 text-[#3B82F6] bg-blue-50 rounded-lg">
                            <span class="material-symbols-outlined text-[16px]">grid_on</span>
                        </button>
                        <button id="listView" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg">
                            <span class="material-symbols-outlined text-[16px]">lists</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jobs Grid -->
        <div id="jobsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Job Card 1 -->
            <div class="job-card bg-white rounded-xl shadow-sm border border-gray-200 p-6" data-sector="technologie"
                data-contract="cdi" data-location="yaounde" data-salary="850000">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="text-lg font-bold text-blue-600">IC</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">
                                Développeur Full Stack
                            </h3>
                            <p class="text-sm text-gray-600">Innov Cameroun</p>
                        </div>
                    </div>
                    <button class="bookmark-btn p-2 text-gray-400 hover:text-red-500">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                </div>
                <div class="space-y-3 mb-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">location_on</span>
                        <span>Yaoundé, Cameroun</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">business_center</span>
                        <span>CDI • Temps plein</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">euro</span>
                        <span>750,000 - 950,000 FCFA/mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">schedule</span>
                        <span>Publié il y a 2 jours</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">React</span>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Node.js</span>
                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">MongoDB</span>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="flex-1 bg-[#3B82F6] text-white py-2 px-4 rounded-[6px] text-sm font-medium hover:bg-blue-600 whitespace-nowrap">
                        Postuler maintenant
                    </button>
                    <span class="material-symbols-outlined">visibility</span>
                </div>
            </div>

            <!-- Job Card 2 -->
            <div class="job-card bg-white rounded-xl shadow-sm border border-gray-200 p-6" data-sector="finance"
                data-contract="cdi" data-location="douala" data-salary="1200000">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="text-lg font-bold text-green-600">BC</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">
                                Analyste Financier Senior
                            </h3>
                            <p class="text-sm text-gray-600">Banque Camerounaise</p>
                        </div>
                    </div>
                    <button class="bookmark-btn p-2 text-gray-400 hover:text-red-500">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                </div>
                <div class="space-y-3 mb-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">location_on</span>
                        <span>Douala, Cameroun</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">business_center</span>
                        <span>CDI • Temps plein</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">euro</span>
                        <span>1,000,000 - 1,400,000 FCFA/mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">schedule</span>
                        <span>Publié il y a 1 jour</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Excel</span>
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">SAP</span>
                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Urgent</span>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="flex-1 bg-[#3B82F6] text-white py-2 px-4 rounded-[6px] text-sm font-medium hover:bg-blue-600 whitespace-nowrap">
                        Postuler maintenant
                    </button>
                    <span class="material-symbols-outlined">visibility</span>
                </div>
            </div>

            <!-- Job Card 3 -->
            <div class="job-card bg-white rounded-xl shadow-sm border border-gray-200 p-6" data-sector="sante"
                data-contract="cdd" data-location="yaounde" data-salary="650000">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <span class="text-lg font-bold text-red-600">HC</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">
                                Infirmier Spécialisé
                            </h3>
                            <p class="text-sm text-gray-600">Hôpital Central</p>
                        </div>
                    </div>
                    <button class="bookmark-btn p-2 text-red-500">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                </div>
                <div class="space-y-3 mb-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">location_on</span>
                        <span>Yaoundé, Cameroun</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">business_center</span>
                        <span>CDD • 12 mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">euro</span>
                        <span>550,000 - 750,000 FCFA/mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">schedule</span>
                        <span>Publié il y a 3 jours</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Soins intensifs</span>
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Urgences</span>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="flex-1 bg-[#3B82F6] text-white py-2 px-4 rounded-[6px] text-sm font-medium hover:bg-blue-600 whitespace-nowrap">
                        Postuler maintenant
                    </button>
                    <span class="material-symbols-outlined">visibility</span>
                </div>
            </div>

            <!-- Job Card 4 -->
            <div class="job-card bg-white rounded-xl shadow-sm border border-gray-200 p-6" data-sector="education"
                data-contract="stage" data-location="bafoussam" data-salary="200000">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="text-lg font-bold text-purple-600">UC</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">
                                Stagiaire Marketing Digital
                            </h3>
                            <p class="text-sm text-gray-600">
                                Université Catholique
                            </p>
                        </div>
                    </div>
                    <button class="bookmark-btn p-2 text-gray-400 hover:text-red-500">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                </div>
                <div class="space-y-3 mb-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">location_on</span>
                        <span>Bafoussam, Cameroun</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">business_center</span>
                        <span>Stage • 6 mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">euro</span>
                        <span>150,000 - 250,000 FCFA/mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">schedule</span>
                        <span>Publié il y a 5 jours</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 bg-pink-100 text-pink-800 text-xs rounded-full">Junior</span>
                    <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs rounded-full">Social Media</span>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Google Ads</span>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="flex-1 bg-[#3B82F6] text-white py-2 px-4 rounded-[6px] text-sm font-medium hover:bg-blue-600 whitespace-nowrap">
                        Postuler maintenant
                    </button>
                    <span class="material-symbols-outlined">visibility</span>
                </div>
            </div>

            <!-- Job Card 5 -->
            <div class="job-card bg-white rounded-xl shadow-sm border border-gray-200 p-6" data-sector="commerce"
                data-contract="cdi" data-location="douala" data-salary="900000">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <span class="text-lg font-bold text-orange-600">SC</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">
                                Chef des Ventes
                            </h3>
                            <p class="text-sm text-gray-600">Société Commerciale</p>
                        </div>
                    </div>
                    <button class="bookmark-btn p-2 text-gray-400 hover:text-red-500">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                </div>
                <div class="space-y-3 mb-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">location_on</span>
                        <span>Douala, Cameroun</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">business_center</span>
                        <span>CDI • Temps plein</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">euro</span>
                        <span>800,000 - 1,000,000 FCFA/mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">schedule</span>
                        <span>Publié il y a 1 semaine</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Management</span>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">B2B</span>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Senior</span>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="flex-1 bg-[#3B82F6] text-white py-2 px-4 rounded-[6px] text-sm font-medium hover:bg-blue-600 whitespace-nowrap">
                        Postuler maintenant
                    </button>
                    <span class="material-symbols-outlined">visibility</span>
                </div>
            </div>

            <!-- Job Card 6 -->
            <div class="job-card bg-white rounded-xl shadow-sm border border-gray-200 p-6" data-sector="technologie"
                data-contract="freelance" data-location="yaounde" data-salary="1500000">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <span class="text-lg font-bold text-indigo-600">DS</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">
                                Consultant Data Science
                            </h3>
                            <p class="text-sm text-gray-600">Digital Solutions</p>
                        </div>
                    </div>
                    <button class="bookmark-btn p-2 text-gray-400 hover:text-red-500">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                </div>
                <div class="space-y-3 mb-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">location_on</span>
                        <span>Télétravail • Yaoundé</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">business_center</span>
                        <span>Freelance • Mission 3 mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">euro</span>
                        <span>1,200,000 - 1,800,000 FCFA/mois</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <span class="material-symbols-outlined">schedule</span>
                        <span>Publié il y a 4 jours</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Python</span>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Machine Learning</span>
                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Télétravail</span>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="flex-1 bg-[#3B82F6] text-white py-2 px-4 rounded-[6px] text-sm font-medium hover:bg-blue-600 whitespace-nowrap">
                        Postuler maintenant
                    </button>
                    <span class="material-symbols-outlined">visibility</span></button>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mt-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                    Affichage de <span class="font-medium">1</span> à
                    <span class="font-medium">6</span> sur
                    <span class="font-medium">1,247</span> offres
                </div>
                <div class="flex items-center space-x-2">
                    <button
                        class="px-4 py-2 text-sm text-gray-500 bg-white border border-gray-300 rounded-[5px] hover:bg-gray-50"
                        disabled>
                        Précédent
                    </button>
                    <button class="px-4 py-2 text-sm text-white bg-[#3B82F6] border border-[#3B82F6] rounded-[5px]">
                        1
                    </button>
                    <button
                        class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-[5px] hover:bg-gray-50">
                        2
                    </button>
                    <button
                        class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-[5px] hover:bg-gray-50">
                        3
                    </button>
                    <span class="px-2 text-sm text-gray-500">...</span>
                    <button
                        class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-[5px] hover:bg-gray-50">
                        42
                    </button>
                    <button
                        class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-[5px] hover:bg-gray-50">
                        Suivant
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        .sidebar-item {
            transition: all 0.2s ease;
        }

        .sidebar-item:hover {
            background-color: #f3f4f6;
        }

        .sidebar-item.active {
            background-color: #dbeafe;
            color: #3b82f6;
        }

        .filter-chip {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .filter-chip:hover {
            background-color: #f3f4f6;
        }

        .filter-chip.active {
            background-color: #3b82f6;
            color: white;
        }

        .job-card {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .job-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1);
        }

        .salary-range {
            background: linear-gradient(90deg, #3b82f6 0%, #10b981 100%);
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 50;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            min-width: 200px;
        }

        .dropdown-menu.show {
            display: block;
        }

        .custom-checkbox {
            appearance: none;
            width: 1rem;
            height: 1rem;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            position: relative;
            cursor: pointer;
        }

        .custom-checkbox:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }

        .custom-checkbox:checked::after {
            content: "✓";
            position: absolute;
            top: -2px;
            left: 1px;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .custom-switch {
            width: 44px;
            height: 24px;
            background-color: #d1d5db;
            border-radius: 12px;
            position: relative;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .custom-switch.active {
            background-color: #3b82f6;
        }

        .custom-switch::after {
            content: "";
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .custom-switch.active::after {
            transform: translateX(20px);
        }
    </style>
    <script id="dropdown-functionality">
        document.addEventListener("DOMContentLoaded", function() {
            const dropdowns = [{
                    button: "sectorDropdown",
                    menu: "sectorMenu"
                },
                {
                    button: "contractDropdown",
                    menu: "contractMenu"
                },
                {
                    button: "locationDropdown",
                    menu: "locationMenu"
                },
            ];

            dropdowns.forEach((dropdown) => {
                const button = document.getElementById(dropdown.button);
                const menu = document.getElementById(dropdown.menu);
                const options = menu.querySelectorAll("button");

                button.addEventListener("click", function() {
                    menu.classList.toggle("show");
                });

                options.forEach((option) => {
                    option.addEventListener("click", function() {
                        const value = this.textContent;
                        button.querySelector("span").textContent = value;
                        menu.classList.remove("show");
                    });
                });
            });

            document.addEventListener("click", function(e) {
                dropdowns.forEach((dropdown) => {
                    const button = document.getElementById(dropdown.button);
                    const menu = document.getElementById(dropdown.menu);
                    if (!button.contains(e.target)) {
                        menu.classList.remove("show");
                    }
                });
            });
        });
    </script>

    <script id="filter-functionality">
        document.addEventListener("DOMContentLoaded", function() {
            const filterChips = document.querySelectorAll(".filter-chip");
            const sortButtons = document.querySelectorAll(".sort-btn");
            const jobCards = document.querySelectorAll(".job-card");
            const globalSearch = document.getElementById("globalSearch");
            const salaryRange = document.getElementById("salaryRange");
            const salaryValue = document.getElementById("salaryValue");
            const resetFilters = document.getElementById("resetFilters");

            filterChips.forEach((chip) => {
                chip.addEventListener("click", function() {
                    this.classList.toggle("active");
                });
            });

            sortButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    sortButtons.forEach((btn) => {
                        btn.classList.remove("bg-[#3B82F6]", "text-white");
                        btn.classList.add("bg-gray-100", "text-gray-700");
                    });
                    this.classList.add("bg-primary", "text-white");
                    this.classList.remove("bg-gray-100", "text-gray-700");
                });
            });

            salaryRange.addEventListener("input", function() {
                const value = parseInt(this.value);
                salaryValue.textContent = value.toLocaleString() + " FCFA";
            });

            globalSearch.addEventListener("input", function() {
                const searchTerm = this.value.toLowerCase();
                jobCards.forEach((card) => {
                    const title = card.querySelector("h3").textContent.toLowerCase();
                    const company = card.querySelector("p").textContent.toLowerCase();
                    if (title.includes(searchTerm) || company.includes(searchTerm)) {
                        card.style.display = "";
                    } else {
                        card.style.display = "none";
                    }
                });
            });

            resetFilters.addEventListener("click", function() {
                filterChips.forEach((chip) => chip.classList.remove("active"));
                globalSearch.value = "";
                salaryRange.value = 500000;
                salaryValue.textContent = "500,000 FCFA";
                jobCards.forEach((card) => (card.style.display = ""));
            });
        });
    </script>

    <script id="bookmark-functionality">
        document.addEventListener("DOMContentLoaded", function() {
            const bookmarkButtons = document.querySelectorAll(".bookmark-btn");

            bookmarkButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    const icon = this.querySelector("i");
                    if (icon.classList.contains("ri-bookmark-line")) {
                        icon.classList.remove("ri-bookmark-line");
                        icon.classList.add("ri-bookmark-fill");
                        this.classList.add("text-red-500");
                        this.classList.remove("text-gray-400");
                    } else {
                        icon.classList.remove("ri-bookmark-fill");
                        icon.classList.add("ri-bookmark-line");
                        this.classList.remove("text-red-500");
                        this.classList.add("text-gray-400");
                    }
                });
            });
        });
    </script>

    <script id="switch-functionality">
        document.addEventListener("DOMContentLoaded", function() {
            const switches = document.querySelectorAll(".custom-switch");

            switches.forEach((switchElement) => {
                switchElement.addEventListener("click", function() {
                    this.classList.toggle("active");
                });
            });
        });
    </script>

    <script id="view-toggle">
        document.addEventListener("DOMContentLoaded", function() {
            const gridView = document.getElementById("gridView");
            const listView = document.getElementById("listView");
            const jobsGrid = document.getElementById("jobsGrid");

            gridView.addEventListener("click", function() {
                jobsGrid.className =
                    "grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6";
                this.classList.add("text-[#3B82F6]", "bg-blue-50");
                this.classList.remove("text-gray-400");
                listView.classList.remove("text-[#3B82F6]", "bg-blue-50");
                listView.classList.add("text-gray-400");
            });

            listView.addEventListener("click", function() {
                jobsGrid.className = "space-y-4";
                this.classList.add("text-primary", "bg-blue-50");
                this.classList.remove("text-gray-400");
                gridView.classList.remove("text-primary", "bg-blue-50");
                gridView.classList.add("text-gray-400");
            });
        });
    </script>

    <script id="sidebar-navigation">
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarItems = document.querySelectorAll(".sidebar-item");
            sidebarItems.forEach((item) => {
                item.addEventListener("click", function(e) {
                    if (!this.querySelector("a")) {
                        sidebarItems.forEach((i) => i.classList.remove("active"));
                        this.classList.add("active");
                    }
                });
            });
        });
    </script>
@endsection
