@extends('entreprise.layouts.app')

@section('title', 'Offres Entreprise')

@section('content')
<main class="pl-3 py-5 mr-0">

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Offres D'emplois</h1>
            <p class="text-gray-600 mt-1">Gérez toutes vos offres d'emploi et suivez les candidatures</p>
        </div>
        <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-primary/90 transition-colors flex items-center !rounded-button whitespace-nowrap">
            <div class="w-5 h-5 flex items-center justify-center mr-2">
                <i class="ri-add-line">
                    <span class="material-symbols-outlined">
                        add
                    </span>
                </i>
            </div>
            Créer une nouvelle offre
        </button>
    </div>


    <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500 mb-1">Offres Actives</div>
                    <div class="text-2xl font-bold text-gray-800">8</div>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="ri-briefcase-line text-green-600 text-xl">
                        <span class="material-symbols-outlined">
                            business_center
                        </span>
                    </i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500 mb-1">Offres Fermées</div>
                    <div class="text-2xl font-bold text-gray-800">4</div>
                </div>
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                    <i class="ri-briefcase-fill text-gray-600 text-xl">
                        <span class="material-symbols-outlined">
                            business_center
                        </span>
                    </i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500 mb-1">Total Candidatures</div>
                    <div class="text-2xl font-bold text-gray-800">156</div>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ri-file-user-line text-blue-600 text-xl">
                        <span class="material-symbols-outlined">
                            3p
                        </span>
                    </i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-500 mb-1">Moyenne par Offre</div>
                    <div class="text-2xl font-bold text-gray-800">19.5</div>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    
                        {{-- <span class="material-symbols-outlined">
                            bar_chart
                        </span> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#9333ea"><path d="M640-160v-280h160v280H640Zm-240 0v-640h160v640H400Zm-240 0v-440h160v440H160Z"/></svg>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Filtres et bar d'action-->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="flex bg-gray-100 rounded-lg p-1">
                    <button class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-md transition-colors !rounded-button whitespace-nowrap bg-blue-600" data-filter="all">Toutes</button>
                    <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors !rounded-button whitespace-nowrap" data-filter="open">Ouvertes</button>
                    <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors !rounded-button whitespace-nowrap" data-filter="closed">Fermées</button>
                </div>
                <div class="relative">
                    <button class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors !rounded-button whitespace-nowrap">
                        <div class="w-4 h-4 flex items-center justify-center mr-2">
                            <span class="material-symbols-outlined">filter_list</span>
                        </div>
                            Trier par Date
                        <div class="w-4 h-4 flex items-center justify-center ml-2">
                            
                                <span class="material-symbols-outlined">
                                    keyboard_arrow_down
                                </span>
                           
                        </div>
                    </button>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-500">12 offres au total</span>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500">Afficher :</span>
                    <select class="border border-gray-300 rounded px-3 py-1 text-sm pr-8">
                        <option>10 par page</option>
                        <option>20 par page</option>
                        <option>50 par page</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre du Poste</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Département</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Publication</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Candidatures</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Développeur Full Stack Senior</div>
                            <div class="text-sm text-gray-500">CDI • Yaoundé</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Informatique</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 Mai 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Ouverte</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">24</span>
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <i class="ri-user-line text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                <button class="text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap">Modifier</button>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Designer UI/UX</div>
                            <div class="text-sm text-gray-500">CDI • Douala</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Design</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Mai 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Ouverte</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">18</span>
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <i class="ri-user-line text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                <button class="text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap">Modifier</button>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Responsable Marketing Digital</div>
                            <div class="text-sm text-gray-500">CDI • Yaoundé</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Marketing</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Mai 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Ouverte</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">31</span>
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <i class="ri-user-line text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                <button class="text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap">Modifier</button>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Comptable Senior</div>
                            <div class="text-sm text-gray-500">CDI • Yaoundé</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Finance</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">08 Mai 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Ouverte</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">15</span>
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <i class="ri-user-line text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                <button class="text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap">Modifier</button>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Chef de Projet IT</div>
                            <div class="text-sm text-gray-500">CDI • Douala</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Informatique</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">05 Mai 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-3 py-1 rounded-full">Fermée</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">42</span>
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <i class="ri-user-line text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                <button class="text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap">Modifier</button>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Analyste Business</div>
                            <div class="text-sm text-gray-500">CDD • Yaoundé</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Stratégie</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03 Mai 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Ouverte</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">12</span>
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <i class="ri-user-line text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                <button class="text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap">Modifier</button>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Développeur Mobile</div>
                            <div class="text-sm text-gray-500">CDI • Remote</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Informatique</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">01 Mai 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Ouverte</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">8</span>
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <i class="ri-user-line text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                <button class="text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap">Modifier</button>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Assistant RH</div>
                            <div class="text-sm text-gray-500">CDD • Yaoundé</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ressources Humaines</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">28 Avr 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-3 py-1 rounded-full">Fermée</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">6</span>
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <i class="ri-user-line text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                <button class="text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap">Modifier</button>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Affichage de 1 à 8 sur 12 offres
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed !rounded-button whitespace-nowrap" disabled>
                    <div class="w-4 h-4 flex items-center justify-center">
                        
                            <span class="material-symbols-outlined">
                                chevron_left
                            </span>
                        
                    </div>
                </button>
                <button class="px-3 py-2 bg-[#00bcd4] text-white rounded-[8px] !rounded-button whitespace-nowrap">1</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 !rounded-button whitespace-nowrap">2</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 !rounded-button whitespace-nowrap">
                    <div class="w-4 h-4 flex justify-center items-center">
                        
                            <span class="material-symbols-outlined">
                                chevron_right
                            </span>
                        
                    </div>
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Modal Créer une Offre -->
{{-- <div id="offerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg p-6 relative">
        <!-- Bouton fermer -->
        <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            ✕
        </button>

        <h2 class="text-xl font-bold mb-4">Créer une Nouvelle Offre</h2>

        <!-- Ici on mettra le formulaire multi-step plus tard -->
        <form id="offerForm">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Titre du Poste</label>
                <input type="text" name="title" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Type de Contrat</label>
                <select name="contract_type" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                    <option value="Stage">Stage</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Publier l'Offre
                </button>
            </div>
        </form>
    </div>
</div> --}}

<!-- Modal Créer une Offre -->
{{-- <div id="offerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-full max-w-4xl rounded-xl shadow-lg p-8 relative">
        <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            ✕
        </button>

        <h1 class="text-2xl font-bold text-gray-900 mb-6">Publier une offre</h1>

        <!-- Progression -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center text-sm font-medium">1</div>
                    <span class="ml-2 text-sm font-medium text-gray-900">Détails du poste</span>
                </div>
                <div class="w-16 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center text-sm font-medium">2</div>
                    <span class="ml-2 text-sm text-gray-500">Description</span>
                </div>
                <div class="w-16 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center text-sm font-medium">3</div>
                    <span class="ml-2 text-sm text-gray-500">Publication</span>
                </div>
            </div>
        </div>

        <!-- Formulaire -->
        <form id="offerForm" method="POST">
            @csrf
            <!-- Étape 1 -->
            <div class="step step-1">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Détails du poste</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Intitulé du poste *</label>
                        <input type="text" name="title" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type de contrat *</label>
                        <select name="contract_type" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm" required>
                            <option>CDI</option>
                            <option>CDD</option>
                            <option>Stage</option>
                            <option>Freelance</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Étape 2 -->
            <div class="step step-2 hidden">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Description du poste</h2>
                <textarea name="description" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-primary text-sm" rows="6"></textarea>
            </div>

            <!-- Étape 3 -->
            <div class="step step-3 hidden">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Publication</h2>
                <p class="text-gray-600">Vérifiez vos informations avant de publier.</p>
            </div>

            <!-- Navigation -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200 mt-6">
                <button type="button" class="prev px-5 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded transition-colors">
                    Précédent
                </button>
                <button type="button" class="next px-5 py-2 text-sm font-medium bg-blue-400 text-white bg-primary hover:bg-blue-600 rounded transition-colors">
                    Suivant
                </button>
                <button type="submit" class="submit hidden px-5 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded transition-colors">
                    Publier l’offre
                </button>
            </div>
        </form>
    </div>
</div> --}}

{{-- Modal Create Offer (paste this block where your previous modal was) --}}
<div id="offerModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl p-6 overflow-auto relative">
    <!-- Close -->
    <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl leading-none">✕</button>

    <!-- Header -->
    <div class="mb-4">
      <h2 class="text-2xl font-bold text-gray-800">Publier une offre</h2>
    </div>

    <!-- Progress bar -->
    <div class="mb-6">
      <div class="relative h-2 bg-gray-200 rounded-full">
        <div id="progressFill" class="absolute left-0 top-0 h-full bg-blue-600 rounded-full transition-all" style="width:0%;"></div>
      </div>

      <div class="mt-3 flex items-center justify-between">
        <div class="flex items-center gap-2">
          <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center bg-blue-600 text-white font-semibold" data-step="0">1</div>
          <div class="text-sm text-gray-700">Informations générales</div>
        </div>
        <div class="flex items-center gap-2">
          <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center bg-gray-200 text-gray-600 font-semibold" data-step="1">2</div>
          <div class="text-sm text-gray-700 text-center">Description du poste</div>
        </div>
        <div class="flex items-center gap-2">
          <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center bg-gray-200 text-gray-600 font-semibold" data-step="2">3</div>
          <div class="text-sm text-gray-700">Publication</div>
        </div>
      </div>
    </div>

    <!-- Toggle Offre / Stage -->
    <div class="mb-6">
      <div class="inline-flex bg-gray-100 p-1 rounded-lg">
        <button type="button" id="tab-offre" class="px-4 py-2 text-sm font-medium rounded-lg bg-blue-600 text-white">Offre d'emploi</button>
        <button type="button" id="tab-stage" class="px-4 py-2 text-sm font-medium rounded-lg text-gray-600">Stage</button>
      </div>
    </div>

    
    <form id="offerForm" method="POST" action="{{ route('offres.store') }}">
      @csrf

      <!-- STEP 1: DETAILS -->
      <div class="form-step" data-step="0">
        <h3 class="text-lg font-semibold mb-4">Détails du poste</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Intitulé du poste *</label>
            <input id="title" name="title" type="text" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2"
                   placeholder="Développeur Full Stack Senior">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Type de contrat *</label>
            <div class="mt-2 space-y-2">
              <label class="flex items-center gap-2">
                <input type="radio" name="contract_type" value="CDI" class="contract-radio" checked>
                <span>CDI</span>
              </label>
              <label class="flex items-center gap-2">
                <input type="radio" name="contract_type" value="CDD" class="contract-radio">
                <span>CDD</span>
              </label>
              <label class="flex items-center gap-2">
                <input type="radio" name="contract_type" value="Stage" class="contract-radio">
                <span>Stage</span>
              </label>
              <label class="flex items-center gap-2">
                <input type="radio" name="contract_type" value="Indépendant" class="contract-radio">
                <span>Indépendant</span>
              </label>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Date de début</label>
            <input name="start_date" type="date" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Rémunération</label>
            <input name="salary" type="text" placeholder="45 000 - 55 000 €/an"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
          </div>

          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Niveau d'études requis</label>
            <select name="education_level" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
              <option>Bac +3 (Licence)</option>
              <option>Bac +5 (Master/Ingénieur)</option>
              <option>Doctorat</option>
              <option>Sans diplôme</option>
            </select>
          </div>

          <!-- DURATION (only visible for Stage) -->
          <div id="durationField" class="md:col-span-2 hidden">
            <label class="block text-sm font-medium text-gray-700">Durée du stage</label>
            <input name="duration" type="text" placeholder="ex : 6 mois"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
          </div>
        </div>
      </div>

      <!-- STEP 2: DESCRIPTION + MISSIONS + SKILLS -->
      <div class="form-step hidden" data-step="1">
        <h3 class="text-lg font-semibold mb-4">Description du poste</h3>

        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Description générale *</label>
            <textarea id="description" name="description" rows="6" required
                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2" placeholder="Décrivez le poste..."></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Missions principales</label>
            <div id="missionsContainer" class="space-y-2 mt-2">
              <!-- initial single mission input -->
              <div class="flex gap-2 items-start mission-row">
                <input type="checkbox" class="custom-checkbox mt-2 hidden" aria-hidden="true">
                <input name="missions[]" type="text" class="flex-1 px-3 py-2 border rounded-lg" placeholder="Ex: Développement d'applications web">
                <button type="button" class="remove-mission text-red-600 px-3 py-1 rounded">Supprimer</button>
              </div>
            </div>

            <div class="mt-2">
              <button id="addMissionBtn" type="button" class="text-blue-600 font-medium">+ Ajouter une mission</button>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Compétences requises</label>

            <div id="skillsContainer" class="flex flex-wrap gap-2 mt-2">
              {{-- If you want to show pre-populated tags, include <span class="tag">JS<input type="hidden" name="skills[]" value="JS"></span> --}}
            </div>

            <div class="mt-2 flex gap-2">
              <input id="skillInput" type="text" placeholder="Tapez une compétence" class="flex-1 px-3 py-2 border rounded-lg">
              <button id="addSkillBtn" type="button" class="px-3 py-2 bg-blue-600 text-white rounded-lg">Ajouter</button>
            </div>
          </div>
        </div>
      </div>

      <!-- STEP 3: PUBLICATION (SUMMARY) -->
      <div class="form-step hidden" data-step="2">
        <h3 class="text-lg font-semibold mb-4">Publication</h3>

        <div id="summaryBox" class="border rounded-lg p-4 bg-gray-50 text-sm text-gray-700">
          <!-- JS will populate the summary preview here -->
          <p class="text-gray-500">Aperçu de votre offre — cliquez sur « Publier l’offre » pour enregistrer.</p>
        </div>
      </div>

      <!-- NAV -->
      <div class="mt-6 flex items-center justify-between">
        <button type="button" class="prev hidden px-4 py-2 rounded-lg border border-gray-300 text-gray-700">← Précédent</button>

        <div class="flex items-center gap-3">
          <button type="button" class="next px-4 py-2 rounded-lg bg-blue-600 text-white">Suivant →</button>
          <button type="submit" class="submit hidden px-4 py-2 rounded-lg bg-green-600 text-white">Publier l’offre</button>
        </div>
      </div>
    </form>

    <div id="toast" class="hidden fixed top-5 right-5 bg-green-600 text-white px-4 py-2 rounded shadow"></div>
  </div>
</div>

{{-- Minimal styles for checkbox (if you use custom-checkbox class earlier) --}}
<style>
  .custom-checkbox {
    appearance: none;
    width: 1rem;
    height: 1rem;
    border: 2px solid #D1D5DB;
    border-radius: 0.25rem;
    display: inline-block;
    vertical-align: middle;
  }
  .tag {
    display:inline-flex; align-items:center; gap:0.5rem;
    background:#EFF6FF; color:#1E40AF; padding:0.25rem 0.6rem; border-radius:9999px; font-size:0.875rem;
  }
  .tag .remove-tag {
    display:inline-flex; width:1rem; height:1rem; align-items:center; justify-content:center; border-radius:9999px; background:rgba(30,64,175,0.12); cursor:pointer;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  /* ---------- Elements ---------- */
  const modal = document.getElementById('offerModal');
  const closeModal = document.getElementById('closeModal');

  // open button fallback: if you gave your dashboard button id="openOfferModal" it uses that,
  // otherwise it finds first button with class bg-blue-600 and text "Créer une nouvelle offre".
  let openBtn = document.getElementById('openOfferModal');
  if (!openBtn) {
    openBtn = [...document.querySelectorAll('button.bg-blue-600')].find(b => /Créer une nouvelle offre/i.test(b.textContent)) || document.querySelector('button.bg-blue-600');
  }

  const steps = Array.from(document.querySelectorAll('.form-step'));
  const stepIndicators = Array.from(document.querySelectorAll('.step-indicator'));
  const progressFill = document.getElementById('progressFill');
  const nextBtn = document.querySelector('.next');
  const prevBtn = document.querySelector('.prev');
  const submitBtn = document.querySelector('.submit');
  const addMissionBtn = document.getElementById('addMissionBtn');
  const missionsContainer = document.getElementById('missionsContainer');
  const addSkillBtn = document.getElementById('addSkillBtn');
  const skillsContainer = document.getElementById('skillsContainer');
  const skillInput = document.getElementById('skillInput');
  const tabOffre = document.getElementById('tab-offre');
  const tabStage = document.getElementById('tab-stage');
  const durationField = document.getElementById('durationField');
  const contractRadios = document.querySelectorAll('.contract-radio');
  const summaryBox = document.getElementById('summaryBox');
  const form = document.getElementById('offerForm');

  let currentStep = 0;

  /* ---------- Modal open/close ---------- */
  function openModal() {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    updateUI();
  }
  function closeModalFn() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }
  if (openBtn) openBtn.addEventListener('click', openModal);
  closeModal.addEventListener('click', closeModalFn);
  modal.addEventListener('click', e => { if (e.target === modal) closeModalFn(); });

  /* ---------- Progress bar & step UI ---------- */
  function updateProgress() {
    const maxIndex = steps.length - 1;
    const pct = (currentStep / maxIndex) * 100;
    progressFill.style.width = pct + '%';

    stepIndicators.forEach((el, i) => {
      if (i <= currentStep) {
        el.classList.remove('bg-gray-200', 'text-gray-600');
        el.classList.add('bg-blue-600', 'text-white');
      } else {
        el.classList.remove('bg-blue-600', 'text-white');
        el.classList.add('bg-gray-200', 'text-gray-600');
      }
    });
  }

  function showStep(index) {
    steps.forEach((s, i) => {
      s.classList.toggle('hidden', i !== index);
    });
    prevBtn.classList.toggle('hidden', index === 0);
    nextBtn.classList.toggle('hidden', index === steps.length - 1);
    submitBtn.classList.toggle('hidden', index !== steps.length - 1);
    updateProgress();
    populateSummary(); // update summary when entering summary step
  }

  function updateUI() {
    showStep(currentStep);
  }

  nextBtn.addEventListener('click', function () {
    // Simple client-side validation before moving to next step:
    if (currentStep === 0) {
      // require title
      const title = document.getElementById('title').value.trim();
      if (!title) { alert('Veuillez saisir l\'intitulé du poste.'); return; }
    }
    if (currentStep < steps.length - 1) {
      currentStep++;
      showStep(currentStep);
     
      modal.querySelector('div[role="dialog"]')?.scrollTo?.(0,0);
    }
  });

  prevBtn.addEventListener('click', function () {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  });

  // enable clicking on step indicators to jump
  stepIndicators.forEach(ind => {
    ind.style.cursor = 'pointer';
    ind.addEventListener('click', function () {
      const idx = Number(this.dataset.step);
      currentStep = idx;
      showStep(currentStep);
    });
  });

  /* ---------- Missions add / remove ---------- */
  function createMissionRow(value = '') {
    const wrapper = document.createElement('div');
    wrapper.className = 'flex gap-2 items-start mission-row';

    const input = document.createElement('input');
    input.name = 'missions[]';
    input.type = 'text';
    input.className = 'flex-1 px-3 py-2 border rounded-lg';
    input.placeholder = 'Ex: Développement d\'applications web';
    input.value = value;

    const removeBtn = document.createElement('button');
    removeBtn.type = 'button';
    removeBtn.className = 'remove-mission text-red-600 px-3 py-1 rounded';
    removeBtn.textContent = 'Supprimer';

    removeBtn.addEventListener('click', () => wrapper.remove());

    wrapper.appendChild(input);
    wrapper.appendChild(removeBtn);

    return wrapper;
  }

  addMissionBtn.addEventListener('click', function () {
    missionsContainer.appendChild(createMissionRow(''));
    // focus on the new input
    const last = missionsContainer.querySelector('.mission-row:last-child input');
    if (last) last.focus();
  });

  // remove on load for any existing static "Supprimer" buttons (we attached listener when created above).
  missionsContainer.querySelectorAll('.remove-mission').forEach(btn => {
    btn.addEventListener('click', e => {
      e.target.closest('.mission-row').remove();
    });
  });

  /* ---------- Skills add / remove (plus hidden inputs for form submission) ---------- */
  function createSkillTag(skillText) {
    const tag = document.createElement('span');
    tag.className = 'tag';

    const spanText = document.createElement('span');
    spanText.textContent = skillText;

    const remove = document.createElement('span');
    remove.className = 'remove-tag ml-2';
    remove.innerHTML = '✕';
    remove.addEventListener('click', function () {
      tag.remove();
    });

    // create hidden input for form submission
    const hidden = document.createElement('input');
    hidden.type = 'hidden';
    hidden.name = 'skills[]';
    hidden.value = skillText;

    tag.appendChild(spanText);
    tag.appendChild(remove);
    tag.appendChild(hidden);
    return tag;
  }

  addSkillBtn.addEventListener('click', function () {
    const v = skillInput.value.trim();
    if (!v) return;
    // prevent duplicate
    const existing = Array.from(skillsContainer.querySelectorAll('input[name="skills[]"]')).some(i => i.value.toLowerCase() === v.toLowerCase());
    if (existing) {
      skillInput.value = '';
      return;
    }
    const tag = createSkillTag(v);
    skillsContainer.appendChild(tag);
    skillInput.value = '';
    skillInput.focus();
  });

  // allow Enter in skill input
  skillInput.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      addSkillBtn.click();
    }
  });

  // If you had pre-existing tag text in HTML, convert them to hidden inputs on load:
  Array.from(skillsContainer.querySelectorAll('.tag')).forEach(tag => {
    const text = tag.textContent.trim();
    if (text) {
      const hidden = document.createElement('input');
      hidden.type = 'hidden';
      hidden.name = 'skills[]';
      hidden.value = text;
      tag.appendChild(hidden);
      const removeBtn = document.createElement('span');
      removeBtn.className = 'remove-tag ml-2';
      removeBtn.innerHTML = '✕';
      removeBtn.addEventListener('click', () => tag.remove());
      tag.appendChild(removeBtn);
    }
  });

  /* ---------- Toggle Offre / Stage (sync with contract radio) ---------- */
  function setAsStage(isStage) {
    if (isStage) {
      tabStage.classList.add('bg-blue-600','text-white');
      tabStage.classList.remove('text-gray-600');
      tabOffre.classList.remove('bg-blue-600','text-white');
      tabOffre.classList.add('text-gray-600');
      durationField.classList.remove('hidden');
      // mark contract radio to Stage
      contractRadios.forEach(r => { if (r.value === 'Stage') r.checked = true; });
    } else {
      tabOffre.classList.add('bg-blue-600','text-white');
      tabOffre.classList.remove('text-gray-600');
      tabStage.classList.remove('bg-blue-600','text-white');
      tabStage.classList.add('text-gray-600');
      durationField.classList.add('hidden');
      // if Stage radio was checked, set to default CDI
      contractRadios.forEach(r => { if (r.value === 'CDI') r.checked = true; });
    }
  }

  tabOffre.addEventListener('click', () => setAsStage(false));
  tabStage.addEventListener('click', () => setAsStage(true));

  // if user toggles radios manually, update duration visibility
  contractRadios.forEach(r => {
    r.addEventListener('change', function () {
      if (this.value === 'Stage') {
        durationField.classList.remove('hidden');
        // ensure top toggle reflects it
        tabStage.classList.add('bg-blue-600','text-white'); tabOffre.classList.remove('bg-blue-600','text-white');
      } else {
        durationField.classList.add('hidden');
        tabOffre.classList.add('bg-blue-600','text-white'); tabStage.classList.remove('bg-blue-600','text-white');
      }
    });
  });

  /* ---------- Summary population ---------- */
  function populateSummary() {
    // build a small summary string
    const title = (document.getElementById('title')?.value || '').trim();
    const contract = (Array.from(document.querySelectorAll('input[name="contract_type"]:checked'))[0]?.value) || '';
    const start = (form.querySelector('input[name="start_date"]')?.value) || '';
    const salary = (form.querySelector('input[name="salary"]')?.value) || '';
    const education = (form.querySelector('select[name="education_level"]')?.value) || '';
    const desc = (document.getElementById('description')?.value || '').trim();

    const missions = Array.from(document.querySelectorAll('input[name="missions[]"]')).map(i => i.value).filter(Boolean);
    const skills = Array.from(document.querySelectorAll('input[name="skills[]"]')).map(i => i.value).filter(Boolean);

    // build html
    let html = `<div class="mb-2"><strong>Titre :</strong> ${escapeHtml(title)}</div>`;
    html += `<div class="mb-2"><strong>Type :</strong> ${escapeHtml(contract)}</div>`;
    if (document.querySelector('input[name="duration"]') && !document.getElementById('durationField').classList.contains('hidden')) {
      const dur = form.querySelector('input[name="duration"]').value || '';
      html += `<div class="mb-2"><strong>Durée (stage) :</strong> ${escapeHtml(dur)}</div>`;
    }
    if (start) html += `<div class="mb-2"><strong>Date début :</strong> ${escapeHtml(start)}</div>`;
    if (salary) html += `<div class="mb-2"><strong>Rémunération :</strong> ${escapeHtml(salary)}</div>`;
    if (education) html += `<div class="mb-2"><strong>Niveau :</strong> ${escapeHtml(education)}</div>`;
    if (desc) html += `<div class="mb-2"><strong>Description :</strong><div class="mt-1 text-gray-700">${escapeHtml(desc)}</div></div>`;
    if (missions.length) {
      html += `<div class="mb-2"><strong>Missions :</strong><ul class="list-disc ml-6">` + missions.map(m => `<li>${escapeHtml(m)}</li>`).join('') + `</ul></div>`;
    }
    if (skills.length) {
      html += `<div><strong>Compétences :</strong> ${skills.map(s => `<span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded mr-1">${escapeHtml(s)}</span>`).join('')}</div>`;
    }

    summaryBox.innerHTML = html;
  }

  function escapeHtml(text) {
    var map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
  }

  /* ---------- Initialize ---------- */
  updateUI(); // shows step 0 & progress

  // OPTIONAL: intercept submit to do client-side checks and allow AJAX later.
  form.addEventListener('submit', function (e) {
    // simple client-side validation example before submitting:
    const title = document.getElementById('title').value.trim();
    const desc = document.getElementById('description').value.trim();
    if (!title || !desc) {
      e.preventDefault();
      alert('Veuillez remplir l\'intitulé et la description avant de publier.');
      currentStep = !title ? 0 : 1;
      showStep(currentStep);
      return;
    }
    // otherwise, allow normal form submit (server handles final validation)
    // If you prefer AJAX, preventDefault() and use fetch() to POST formData.
  });
  });
</script>




<script>
  document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("offerModal");
    const openBtn = document.querySelector("button.bg-blue-600"); // ton bouton "Créer une nouvelle offre"
    const closeBtn = document.getElementById("closeModal");

    // Ouvrir le modal
    openBtn.addEventListener("click", function () {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    });

    // Fermer le modal
    closeBtn.addEventListener("click", function () {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    });

    // Fermer si on clique en dehors du contenu
    modal.addEventListener("click", function (e) {
        if (e.target === modal) {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        }
    });
  });
</script>


<script>
  document.getElementById('offerForm').addEventListener('submit', async function(e) {
    e.preventDefault(); // Empêche le rechargement de la page

    let form = e.target;
    let formData = new FormData(form);

    try {
        let response = await fetch("{{ route('offres.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                "Accept": "application/json"
            },
            body: formData
        });

        let result = await response.json();

        if (result.success) {
            // ✅ 1. Afficher un toast
            let toast = document.getElementById("toast");
            toast.textContent = result.message;
            toast.classList.remove("hidden");

            setTimeout(() => toast.classList.add("hidden"), 3000);

            // ✅ 2. Fermer le modal automatiquement (exemple si tu utilises Alpine)
            document.getElementById("offerForm").reset();
            // Ici tu ajoutes ton code pour fermer le modal

            // ✅ 3. Ajouter la nouvelle offre directement au tableau (si tu as une table des offres)
            let offersTable = document.getElementById("offersTableBody");
            if (offersTable) {
                offersTable.innerHTML += `
                    <tr>
                        <td>${result.offer.title}</td>
                        <td>${result.offer.contract_type}</td>
                        <td>${result.offer.salary ?? '-'}</td>
                        <td>${result.offer.start_date}</td>
                    </tr>
                `;
            }
        } else {
            alert("Erreur lors de l’ajout");
        }
    } catch (error) {
        console.error(error);
        alert("Une erreur est survenue");
    }
  });
</script>

@endsection
