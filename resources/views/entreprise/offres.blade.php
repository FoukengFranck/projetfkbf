@extends('entreprise.layouts.app')
@section('title', 'Offres Entreprise')
@section('content')
    <main class="pl-3 py-5 mr-0">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Offres D'emplois</h1>
                <p class="text-gray-600 mt-1">Gérez toutes vos offres d'emploi et suivez les candidatures</p>
            </div>
            <button id="openOfferModal"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-primary/90 transition-colors flex items-center !rounded-button whitespace-nowrap">
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
            <!-- Stats statiques -->
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
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#9333ea">
                            <path d="M640-160v-280h160v280H640Zm-240 0v-640h160v640H400Zm-240 0v-440h160v440H160Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filtres et bar d'action -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="flex bg-gray-100 rounded-lg p-1">
                        <button
                            class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-md transition-colors !rounded-button whitespace-nowrap bg-blue-600"
                            data-filter="all">Toutes</button>
                        <button
                            class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors !rounded-button whitespace-nowrap"
                            data-filter="open">Ouvertes</button>
                        <button
                            class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors !rounded-button whitespace-nowrap"
                            data-filter="closed">Fermées</button>
                    </div>
                    <div class="relative">
                        <button
                            class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors !rounded-button whitespace-nowrap">
                            <div class="w-4 h-4 flex items-center justify-center mr-2">
                                <span class="material-symbols-outlined">filter_list</span>
                            </div>
                            Trier par Date
                            <div class="w-4 h-4 flex items-center justify-center ml-2">
                                <span class="material-symbols-outlined">keyboard_arrow_down</span>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-sm text-gray-500" id="totalOffres">0 offres au total</span>
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
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre
                                du Poste</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Département</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                                Publication</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Statut</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Candidatures</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody id="offersTableBody" class="bg-white divide-y divide-gray-200">
                        {{-- Lignes chargées dynamiquement en JS --}}
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Affichage de 1 à <span id="currentPageCount">0</span> sur <span id="totalCount">0</span> offres
                </div>
                <div class="flex items-center space-x-2">
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed !rounded-button whitespace-nowrap"
                        disabled>
                        <div class="w-4 h-4 flex items-center justify-center">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </div>
                    </button>
                    <button
                        class="px-3 py-2 bg-[#00bcd4] text-white rounded-[8px] !rounded-button whitespace-nowrap">1</button>
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 !rounded-button whitespace-nowrap">2</button>
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 !rounded-button whitespace-nowrap">
                        <div class="w-4 h-4 flex justify-center items-center">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </main>

    {{-- Modal Création/Modification --}}
    <div id="offerModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl p-6 overflow-auto relative">
            <!-- Close -->
            <button id="closeModal"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl leading-none">✕</button>
            <!-- Header -->
            <div class="mb-4">
                <h2 id="modalTitle" class="text-2xl font-bold text-gray-800">Publier une offre</h2>
            </div>
            <!-- Progress bar (cachée en mode édition) -->
            <div id="progressContainer" class="mb-6">
                <div class="relative h-2 bg-gray-200 rounded-full">
                    <div id="progressFill" class="absolute left-0 top-0 h-full bg-blue-600 rounded-full transition-all"
                        style="width:0%;"></div>
                </div>
                <div class="mt-3 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center bg-blue-600 text-white font-semibold"
                            data-step="0">1</div>
                        <div class="text-sm text-gray-700">Informations générales</div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center bg-gray-200 text-gray-600 font-semibold"
                            data-step="1">2</div>
                        <div class="text-sm text-gray-700 text-center">Description du poste</div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center bg-gray-200 text-gray-600 font-semibold"
                            data-step="2">3</div>
                        <div class="text-sm text-gray-700">Publication</div>
                    </div>
                </div>
            </div>
            <!-- Toggle Offre / Stage -->
            <div class="mb-6">
                <div class="inline-flex bg-gray-100 p-1 rounded-lg">
                    <button type="button" id="tab-offre"
                        class="px-4 py-2 text-sm font-medium rounded-lg bg-blue-600 text-white">Offre d'emploi</button>
                    <button type="button" id="tab-stage"
                        class="px-4 py-2 text-sm font-medium rounded-lg text-gray-600">Stage</button>
                </div>
            </div>

            <form id="offerForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="methodInput" value="POST">
                <input type="hidden" name="id" id="offerIdInput">
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
                                    <input type="radio" name="contract_type" value="CDI" class="contract-radio"
                                        checked>
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
                                    <input type="radio" name="contract_type" value="Indépendant"
                                        class="contract-radio">
                                    <span>Indépendant</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date de début</label>
                            <input name="start_date" type="date"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Rémunération</label>
                            <input name="salary" type="text" placeholder="45 000 - 55 000 €/an"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Niveau d'études requis</label>
                            <select name="education_level"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
                                <option>Bac +3 (Licence)</option>
                                <option>Bac +5 (Master/Ingénieur)</option>
                                <option>Doctorat</option>
                                <option>Sans diplôme</option>
                            </select>
                        </div>
                        <!-- Département -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Département</label>
                            <select id="departementSelect" name="departement"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
                                <option value="">Choisir un département</option>
                                <option value="Informatique">Informatique</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Finance">Finance</option>
                                <option value="Ressources Humaines">Ressources Humaines</option>
                                <option value="Design">Design</option>
                                <option value="Stratégie">Stratégie</option>
                                <option value="Ventes">Ventes</option>
                                <option value="Autre">Autre</option>
                            </select>
                            <div id="departementCustomField" class="mt-2 hidden">
                                <input id="departementCustom" name="departement_custom" type="text"
                                    placeholder="Décrivez votre département"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
                            </div>
                        </div>
                        <!-- Ville -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Ville</label>
                            <select name="ville"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
                                <option value="">Choisir une ville</option>
                                <option value="Yaoundé">Yaoundé</option>
                                <option value="Douala">Douala</option>
                                <option value="Garoua">Garoua</option>
                                <option value="Bamenda">Bamenda</option>
                                <option value="Bafoussam">Bafoussam</option>
                                <option value="Maroua">Maroua</option>
                                <option value="Ngaoundéré">Ngaoundéré</option>
                                <option value="Bertoua">Bertoua</option>
                                <option value="Ebolowa">Ebolowa</option>
                                <option value="Kumba">Kumba</option>
                                <option value="Limbe">Limbe</option>
                                <option value="Nkongsamba">Nkongsamba</option>
                                <option value="Buea">Buea</option>
                                <option value="Mbouda">Mbouda</option>
                                <option value="Foumban">Foumban</option>
                                <option value="Nkoteng">Nkoteng</option>
                                <option value="Mbalmayo">Mbalmayo</option>
                                <option value="Bafia">Bafia</option>
                                <option value="Sangmélima">Sangmélima</option>
                                <option value="Eséka">Eséka</option>
                                <option value="Obala">Obala</option>
                                <option value="Messa">Messa</option>
                                <option value="Sa'a">Sa'a</option>
                                <option value="Monatéle">Monatéle</option>
                                <option value="Edéa">Edéa</option>
                                <option value="Loum">Loum</option>
                                <option value="Melong">Melong</option>
                                <option value="Manjo">Manjo</option>
                                <option value="Mbanga">Mbanga</option>
                                <option value="Penja">Penja</option>
                                <option value="Bonabéri">Bonabéri</option>
                                <option value="Deido">Deido</option>
                                <option value="Akwa">Akwa</option>
                                <option value="Bonapriso">Bonapriso</option>
                                <option value="Makepe">Makepe</option>
                                <option value="New Bell">New Bell</option>
                                <option value="Bonaléa">Bonaléa</option>
                                <option value="Dizangué">Dizangué</option>
                                <option value="Kribi">Kribi</option>
                                <option value="Lolodorf">Lolodorf</option>
                                <option value="Campo">Campo</option>
                                <option value="Union">Union</option>
                                <option value="Ndom">Ndom</option>
                                <option value="Muyuka">Muyuka</option>
                                <option value="Tiko">Tiko</option>
                                <option value="Mutengene">Mutengene</option>
                                <option value="Idenau">Idenau</option>
                                <option value="Ekona">Ekona</option>
                                <option value="Penabe">Penabe</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <!-- DURATION -->
                        <div id="durationField" class="md:col-span-2 hidden">
                            <label class="block text-sm font-medium text-gray-700">Durée du stage</label>
                            <input name="duration" type="text" placeholder="ex : 6 mois"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm px-3 py-2">
                        </div>
                    </div>
                </div>
                <!-- STEP 2: DESCRIPTION -->
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
                                <div class="flex gap-2 items-start mission-row">
                                    <input type="checkbox" class="custom-checkbox mt-2 hidden" aria-hidden="true">
                                    <input name="missions[]" type="text" class="flex-1 px-3 py-2 border rounded-lg"
                                        placeholder="Ex: Développement d'applications web">
                                    <button type="button"
                                        class="remove-mission text-red-600 px-3 py-1 rounded">Supprimer</button>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button id="addMissionBtn" type="button" class="text-blue-600 font-medium">+ Ajouter une
                                    mission</button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Compétences requises</label>
                            <div id="skillsContainer" class="flex flex-wrap gap-2 mt-2"></div>
                            <div class="mt-2 flex gap-2">
                                <input id="skillInput" type="text" placeholder="Tapez une compétence"
                                    class="flex-1 px-3 py-2 border rounded-lg">
                                <button id="addSkillBtn" type="button"
                                    class="px-3 py-2 bg-blue-600 text-white rounded-lg">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- STEP 3: PUBLICATION -->
                <div class="form-step hidden" data-step="2">
                    <h3 class="text-lg font-semibold mb-4">Publication</h3>
                    <div id="summaryBox" class="border rounded-lg p-4 bg-gray-50 text-sm text-gray-700">
                        <p class="text-gray-500">Aperçu de votre offre — cliquez sur « Publier l’offre » pour enregistrer.
                        </p>
                    </div>
                </div>
                <!-- NAV -->
                <div class="mt-6 flex items-center justify-between">
                    <button type="button" class="prev hidden px-4 py-2 rounded-lg border border-gray-300 text-gray-700">←
                        Précédent</button>
                    <div class="flex items-center gap-3">
                        <button type="button" class="next px-4 py-2 rounded-lg bg-blue-600 text-white">Suivant →</button>
                        <button type="submit" class="submit hidden px-4 py-2 rounded-lg bg-green-600 text-white">Publier
                            l’offre</button>
                    </div>
                </div>
            </form>
            <div id="toast" class="hidden fixed top-5 right-5 bg-green-600 text-white px-4 py-2 rounded shadow"></div>
        </div>
    </div>

    {{-- NOUVEAU: Modal Détails (lecture seule) --}}
    <div id="detailsModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div
            class="bg-white rounded-2xl shadow-xl w-full max-w-4xl p-6 overflow-auto relative max-h-[90vh] overflow-y-auto">
            <button id="closeDetailsModal"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl leading-none">✕</button>
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Détails de l'offre</h2>
            </div>
            <div id="detailsContent" class="space-y-4 text-sm text-gray-700">
                <!-- Contenu chargé dynamiquement -->
            </div>
        </div>
    </div>

    {{-- Styles --}}
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
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #EFF6FF;
            color: #1E40AF;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            font-size: 0.875rem;
        }

        .tag .remove-tag {
            display: inline-flex;
            width: 1rem;
            height: 1rem;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            background: rgba(30, 64, 175, 0.12);
            cursor: pointer;
        }
    </style>

    {{-- Script JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            /* ---------- Éléments ---------- */
            const modal = document.getElementById('offerModal');
            const detailsModal = document.getElementById('detailsModal');
            const closeModal = document.getElementById('closeModal');
            const closeDetailsModal = document.getElementById('closeDetailsModal');
            const openBtn = document.getElementById('openOfferModal');
            const modalTitle = document.getElementById('modalTitle');
            const progressContainer = document.getElementById('progressContainer');
            const steps = Array.from(document.querySelectorAll('.form-step'));
            const stepIndicators = Array.from(document.querySelectorAll('.step-indicator'));
            const progressFill = document.getElementById('progressFill');
            const nextBtn = document.querySelector('.next');
            const prevBtn = document.querySelector('.prev');
            const submitBtn = document.querySelector('.submit');
            const methodInput = document.getElementById('methodInput');
            const offerIdInput = document.getElementById('offerIdInput');
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
            const detailsContent = document.getElementById('detailsContent');
            const form = document.getElementById('offerForm');
            const tbody = document.getElementById('offersTableBody');
            const totalOffresSpan = document.getElementById('totalOffres');
            const currentPageCount = document.getElementById('currentPageCount');
            const totalCount = document.getElementById('totalCount');
            const departementSelect = document.getElementById('departementSelect');
            const departementCustomField = document.getElementById('departementCustomField');
            const departementCustom = document.getElementById('departementCustom');
            let currentStep = 0;
            let isEditMode = false;
            let editId = null;

            /* ---------- Modal open/close ---------- */
            function openModal(title = 'Publier une offre', hideProgress = false) {
                modalTitle.textContent = title;
                if (hideProgress) progressContainer.style.display = 'none';
                else progressContainer.style.display = 'block';
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                if (!isEditMode) updateUI();
            }

            function closeModalFn(resetForm = true) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                if (resetForm) {
                    form.reset();
                    currentStep = 0;
                    isEditMode = false;
                    editId = null;
                    methodInput.value = 'POST';
                    offerIdInput.value = '';
                    setAsStage(false);
                    departementCustomField.classList.add('hidden');
                    skillsContainer.innerHTML = '';
                    missionsContainer.innerHTML = createMissionRow().innerHTML; // Reset à 1 mission vide
                    progressContainer.style.display = 'block';
                    updateUI();
                }
            }
            openBtn.addEventListener('click', () => openModal());
            closeModal.addEventListener('click', () => closeModalFn());
            modal.addEventListener('click', e => {
                if (e.target === modal) closeModalFn();
            });

            /* ---------- Détails Modal ---------- */
            function openDetailsModal() {
                detailsModal.classList.remove('hidden');
                detailsModal.classList.add('flex');
            }

            function closeDetailsFn() {
                detailsModal.classList.add('hidden');
                detailsModal.classList.remove('flex');
                detailsContent.innerHTML = '';
            }
            closeDetailsModal.addEventListener('click', closeDetailsFn);
            detailsModal.addEventListener('click', e => {
                if (e.target === detailsModal) closeDetailsFn();
            });

            /* ---------- Logique Département ---------- */
            departementSelect.addEventListener('change', function() {
                if (this.value === 'Autre') {
                    departementCustomField.classList.remove('hidden');
                    departementCustom.focus();
                } else {
                    departementCustomField.classList.add('hidden');
                    departementCustom.value = '';
                }
            });

            /* ---------- Progress & Steps ---------- */
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
                steps.forEach((s, i) => s.classList.toggle('hidden', i !== index));
                prevBtn.classList.toggle('hidden', index === 0);
                nextBtn.classList.toggle('hidden', index === steps.length - 1);
                submitBtn.classList.toggle('hidden', index !== steps.length - 1);
                updateProgress();
                if (index === 2) populateSummary();
            }

            function updateUI() {
                showStep(currentStep);
            }
            nextBtn.addEventListener('click', function() {
                if (currentStep === 0) {
                    const title = document.getElementById('title').value.trim();
                    if (!title) {
                        alert('Veuillez saisir l\'intitulé du poste.');
                        return;
                    }
                }
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                    modal.querySelector('div[role="dialog"]')?.scrollTo?.(0, 0);
                }
            });
            prevBtn.addEventListener('click', function() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
            stepIndicators.forEach(ind => {
                ind.style.cursor = 'pointer';
                ind.addEventListener('click', function() {
                    const idx = Number(this.dataset.step);
                    currentStep = idx;
                    showStep(currentStep);
                });
            });

            /* ---------- Missions ---------- */
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
            addMissionBtn.addEventListener('click', function() {
                missionsContainer.appendChild(createMissionRow(''));
                const last = missionsContainer.querySelector('.mission-row:last-child input');
                if (last) last.focus();
            });
            missionsContainer.addEventListener('click', e => {
                if (e.target.classList.contains('remove-mission')) {
                    e.target.closest('.mission-row').remove();
                }
            });

            /* ---------- Skills ---------- */
            function createSkillTag(skillText, removable = true) {
                const tag = document.createElement('span');
                tag.className = 'tag';
                const spanText = document.createElement('span');
                spanText.textContent = skillText;
                if (removable) {
                    const remove = document.createElement('span');
                    remove.className = 'remove-tag ml-2';
                    remove.innerHTML = '✕';
                    remove.addEventListener('click', () => tag.remove());
                    tag.appendChild(remove);
                }
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'skills[]';
                hidden.value = skillText;
                tag.appendChild(spanText);
                tag.appendChild(hidden);
                return tag;
            }
            addSkillBtn.addEventListener('click', function() {
                const v = skillInput.value.trim();
                if (!v) return;
                const existing = Array.from(skillsContainer.querySelectorAll('input[name="skills[]"]'))
                    .some(i => i.value.toLowerCase() === v.toLowerCase());
                if (existing) {
                    skillInput.value = '';
                    return;
                }
                const tag = createSkillTag(v);
                skillsContainer.appendChild(tag);
                skillInput.value = '';
                skillInput.focus();
            });
            skillInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addSkillBtn.click();
                }
            });

            /* ---------- Toggle Offre/Stage ---------- */
            function setAsStage(isStage) {
                if (isStage) {
                    tabStage.classList.add('bg-blue-600', 'text-white');
                    tabStage.classList.remove('text-gray-600');
                    tabOffre.classList.remove('bg-blue-600', 'text-white');
                    tabOffre.classList.add('text-gray-600');
                    durationField.classList.remove('hidden');
                    contractRadios.forEach(r => {
                        if (r.value === 'Stage') r.checked = true;
                    });
                } else {
                    tabOffre.classList.add('bg-blue-600', 'text-white');
                    tabOffre.classList.remove('text-gray-600');
                    tabStage.classList.remove('bg-blue-600', 'text-white');
                    tabStage.classList.add('text-gray-600');
                    durationField.classList.add('hidden');
                    contractRadios.forEach(r => {
                        if (r.value === 'CDI') r.checked = true;
                    });
                }
            }
            tabOffre.addEventListener('click', () => setAsStage(false));
            tabStage.addEventListener('click', () => setAsStage(true));
            contractRadios.forEach(r => {
                r.addEventListener('change', function() {
                    if (this.value === 'Stage') {
                        durationField.classList.remove('hidden');
                        tabStage.classList.add('bg-blue-600', 'text-white');
                        tabOffre.classList.remove('bg-blue-600', 'text-white');
                    } else {
                        durationField.classList.add('hidden');
                        tabOffre.classList.add('bg-blue-600', 'text-white');
                        tabStage.classList.remove('bg-blue-600', 'text-white');
                    }
                });
            });

            /* ---------- Summary ---------- */
            function populateSummary() {
                const title = document.getElementById('title')?.value.trim() || '';
                const contract = Array.from(contractRadios).find(r => r.checked)?.value || '';
                const start = form.querySelector('input[name="start_date"]')?.value || '';
                const salary = form.querySelector('input[name="salary"]')?.value || '';
                const education = form.querySelector('select[name="education_level"]')?.value || '';
                const departement = departementCustom.value.trim() || departementSelect.value || '';
                const ville = form.querySelector('select[name="ville"]')?.value || '';
                const desc = document.getElementById('description')?.value.trim() || '';
                const missions = Array.from(document.querySelectorAll('input[name="missions[]"]')).map(i => i.value)
                    .filter(Boolean);
                const skills = Array.from(document.querySelectorAll('input[name="skills[]"]')).map(i => i.value)
                    .filter(Boolean);
                let html = `<div class="mb-2"><strong>Titre :</strong> ${escapeHtml(title)}</div>`;
                html += `<div class="mb-2"><strong>Type :</strong> ${escapeHtml(contract)}</div>`;
                if (departement) html +=
                    `<div class="mb-2"><strong>Département :</strong> ${escapeHtml(departement)}</div>`;
                if (ville) html += `<div class="mb-2"><strong>Ville :</strong> ${escapeHtml(ville)}</div>`;
                if (durationField.classList.contains('hidden') === false) {
                    const dur = form.querySelector('input[name="duration"]').value || '';
                    html += `<div class="mb-2"><strong>Durée (stage) :</strong> ${escapeHtml(dur)}</div>`;
                }
                if (start) html += `<div class="mb-2"><strong>Date début :</strong> ${escapeHtml(start)}</div>`;
                if (salary) html += `<div class="mb-2"><strong>Rémunération :</strong> ${escapeHtml(salary)}</div>`;
                if (education) html += `<div class="mb-2"><strong>Niveau :</strong> ${escapeHtml(education)}</div>`;
                if (desc) html +=
                    `<div class="mb-2"><strong>Description :</strong><div class="mt-1 text-gray-700">${escapeHtml(desc)}</div></div>`;
                if (missions.length) {
                    html += `<div class="mb-2"><strong>Missions :</strong><ul class="list-disc ml-6">` + missions
                        .map(m => `<li>${escapeHtml(m)}</li>`).join('') + `</ul></div>`;
                }
                if (skills.length) {
                    html +=
                        `<div><strong>Compétences :</strong> ${skills.map(s => `<span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded mr-1">${escapeHtml(s)}</span>`).join('')}</div>`;
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
                return text.replace(/[&<>"']/g, function(m) {
                    return map[m];
                });
            }

            /* ---------- Chargement dynamique des offres ---------- */
            function loadOffres() {
                fetch("{{ route('offres.index') }}", {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(offres => {
                        tbody.innerHTML = '';
                        offres.forEach(offre => {
                            const row = createTableRow(offre);
                            tbody.appendChild(row);
                        });
                        totalOffresSpan.textContent = `${offres.length} offres au total`;
                        currentPageCount.textContent = offres.length;
                        totalCount.textContent = offres.length;
                        attachTableListeners(); // Attacher les listeners après chargement
                    })
                    .catch(error => {
                        console.error('Erreur chargement offres:', error);
                        tbody.innerHTML =
                            '<tr><td colspan="6" class="text-center py-4 text-gray-500">Erreur de chargement</td></tr>';
                    });
            }

            /* ---------- Créer une ligne de tableau ---------- */
            function createTableRow(offre) {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-gray-50';
                tr.dataset.offreId = offre.id; // Pour cibler la ligne si besoin
                const statutClass = offre.status === 'published' ? 'bg-green-100 text-green-800' :
                    'bg-gray-100 text-gray-800';
                const statutText = offre.status === 'published' ? 'Ouverte' : 'Fermée';
                const datePub = new Date(offre.created_at).toLocaleDateString('fr-FR', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });
                const sousTitre = `${offre.contract_type} • ${offre.ville || 'Non spécifiée'}`;
                const departement = offre.departement || 'Non spécifié';

                tr.innerHTML = `
      <td class="px-6 py-4 whitespace-nowrap">
        <div class="font-medium text-gray-900">${escapeHtml(offre.title)}</div>
        <div class="text-sm text-gray-500">${sousTitre}</div>
      </td>
      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${departement}</td>
      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${datePub}</td>
      <td class="px-6 py-4 whitespace-nowrap">
        <span class="${statutClass} text-xs font-medium px-3 py-1 rounded-full">${statutText}</span>
      </td>
      <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
          <span class="text-sm font-medium text-gray-900">0</span>
          <div class="w-4 h-4 flex items-center justify-center ml-2">
            <i class="ri-user-line text-gray-400 text-xs"></i>
          </div>
        </div>
      </td>
      <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center space-x-2">
          <button class="details-btn text-blue-600 hover:text-blue-800 text-sm font-medium !rounded-button whitespace-nowrap" data-id="${offre.id}">Détails</button>
          <button class="edit-btn text-gray-600 hover:text-gray-800 text-sm font-medium !rounded-button whitespace-nowrap" data-id="${offre.id}">Modifier</button>
          <button class="delete-btn text-red-600 hover:text-red-800 text-sm font-medium !rounded-button whitespace-nowrap" data-id="${offre.id}">Supprimer</button>
        </div>
      </td>
    `;
                return tr;
            }

            /* ---------- NOUVEAU: Attacher listeners aux boutons du tableau ---------- */
            function attachTableListeners() {
                // Détails
                document.querySelectorAll('.details-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.dataset.id;
                        loadOffreForDetails(id);
                    });
                });
                // Modifier
                document.querySelectorAll('.edit-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.dataset.id;
                        loadOffreForEdit(id);
                    });
                });
                // Supprimer
                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.dataset.id;
                        if (confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')) {
                            deleteOffre(id);
                        }
                    });
                });
            }

            /* ---------- NOUVEAU: Charger pour Détails ---------- */
            function loadOffreForDetails(id) {
                fetch(`{{ url('offres') }}/${id}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(offre => {
                        let html = `<div class="grid grid-cols-1 md:grid-cols-2 gap-4">`;
                        html += `<div><strong>Titre :</strong> ${escapeHtml(offre.title)}</div>`;
                        html += `<div><strong>Type :</strong> ${escapeHtml(offre.contract_type)}</div>`;
                        html +=
                            `<div><strong>Département :</strong> ${escapeHtml(offre.departement || 'Non spécifié')}</div>`;
                        html +=
                            `<div><strong>Ville :</strong> ${escapeHtml(offre.ville || 'Non spécifiée')}</div>`;
                        if (offre.duration) html +=
                            `<div><strong>Durée :</strong> ${escapeHtml(offre.duration)}</div>`;
                        if (offre.start_date) html +=
                            `<div><strong>Date début :</strong> ${new Date(offre.start_date).toLocaleDateString('fr-FR')}</div>`;
                        if (offre.salary) html +=
                            `<div><strong>Rémunération :</strong> ${escapeHtml(offre.salary)}</div>`;
                        if (offre.education_level) html +=
                            `<div><strong>Niveau :</strong> ${escapeHtml(offre.education_level)}</div>`;
                        html += `</div>`;
                        html +=
                            `<div class="mt-4"><strong>Description :</strong><p class="mt-1">${escapeHtml(offre.description)}</p></div>`;
                        if (offre.missions && offre.missions.length) {
                            html += `<div class="mt-4"><strong>Missions :</strong><ul class="list-disc ml-6">`;
                            offre.missions.forEach(m => html += `<li>${escapeHtml(m)}</li>`);
                            html += `</ul></div>`;
                        }
                        if (offre.skills && offre.skills.length) {
                            html +=
                                `<div class="mt-4"><strong>Compétences :</strong><div class="flex flex-wrap gap-2 mt-1">`;
                            offre.skills.forEach(s => html +=
                                `<span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded">${escapeHtml(s)}</span>`
                                );
                            html += `</div></div>`;
                        }
                        detailsContent.innerHTML = html;
                        openDetailsModal();
                    })
                    .catch(error => {
                        console.error('Erreur chargement détails:', error);
                        alert('Erreur lors du chargement des détails');
                    });
            }

            /* ---------- NOUVEAU: Charger pour Édition ---------- */
            function loadOffreForEdit(id) {
                fetch(`{{ url('offres') }}/${id}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(offre => {
                        // Pré-remplir champs
                        document.getElementById('title').value = offre.title;
                        document.querySelector(`input[name="contract_type"][value="${offre.contract_type}"]`)
                            .checked = true;
                        if (offre.start_date) form.querySelector('input[name="start_date"]').value = offre
                            .start_date;
                        if (offre.salary) form.querySelector('input[name="salary"]').value = offre.salary;
                        form.querySelector('select[name="education_level"]').value = offre.education_level ||
                        '';
                        const departement = offre.departement;
                        if (departement === 'Autre' || !['Informatique', 'Marketing', 'Finance',
                                'Ressources Humaines', 'Design', 'Stratégie', 'Ventes'
                            ].includes(departement)) {
                            departementSelect.value = 'Autre';
                            departementCustom.value = departement;
                            departementCustomField.classList.remove('hidden');
                        } else {
                            departementSelect.value = departement;
                        }
                        form.querySelector('select[name="ville"]').value = offre.ville || '';
                        if (offre.duration) {
                            form.querySelector('input[name="duration"]').value = offre.duration;
                            setAsStage(true); // Si stage
                        }
                        document.getElementById('description').value = offre.description || '';

                        // Missions
                        missionsContainer.innerHTML = '';
                        if (offre.missions && offre.missions.length) {
                            offre.missions.forEach(m => missionsContainer.appendChild(createMissionRow(m)));
                        } else {
                            missionsContainer.appendChild(createMissionRow());
                        }

                        // Skills
                        skillsContainer.innerHTML = '';
                        if (offre.skills && offre.skills.length) {
                            offre.skills.forEach(s => skillsContainer.appendChild(createSkillTag(s,
                            true))); // Removable en édition
                        }

                        // Set mode édition
                        isEditMode = true;
                        editId = id;
                        methodInput.value = 'PUT';
                        offerIdInput.value = id;

                        // Ouvrir modal
                        openModal('Modifier l\'offre', true); // Pas de progress en édition
                        currentStep = 0;
                        showStep(0);
                    })
                    .catch(error => {
                        console.error('Erreur chargement édition:', error);
                        alert('Erreur lors du chargement pour édition');
                    });
            }

            /* ---------- NOUVEAU: Supprimer Offre ---------- */
            function deleteOffre(id) {
                fetch(`{{ url('offres') }}/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            showToast(result.message, 'bg-green-600');
                            loadOffres();
                        } else {
                            alert('Erreur lors de la suppression');
                        }
                    })
                    .catch(error => {
                        console.error('Erreur suppression:', error);
                        alert('Une erreur est survenue');
                    });
            }

            /* ---------- Soumission AJAX (gère create/update) ---------- */
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const title = document.getElementById('title').value.trim();
                const desc = document.getElementById('description').value.trim();
                if (!title || !desc) {
                    alert('Veuillez remplir l\'intitulé et la description.');
                    currentStep = !title ? 0 : 1;
                    showStep(currentStep);
                    return;
                }

                const url = isEditMode ? `{{ url('offres') }}/${editId}` :
                "{{ route('offres.store') }}";
                const method = isEditMode ? 'PUT' : 'POST';
                const formData = new FormData(form);

                try {
                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                                .value,
                            "Accept": "application/json"
                        },
                        body: formData
                    });
                    const result = await response.json();
                    if (result.success) {
                        showToast(result.message, 'bg-green-600');
                        closeModalFn();
                        loadOffres();
                    } else {
                        alert("Erreur: " + (result.message || 'Vérifiez les données'));
                    }
                } catch (error) {
                    console.error(error);
                    alert("Une erreur est survenue");
                }
            });

            /* ---------- Toast utilitaire ---------- */
            function showToast(message, bgClass = 'bg-green-600') {
                const toast = document.getElementById("toast");
                toast.textContent = message;
                toast.className = `fixed top-5 right-5 ${bgClass} text-white px-4 py-2 rounded shadow`;
                toast.classList.remove("hidden");
                setTimeout(() => toast.classList.add("hidden"), 3000);
            }

            /* ---------- Initialisation ---------- */
            updateUI();
            loadOffres();
        });
    </script>
@endsection
