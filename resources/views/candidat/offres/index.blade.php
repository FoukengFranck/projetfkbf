@extends('candidat.layouts.app')

@section('title', 'Offres d\'emplois')

@section('content')
    <div class="flex-1 m-5">
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Offres D'emplois</h1>
            <p class="text-gray-600">Découvrez les meilleures opportunités d'emploi au Cameroun</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Total Offres</p>
                        <p id="totalOffres" class="text-3xl font-bold text-gray-800">0</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-blue-600">business_center</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Nouvelles Offres</p>
                        <p id="nouvellesOffres" class="text-3xl font-bold text-green-600">0</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-green-600">add_circle</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Entreprises</p>
                        <p id="entreprisesCount" class="text-3xl font-bold text-purple-600">0</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-purple-600">source_environment</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Offres Sauvegardées</p>
                        <p id="sauvegardeesCount" class="text-3xl font-bold text-orange-600">0</p>
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
                <h2 class="text-lg font-semibold text-gray-800">Filtres de Recherche</h2>
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
                        <span id="sectorText" class="text-sm text-gray-700">Tous les secteurs</span>
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
                        <span id="contractText" class="text-sm text-gray-700">Tous les contrats</span>
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
                        <span id="locationText" class="text-sm text-gray-700">Toutes les villes</span>
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
                            <input type="range" id="salaryRange" min="0" max="2000000" value="0"
                                class="flex-1 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" />
                        </div>
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <span>0 FCFA</span>
                            <span id="salaryValue" class="font-medium text-primary">0 FCFA</span>
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
                    <span id="offresTrouvees" class="text-sm text-gray-600">0 offres trouvées</span>
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
            <!-- Job cards chargées dynamiquement -->
        </div>

        <!-- Pagination -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mt-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                    Affichage de <span id="paginationStart">1</span> à
                    <span id="paginationEnd">6</span> sur
                    <span id="paginationTotal">0</span> offres
                </div>
                <div class="flex items-center space-x-2" id="paginationButtons">
                    <!-- Boutons chargés dynamiquement -->
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Styles inchangés */
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const API_URL = "{{ route('candidat.offres') }}"; // Corrigé pour matcher la route 'offres' (sans .index)
            const jobsGrid = document.getElementById('jobsGrid');
            const loading = document.createElement('div');
            loading.id = 'loading';
            loading.className = 'hidden text-center py-8 col-span-full';
            loading.innerHTML = '<span class="material-symbols-outlined text-4xl text-blue-500 animate-spin">hourglass_empty</span><p class="mt-2 text-gray-600">Chargement...</p>';
            jobsGrid.appendChild(loading);

            const totalOffresEl = document.getElementById('totalOffres');
            const nouvellesOffresEl = document.getElementById('nouvellesOffres');
            const entreprisesCountEl = document.getElementById('entreprisesCount');
            const sauvegardeesCountEl = document.getElementById('sauvegardeesCount');
            const offresTrouveesEl = document.getElementById('offresTrouvees');
            const paginationStartEl = document.getElementById('paginationStart');
            const paginationEndEl = document.getElementById('paginationEnd');
            const paginationTotalEl = document.getElementById('paginationTotal');
            const paginationButtonsEl = document.getElementById('paginationButtons');
            const salaryRangeEl = document.getElementById('salaryRange');
            const salaryValueEl = document.getElementById('salaryValue');
            const resetFiltersEl = document.getElementById('resetFilters');
            const sortBtns = document.querySelectorAll('.sort-btn');

            let currentFilters = {
                page: 1,
                sort: 'date',
                search: '',
                departement: '',
                contract_type: '',
                ville: '',
                salary_min: ''
            };
            let savedJobs = JSON.parse(localStorage.getItem('savedJobs') || '[]');

            // Mappings UI → DB (basé sur tinker: "infos" → ?, mais LIKE gère partial; ajuste si besoin)
            const secteurMapping = {
                'technologie': 'Informatique',
                'finance': 'Finance',
                'sante': 'Ressources Humaines',
                'education': 'Design',
                'commerce': 'Marketing'
            };

            const contractMapping = {
                'cdi': 'CDI',
                'cdd': 'CDD',
                'stage': 'Stage',
                'freelance': 'Indépendant'
            };

            const villeMapping = {
                'yaounde': 'Yaoundé',
                'douala': 'Douala',
                'bafoussam': 'Bafoussam',
                'bamenda': 'Bamenda'
            };

            function updateSavedCount() {
                sauvegardeesCountEl.textContent = savedJobs.length;
            }
            updateSavedCount();

            async function fetchOffres(filters = {}) {
                console.log('Debug: Fetch avec filters:', filters);
                loading.classList.remove('hidden');
                jobsGrid.innerHTML = '';

                try {
                    const params = new URLSearchParams({
                        ...currentFilters,
                        ...filters,
                        page: filters.page || currentFilters.page
                    });
                    const url = `${API_URL}?${params}`;
                    console.log('Debug: URL fetch:', url);
                    const response = await fetch(url, { headers: { 'Accept': 'application/json' }, credentials: 'same-origin' });
                    if (!response.ok) {
                        const errText = await response.text();
                        throw new Error(`HTTP ${response.status}: ${response.statusText} - ${errText}`);
                    }
                    const data = await response.json();
                    console.log('Debug: Data reçue:', data);

                    if (data.offres.length === 0) {
                        jobsGrid.innerHTML = '<div class="col-span-full text-center py-8 text-gray-500">Aucune offre trouvée. Vérifiez les filtres.</div>';
                    } else {
                        data.offres.forEach(offre => {
                            const card = createJobCard(offre);
                            jobsGrid.appendChild(card);
                        });
                    }

                    totalOffresEl.textContent = data.stats.total_offres || 0;
                    nouvellesOffresEl.textContent = data.stats.nouvelles_offres || 0;
                    entreprisesCountEl.textContent = data.stats.entreprises || 0;
                    offresTrouveesEl.textContent = `${data.pagination.total || 0} offres trouvées`;

                    renderPagination(data.pagination);

                    loading.classList.add('hidden');
                } catch (error) {
                    console.error('Erreur fetch détaillée:', error);
                    jobsGrid.innerHTML = '<div class="col-span-full text-center py-8 text-red-500">Erreur: ' + error.message + '. Vérifiez logs serveur.</div>';
                    loading.classList.add('hidden');
                }
            }

            function createJobCard(offre) {
                const secteur = (offre.departement || '').toLowerCase();
                // Fix: nom_entreprise au lieu de nom
                const nomEntreprise = offre.entreprise ? offre.entreprise.nom_entreprise || '' : '';
                const initials = nomEntreprise ? nomEntreprise.substring(0, 2).toUpperCase() : '??';
                const isSaved = savedJobs.includes(offre.id);
                const daysAgo = Math.floor((new Date() - new Date(offre.created_at)) / (1000 * 60 * 60 * 24));
                // Skills: array ou parse si string
                let skills = Array.isArray(offre.skills) ? offre.skills : (offre.skills ? JSON.parse(offre.skills) : []);
                const skillsHtml = skills.slice(0, 3).map(s => `<span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">${s}</span>`).join('') || '';

                const colorMap = {
                    'informatique': { bg: 'bg-blue-100', text: 'text-blue-600' },
                    'infos': { bg: 'bg-blue-100', text: 'text-blue-600' }, // Pour "infos"
                    'finance': { bg: 'bg-green-100', text: 'text-green-600' },
                    'ressources humaines': { bg: 'bg-red-100', text: 'text-red-600' },
                    'design': { bg: 'bg-purple-100', text: 'text-purple-600' },
                    'marketing': { bg: 'bg-orange-100', text: 'text-orange-600' },
                    default: { bg: 'bg-indigo-100', text: 'text-indigo-600' }
                };
                const colors = colorMap[secteur] || colorMap.default;

                const card = document.createElement('div');
                card.className = `job-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 data-sector="${secteur}" data-contract="${(offre.contract_type || '').toLowerCase()}" data-location="${(offre.ville || '').toLowerCase()}" data-salary="${offre.salary || '0'}"`;
                card.innerHTML = `
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 ${colors.bg} rounded-lg flex items-center justify-center">
                                <span class="text-lg font-bold ${colors.text}">${initials}</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">${offre.title}</h3>
                                <p class="text-sm text-gray-600">${nomEntreprise || 'Entreprise'}</p>
                            </div>
                        </div>
                        <button class="bookmark-btn p-2 ${isSaved ? 'text-red-500' : 'text-gray-400'} hover:text-red-500" data-id="${offre.id}">
                            <span class="material-symbols-outlined">bookmark</span>
                        </button>
                    </div>
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined">location_on</span>
                            <span>${offre.ville || 'Cameroun'}</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined">business_center</span>
                            <span>${offre.contract_type || 'Non spécifié'} • Temps plein</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined">euro</span>
                            <span>${offre.salary || 'Non spécifié'}</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined">schedule</span>
                            <span>Publié il y a ${daysAgo} ${daysAgo === 1 ? 'jour' : 'jours'}</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-4">
                        ${skillsHtml}
                    </div>
                    <div class="flex items-center space-x-3">
                        <button class="flex-1 bg-[#3B82F6] text-white py-2 px-4 rounded-[6px] text-sm font-medium hover:bg-blue-600 whitespace-nowrap">
                            Postuler maintenant
                        </button>
                        <span class="material-symbols-outlined">visibility</span>
                    </div>
                `;
                return card;
            }

            function renderPagination(pag) {
                paginationStartEl.textContent = ((pag.current_page - 1) * pag.per_page) + 1;
                paginationEndEl.textContent = Math.min(pag.current_page * pag.per_page, pag.total);
                paginationTotalEl.textContent = pag.total;

                let buttonsHtml = `
                    <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 disabled:opacity-50" ${pag.current_page === 1 ? 'disabled' : ''} onclick="changePage(${pag.current_page - 1})">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="px-3 py-2 bg-[#3B82F6] text-white rounded-lg" onclick="changePage(${pag.current_page})">${pag.current_page}</button>
                `;
                if (pag.last_page > 1 && pag.current_page < pag.last_page) {
                    buttonsHtml += `
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50" onclick="changePage(${pag.current_page + 1})">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    `;
                }
                paginationButtonsEl.innerHTML = buttonsHtml;
            }

            window.changePage = function(page) {
                currentFilters.page = page;
                fetchOffres({ page });
            };

            // Dropdowns (inchangé, mais logs)
            const dropdowns = [
                { button: 'sectorDropdown', menu: 'sectorMenu', textId: 'sectorText', param: 'departement', dataKey: 'sector', mapping: secteurMapping },
                { button: 'contractDropdown', menu: 'contractMenu', textId: 'contractText', param: 'contract_type', dataKey: 'contract', mapping: contractMapping },
                { button: 'locationDropdown', menu: 'locationMenu', textId: 'locationText', param: 'ville', dataKey: 'location', mapping: villeMapping }
            ];

            dropdowns.forEach(d => {
                const buttonEl = document.getElementById(d.button);
                const menuEl = document.getElementById(d.menu);
                const textEl = document.getElementById(d.textId);

                buttonEl.addEventListener('click', () => menuEl.classList.toggle('show'));

                menuEl.querySelectorAll('button').forEach(option => {
                    option.addEventListener('click', () => {
                        const displayText = option.textContent.trim();
                        const dataValue = option.dataset[d.dataKey];
                        let dbValue = dataValue === 'all' ? '' : (d.mapping ? d.mapping[dataValue] : dataValue);
                        textEl.textContent = displayText;
                        currentFilters[d.param] = dbValue;
                        console.log(`Debug: Filtre ${d.param} = ${dbValue}`);
                        currentFilters.page = 1;
                        fetchOffres();
                        menuEl.classList.remove('show');
                    });
                });
            });

            document.addEventListener('click', e => {
                if (!e.target.closest('.relative')) {
                    document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.remove('show'));
                }
            });

            // Salary
            salaryRangeEl.addEventListener('input', (e) => {
                const value = parseInt(e.target.value);
                salaryValueEl.textContent = value.toLocaleString() + ' FCFA';
                currentFilters.salary_min = value > 0 ? value : '';
                currentFilters.page = 1;
                fetchOffres();
            });

            // Reset
            resetFiltersEl.addEventListener('click', () => {
                currentFilters = { page: 1, sort: 'date', search: '', departement: '', contract_type: '', ville: '', salary_min: '' };
                salaryRangeEl.value = 0;
                salaryValueEl.textContent = '0 FCFA';
                document.getElementById('sectorText').textContent = 'Tous les secteurs';
                document.getElementById('contractText').textContent = 'Tous les contrats';
                document.getElementById('locationText').textContent = 'Toutes les villes';
                sortBtns.forEach(b => b.classList.remove('bg-[#3B82F6]', 'text-white'));
                sortBtns[0].classList.add('bg-[#3B82F6]', 'text-white');
                fetchOffres();
            });

            // Sort
            sortBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    sortBtns.forEach(b => b.classList.remove('bg-[#3B82F6]', 'text-white'));
                    btn.classList.add('bg-[#3B82F6]', 'text-white');
                    currentFilters.sort = btn.dataset.sort;
                    currentFilters.page = 1;
                    fetchOffres();
                });
            });

            // Bookmark
            jobsGrid.addEventListener('click', e => {
                if (e.target.closest('.bookmark-btn')) {
                    const btn = e.target.closest('.bookmark-btn');
                    const id = parseInt(btn.dataset.id);
                    const index = savedJobs.indexOf(id);
                    if (index > -1) {
                        savedJobs.splice(index, 1);
                        btn.classList.remove('text-red-500');
                        btn.classList.add('text-gray-400');
                    } else {
                        savedJobs.push(id);
                        btn.classList.add('text-red-500');
                        btn.classList.remove('text-gray-400');
                    }
                    localStorage.setItem('savedJobs', JSON.stringify(savedJobs));
                    updateSavedCount();
                }
            });

            // View toggle (basique)
            document.getElementById('gridView').addEventListener('click', () => {
                jobsGrid.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';
            });
            document.getElementById('listView').addEventListener('click', () => {
                jobsGrid.className = 'space-y-4';
            });

            // Initial load
            fetchOffres();
        });
    </script>
@endsection
