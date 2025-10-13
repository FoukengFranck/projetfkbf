@extends('candidat.layouts.app')

@section('title', 'Candidatures')

@section('content')

    <style>
        .filter-button {
            transition: all 0.2s ease;
        }

        .filter-button.active {
            background-color: #3b82f6;
            color: white;
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
            min-width: 160px;
        }

        .dropdown-menu.show {
            display: block;
        }

        .action-button {
            padding: 0.5rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .action-button:hover {
            background-color: #f3f4f6;
        }

        .status-badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
        }

        .status-en-attente {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-refuse {
            background-color: #fecaca;
            color: #991b1b;
        }

        .status-accepte {
            background-color: #d1fae5;
            color: #065f46;
        }
    </style>
    <main class="flex-1 overflow-y-auto p-6">
        <div class="flex gap-6">

            <div class="flex-1">

                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        Mes Candidatures
                    </h1>
                    <p class="text-gray-600">
                        Gérez et suivez toutes vos candidatures d'emploi
                    </p>
                </div>

                <!-- statistique -->
                <div class="grid grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">
                                    Total Candidatures
                                </p>
                                <p class="text-3xl font-bold text-gray-800">47</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-blue-600">docs</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">En Attente</p>
                                <p class="text-3xl font-bold text-orange-600">18</p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-orange-600">schedule</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Acceptées</p>
                                <p class="text-3xl font-bold text-green-600">12</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-green-600">check</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Refusées</p>
                                <p class="text-3xl font-bold text-red-600">17</p>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-red-600">Close</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters and Actions -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm font-medium text-gray-700">Filtrer par statut :</span>
                                <button
                                    class="filter-[8px] active px-4 py-2 rounded-lg text-sm font-medium bg-[#3B82F6] text-white"
                                    data-filter="all">
                                    Tous
                                </button>
                                <button
                                    class="filter-button px-4 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200"
                                    data-filter="en-attente">
                                    En attente
                                </button>
                                <button
                                    class="filter-button px-4 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200"
                                    data-filter="accepte">
                                    Acceptées
                                </button>
                                <button
                                    class="filter-button px-4 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200"
                                    data-filter="refuse">
                                    Refusées
                                </button>
                            </div>
                            <div class="relative">
                                <button id="sortButton"
                                    class="flex items-center space-x-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                                    <span>Trier par date</span>
                                    <span class="material-symbols-outlined">keyboard_arrow_down</span>
                                </button>
                                <div id="sortDropdown" class="dropdown-menu">
                                    <button class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        data-sort="date">
                                        Date
                                    </button>
                                    <button class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        data-sort="company">
                                        Entreprise
                                    </button>
                                    <button class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        data-sort="status">
                                        Statut
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button
                                class="flex items-center space-x-2 pr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                                <span class="material-symbols-outlined">download</span>
                                <span>Exporter</span>
                            </button>
                            <button
                                class="flex items-center space-x-2 px-4 py-2 text-sm font-medium text-white bg-[#3B82F6] rounded-[10px] hover:bg-blue-600 whitespace-nowrap">
                                <span class="material-symbols-outlined">add</span>
                                <span>Nouvelle candidature</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Applications Table -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-800">
                                Liste des Candidatures
                            </h2>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">47
                                Résultats
                            </span>

                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full" id="applicationsTable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox" id="selectAll"
                                            class="rounded border-gray-300 text-primary focus:ring-primary" />
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Entreprise
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Poste
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date de candidature
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr data-status="en-attente" data-company="Innov Cameroun" data-date="2025-05-13">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox"
                                            class="row-checkbox rounded border-gray-300 text-primary focus:ring-primary" />
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-blue-600">IC</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    Innov Cameroun
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    Technologie
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Développeur Backend
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        13/05/2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-en-attente">En attente</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <button class="action-button text-blue-600 hover:text-blue-800"
                                                title="Voir détails">
                                                <span class="material-symbols-outlined">visibility</span>
                                            </button>
                                            <button class="action-button text-green-600 hover:text-green-800"
                                                title="Relancer">
                                                <span class="material-symbols-outlined">autorenew</span>
                                            </button>
                                            <button class="action-button text-red-600 hover:text-red-800" title="Retirer">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr data-status="refuse" data-company="MTN Cameroun" data-date="2025-05-14">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox"
                                            class="row-checkbox rounded border-gray-300 text-primary focus:ring-primary" />
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-yellow-600">MT</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    MTN Cameroun
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    Télécommunications
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Développeur Frontend
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        14/05/2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-refuse">Refusé</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <button class="action-button text-blue-600 hover:text-blue-800"
                                                title="Voir détails">
                                                <span class="material-symbols-outlined">visibility</span>
                                            </button>
                                            <button class="action-button text-gray-400" title="Non disponible" disabled>
                                                <span class="material-symbols-outlined">autorenew</span>
                                            </button>
                                            <button class="action-button text-red-600 hover:text-red-800" title="Retirer">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr data-status="accepte" data-company="Orange Cameroun" data-date="2025-05-17">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox"
                                            class="row-checkbox rounded border-gray-300 text-primary focus:ring-primary" />
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-orange-600">OR</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    Orange Cameroun
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    Télécommunications
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Designer UI/UX
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        17/05/2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-accepte">Accepté</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <button class="action-button text-blue-600 hover:text-blue-800"
                                                title="Voir détails">
                                                <span class="material-symbols-outlined">visibility</span>
                                            </button>
                                            <button class="action-button text-gray-400" title="Non disponible" disabled>
                                                <span class="material-symbols-outlined">autorenew</span>
                                            </button>
                                            <button class="action-button text-gray-400" title="Non disponible" disabled>
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr data-status="en-attente" data-company="Kems Well International"
                                    data-date="2025-05-20">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox"
                                            class="row-checkbox rounded border-gray-300 text-primary focus:ring-primary" />
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-purple-600">KW</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    Kems Well International
                                                </div>
                                                <div class="text-sm text-gray-500">Services</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Comptable
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        20/05/2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-en-attente">En attente</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <button class="action-button text-blue-600 hover:text-blue-800"
                                                title="Voir détails">
                                                <span class="material-symbols-outlined">visibility</span>
                                            </button>
                                            <button class="action-button text-green-600 hover:text-green-800"
                                                title="Relancer">
                                                <span class="material-symbols-outlined">autorenew</span>
                                            </button>
                                            <button class="action-button text-red-600 hover:text-red-800" title="Retirer">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr data-status="refuse" data-company="Camtel" data-date="2025-05-22">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox"
                                            class="row-checkbox rounded border-gray-300 text-primary focus:ring-primary" />
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-green-600">CT</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    Camtel
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    Télécommunications
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Ingénieur Réseau
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        22/05/2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-refuse">Refusé</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <button class="action-button text-blue-600 hover:text-blue-800"
                                                title="Voir détails">
                                                <span class="material-symbols-outlined">visibility</span>
                                            </button>
                                            <button class="action-button text-gray-400" title="Non disponible" disabled>
                                                <span class="material-symbols-outlined">autorenew</span>
                                            </button>
                                            <button class="action-button text-red-600 hover:text-red-800" title="Retirer">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr data-status="accepte" data-company="Eneo Cameroun" data-date="2025-05-25">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox"
                                            class="row-checkbox rounded border-gray-300 text-primary focus:ring-primary" />
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-red-600">EN</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    Eneo Cameroun
                                                </div>
                                                <div class="text-sm text-gray-500">Énergie</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Technicien Électrique
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        25/05/2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-accepte">Accepté</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <button class="action-button text-blue-600 hover:text-blue-800"
                                                title="Voir détails">
                                                <span class="material-symbols-outlined">visibility</span>
                                            </button>
                                            <button class="action-button text-gray-400" title="Non disponible" disabled>
                                                <span class="material-symbols-outlined">autorenew</span>
                                            </button>
                                            <button class="action-button text-gray-400" title="Non disponible" disabled>
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            Affichage de <span class="font-medium"> 1 </span> à
                            <span class="font-medium"> 6 </span> sur
                            <span class="font-medium"> 47 </span> résultats
                        </div>
                        <div class="flex items-center space-x-2">
                            <button
                                class="px-3 py-1 text-sm text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-50"
                                disabled>
                                Précédent
                            </button>
                            <button class="px-3 py-1 text-sm text-white bg-[#3b82f6] border border-primary rounded">
                                1
                            </button>
                            <button
                                class="px-3 py-1 text-sm text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                                2
                            </button>
                            <button
                                class="px-3 py-1 text-sm text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                                3
                            </button>
                            <span class="px-2 text-sm text-gray-500">...</span>
                            <button
                                class="px-3 py-1 text-sm text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                                8
                            </button>
                            <button
                                class="px-3 py-1 text-sm text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                                Suivant
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script id="filter-functionality">
            document.addEventListener("DOMContentLoaded", function() {
                const filterButtons = document.querySelectorAll(".filter-button");
                const tableRows = document.querySelectorAll(
                    "#applicationsTable tbody tr"
                );
                const searchInput = document.getElementById("searchInput");

                filterButtons.forEach((button) => {
                    button.addEventListener("click", function() {
                        filterButtons.forEach((btn) =>
                            btn.classList.remove("active", "bg-primary", "text-white")
                        );
                        filterButtons.forEach((btn) =>
                            btn.classList.add("text-gray-700", "bg-gray-100")
                        );

                        this.classList.add("active", "bg-[#3B82F6]", "text-white");
                        this.classList.remove("text-gray-700", "bg-gray-100");

                        const filter = this.getAttribute("data-filter");

                        tableRows.forEach((row) => {
                            if (
                                filter === "all" ||
                                row.getAttribute("data-status") === filter
                            ) {
                                row.style.display = "";
                            } else {
                                row.style.display = "none";
                            }
                        });
                    });
                });

                searchInput.addEventListener("input", function() {
                    const searchTerm = this.value.toLowerCase();
                    tableRows.forEach((row) => {
                        const company = row.getAttribute("data-company").toLowerCase();
                        const position = row
                            .querySelector("td:nth-child(3)")
                            .textContent.toLowerCase();
                        if (company.includes(searchTerm) || position.includes(searchTerm)) {
                            row.style.display = "";
                        } else {
                            row.style.display = "none";
                        }
                    });
                });
            });
        </script>

        <script id="sort-functionality">
            document.addEventListener("DOMContentLoaded", function() {
                const sortButton = document.getElementById("sortButton");
                const sortDropdown = document.getElementById("sortDropdown");

                sortButton.addEventListener("click", function() {
                    sortDropdown.classList.toggle("show");
                });

                document.addEventListener("click", function(e) {
                    if (!sortButton.contains(e.target)) {
                        sortDropdown.classList.remove("show");
                    }
                });

                const sortOptions = document.querySelectorAll("[data-sort]");
                sortOptions.forEach((option) => {
                    option.addEventListener("click", function() {
                        const sortType = this.getAttribute("data-sort");
                        sortDropdown.classList.remove("show");
                    });
                });
            });
        </script>

        <script id="table-interactions">
            document.addEventListener("DOMContentLoaded", function() {
                const selectAllCheckbox = document.getElementById("selectAll");
                const rowCheckboxes = document.querySelectorAll(".row-checkbox");

                selectAllCheckbox.addEventListener("change", function() {
                    rowCheckboxes.forEach((checkbox) => {
                        checkbox.checked = this.checked;
                    });
                });

                rowCheckboxes.forEach((checkbox) => {
                    checkbox.addEventListener("change", function() {
                        const checkedBoxes = document.querySelectorAll(
                            ".row-checkbox:checked"
                        );
                        selectAllCheckbox.checked =
                            checkedBoxes.length === rowCheckboxes.length;
                        selectAllCheckbox.indeterminate =
                            checkedBoxes.length > 0 &&
                            checkedBoxes.length < rowCheckboxes.length;
                    });
                });

                const actionButtons = document.querySelectorAll(".action-button");
                actionButtons.forEach((button) => {
                    button.addEventListener("click", function() {
                        const action = this.getAttribute("title");
                        const row = this.closest("tr");
                        const company = row.getAttribute("data-company");
                        console.log(`Action: ${action} for ${company}`);
                    });
                });
            });
        </script>
    </main>
@endsection
