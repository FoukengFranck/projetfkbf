@extends('entreprise.layouts.app')

@section('title', 'Profil Entreprise')

@section('content')
    <main class="p-3">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Candidatures</h1>
                <p class="text-gray-600 mt-1">Gérez toutes les candidatures reçues pour vos offres d'emploi</p>
            </div>
            <button class="bg-[#00bcd4] text-white px-4 py-2 rounded-[10px] font-medium hover:bg-[#00bcd4]/90 transition-colors flex items-center \!rounded-[8px] whitespace-nowrap">
                <div class="w-5 h-5 flex items-center justify-center mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
                </div>
                Exporter les données
            </button>
        </div>
        <!-- Stats Cards -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-[10px] shadow-[4px] border border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm text-gray-500 mb-1">Total Candidatures</div>
                        <div class="text-2xl font-bold text-gray-800">156</div>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-[10px] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M440-280h320v-22q0-45-44-71.5T600-400q-72 0-116 26.5T440-302v22Zm160-160q33 0 56.5-23.5T680-520q0-33-23.5-56.5T600-600q-33 0-56.5 23.5T520-520q0 33 23.5 56.5T600-440ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Z"/></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm text-gray-500 mb-1">Nouvelles</div>
                        <div class="text-2xl font-bold text-gray-800">42</div>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ca8a04"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm text-gray-500 mb-1">En cours</div>
                        <div class="text-2xl font-bold text-gray-800">38</div>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ea580c"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm text-gray-500 mb-1">Traitées</div>
                        <div class="text-2xl font-bold text-gray-800">76</div>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#16a34a"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filtres -->
        <div class="bg-white rounded-[10px] shadow-[4px] border border-gray-200 p-4 mb-6">
                <div class="flex items-center justify-between flex-shrink">
                    <div class="flex items-center space-x-4">
                        <div class="flex bg-gray-100 rounded-lg p-1">
                            <button class="px-4 py-2 text-sm font-medium text-white bg-[#00bcd4] rounded-[12px] transition-colors \!rounded-[8px] whitespace-nowrap" data-status-filter="all">Tous</button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors !rounded-button whitespace-nowrap" data-status-filter="nouveau">Nouveau</button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors !rounded-button whitespace-nowrap" data-status-filter="en-cours">En cours</button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors !rounded-button whitespace-nowrap" data-status-filter="accepte">Accepté</button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors !rounded-button whitespace-nowrap" data-status-filter="refuse">Refusé</button>
                        </div>
                        <div class="relative">
                            <button class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors \!rounded-[8px] whitespace-nowrap" id="positionFilterBtn">
                                <div class="w-4 h-4 flex items-center justify-center mr-2">
                                    <span class="material-symbols-outlined">business_center</span>
                                </div>
                                Tous les postes
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <span class="material-symbols-outlined">keyboard_arrow_down</span>
                                </div>
                            </button>
                            <div class="absolute top-full left-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg z-20 hidden" id="positionDropdown">
                                <div class="p-2">
                                    <div class="px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded cursor-pointer" data-position="all">Tous les postes</div>
                                    <div class="px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded cursor-pointer" data-position="Développeur Full Stack Senior">Développeur Full Stack Senior</div>
                                    <div class="px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded cursor-pointer" data-position="Designer UI/UX">Designer UI/UX</div>
                                    <div class="px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded cursor-pointer" data-position="Responsable Marketing Digital">Responsable Marketing Digital</div>
                                    <div class="px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded cursor-pointer" data-position="Comptable Senior">Comptable Senior</div>
                                    <div class="px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded cursor-pointer" data-position="Chef de Projet IT">Chef de Projet IT</div>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <button class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors !rounded-button whitespace-nowrap">
                                <div class="w-4 h-4 flex items-center justify-center mr-2">
                                    <span class="material-symbols-outlined">filter_list</span>
                                </div>
                                Trier par Date
                                <div class="w-4 h-4 flex items-center justify-center ml-2">
                                    <span class="material-symbols-outlined"> keyboard_arrow_down </span>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-1">
                            <span class="text-sm text-gray-500">Afficher :</span>
                            <select class="border border-gray-300 rounded px-3 py-1 text-sm pr-8 max-w-xs w-24">
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
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Candidat</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poste Candidaté</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Candidature</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CV</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50" data-status="nouveau" data-position="Développeur Full Stack Senior">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-user-fill text-blue-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Alexandre Dubois</div>
                                            <div class="text-sm text-gray-500">alexandre.dubois@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Développeur Full Stack Senior</div>
                                    <div class="text-sm text-gray-500">CDI • Yaoundé</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">16 Mai 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full">Nouveau</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center !rounded-button whitespace-nowrap">
                                        <div class="w-4 h-4 flex items-center justify-center mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M160-120v-80h640v80H160Zm320-160L280-480l56-56 104 104v-408h80v408l104-104 56 56-200 200Z"/></svg>
                                        </div>
                                        Télécharger
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                        <button class="text-green-600 hover:text-green-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'accepte')">Accepter</button>
                                        <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'refuse')">Refuser</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50" data-status="en-cours" data-position="Designer UI/UX">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-user-fill text-purple-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Sophie Martin</div>
                                            <div class="text-sm text-gray-500">sophie.martin@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Designer UI/UX</div>
                                    <div class="text-sm text-gray-500">CDI • Douala</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14 Mai 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-orange-100 text-orange-800 text-xs font-medium px-3 py-1 rounded-full">En cours</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center !rounded-button whitespace-nowrap">
                                        <div class="w-4 h-4 flex items-center justify-center mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M160-120v-80h640v80H160Zm320-160L280-480l56-56 104 104v-408h80v408l104-104 56 56-200 200Z"/></svg>
                                        </div>
                                        Télécharger
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                        <button class="text-green-600 hover:text-green-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'accepte')">Accepter</button>
                                        <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'refuse')">Refuser</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50" data-status="accepte" data-position="Responsable Marketing Digital">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-user-fill text-green-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Pierre Kamga</div>
                                            <div class="text-sm text-gray-500">pierre.kamga@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Responsable Marketing Digital</div>
                                    <div class="text-sm text-gray-500">CDI • Yaoundé</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Mai 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Accepté</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center !rounded-button whitespace-nowrap">
                                        <div class="w-4 h-4 flex items-center justify-center mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M160-120v-80h640v80H160Zm320-160L280-480l56-56 104 104v-408h80v408l104-104 56 56-200 200Z"/></svg>
                                        </div>
                                        Télécharger
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                        <span class="text-gray-400 text-sm">Candidature acceptée</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50" data-status="refuse" data-position="Comptable Senior">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-user-fill text-red-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Marie Nkomo</div>
                                            <div class="text-sm text-gray-500">marie.nkomo@email.com</div>
                                        </div>
                                </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Comptable Senior</div>
                                    <div class="text-sm text-gray-500">CDI • Yaoundé</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Mai 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-3 py-1 rounded-full">Refusé</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center !rounded-button whitespace-nowrap">
                                        <div class="w-4 h-4 flex items-center justify-center mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M160-120v-80h640v80H160Zm320-160L280-480l56-56 104 104v-408h80v408l104-104 56 56-200 200Z"/></svg>
                                        </div>
                                        Télécharger
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                        <span class="text-gray-400 text-sm">Candidature refusée</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50" data-status="nouveau" data-position="Chef de Projet IT">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-user-fill text-indigo-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Jean-Baptiste Fouda</div>
                                            <div class="text-sm text-gray-500">jb.fouda@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Chef de Projet IT</div>
                                    <div class="text-sm text-gray-500">CDI • Douala</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">09 Mai 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full">Nouveau</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center !rounded-button whitespace-nowrap">
                                        <div class="w-4 h-4 flex items-center justify-center mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M160-120v-80h640v80H160Zm320-160L280-480l56-56 104 104v-408h80v408l104-104 56 56-200 200Z"/></svg>
                                        </div>
                                        Télécharger
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                        <button class="text-green-600 hover:text-green-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'accepte')">Accepter</button>
                                        <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'refuse')">Refuser</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50" data-status="en-cours" data-position="Développeur Full Stack Senior">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-user-fill text-teal-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Aminata Diallo</div>
                                            <div class="text-sm text-gray-500">aminata.diallo@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Développeur Full Stack Senior</div>
                                    <div class="text-sm text-gray-500">CDI • Yaoundé</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">08 Mai 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-orange-100 text-orange-800 text-xs font-medium px-3 py-1 rounded-full">En cours</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center !rounded-button whitespace-nowrap">
                                        <div class="w-4 h-4 flex items-center justify-center mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M160-120v-80h640v80H160Zm320-160L280-480l56-56 104 104v-408h80v408l104-104 56 56-200 200Z"/></svg>
                                        </div>
                                        Télécharger
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                        <button class="text-green-600 hover:text-green-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'accepte')">Accepter</button>
                                        <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'refuse')">Refuser</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50" data-status="nouveau" data-position="Designer UI/UX">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-user-fill text-pink-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Cédric Mbarga</div>
                                            <div class="text-sm text-gray-500">cedric.mbarga@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Designer UI/UX</div>
                                    <div class="text-sm text-gray-500">CDI • Douala</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">07 Mai 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full">Nouveau</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center !rounded-button whitespace-nowrap">
                                        <div class="w-4 h-4 flex items-center justify-center mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M160-120v-80h640v80H160Zm320-160L280-480l56-56 104 104v-408h80v408l104-104 56 56-200 200Z"/></svg>
                                        </div>
                                        Télécharger
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                        <button class="text-green-600 hover:text-green-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'accepte')">Accepter</button>
                                        <button class="text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap" onclick="updateStatus(this, 'refuse')">Refuser</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50" data-status="accepte" data-position="Comptable Senior">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-cyan-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-user-fill text-cyan-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Élise Tchinda</div>
                                            <div class="text-sm text-gray-500">elise.tchinda@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Comptable Senior</div>
                                    <div class="text-sm text-gray-500">CDI • Yaoundé</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">05 Mai 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Accepté</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center !rounded-button whitespace-nowrap">
                                        <div class="w-4 h-4 flex items-center justify-center mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2563eb"><path d="M160-120v-80h640v80H160Zm320-160L280-480l56-56 104 104v-408h80v408l104-104 56 56-200 200Z"/></svg>
                                        </div>
                                        Télécharger
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap">Détails</button>
                                        <span class="text-gray-400 text-sm">Candidature acceptée</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Affichage de 1 à 8 sur 156 candidatures
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed !rounded-button whitespace-nowrap" disabled>
                            <div class="w-4 h-4 flex items-center justify-center">
                                <span class="material-symbols-outlined">keyboard_arrow_left</span>
                            </div>
                        </button>
                        <button class="px-3 py-2 bg-[#00bcd4] text-white rounded-lg !rounded-button whitespace-nowrap">1</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 !rounded-button whitespace-nowrap">2</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 !rounded-button whitespace-nowrap">3</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 !rounded-button whitespace-nowrap">
                            <div class="w-4 h-4 flex items-center justify-center">
                               <span class="material-symbols-outlined">keyboard_arrow_right</span>
                            </div>
                        </button>
                    </div>
                </div>
        </div>
    </main>
@endsection
