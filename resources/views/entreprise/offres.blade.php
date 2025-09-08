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
@endsection
