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

        .action-button:hover:not(:disabled) {
            background-color: #f3f4f6;
        }

        .action-button:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .status-badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
        }

        .status-nouveau {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-en-cours {
            background-color: #fed7aa;
            color: #9a3412;
        }

        .status-refuse {
            background-color: #fecaca;
            color: #991b1b;
        }

        .status-accepte {
            background-color: #d1fae5;
            color: #065f46;
        }

        @keyframes slide-in {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slide-out {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        .animate-slide-in {
            animation: slide-in 0.3s ease-out;
        }
    </style>

    <main class="flex-1 overflow-y-auto p-6">
        <div class="flex gap-6">
            <div class="flex-1">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Mes Candidatures</h1>
                    <p class="text-gray-600">Gérez et suivez toutes vos candidatures d'emploi</p>
                </div>

                <!-- Statistiques -->
                <div class="grid grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Total Candidatures</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['total'] }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-blue-600">description</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Nouvelles</p>
                                <p class="text-3xl font-bold text-yellow-600">{{ $stats['nouveau'] }}</p>
                            </div>
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-yellow-600">new_releases</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">En cours</p>
                                <p class="text-3xl font-bold text-orange-600">{{ $stats['en_cours'] }}</p>
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
                                <p class="text-3xl font-bold text-green-600">{{ $stats['accepte'] }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-green-600">check_circle</span>
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
                                    class="filter-button active px-4 py-2 rounded-lg text-sm font-medium bg-[#3B82F6] text-white"
                                    data-filter="all">
                                    Tous
                                </button>
                                <button
                                    class="filter-button px-4 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200"
                                    data-filter="nouveau">
                                    Nouvelles
                                </button>
                                <button
                                    class="filter-button px-4 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200"
                                    data-filter="en-cours">
                                    En cours
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
                            <a href="{{ route('candidat.offres') }}"
                                class="flex items-center space-x-2 px-4 py-2 text-sm font-medium text-white bg-[#3B82F6] rounded-[10px] hover:bg-blue-600 whitespace-nowrap">
                                <span class="material-symbols-outlined">add</span>
                                <span>Nouvelle candidature</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Applications Table -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-800">Liste des Candidatures</h2>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $candidatures->total() }} Résultats
                            </span>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full" id="applicationsTable">
                            <thead class="bg-gray-50">
                                <tr>
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
                                @forelse($candidatures as $candidature)
                                    <tr data-status="{{ $candidature->statut }}"
                                        data-company="{{ $candidature->offre->entreprise->nom_entreprise ?? '' }}"
                                        data-date="{{ $candidature->created_at->format('Y-m-d') }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                    <span class="text-sm font-medium text-blue-600">
                                                        {{ strtoupper(substr($candidature->offre->entreprise->nom_entreprise ?? 'XX', 0, 2)) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $candidature->offre->entreprise->nom_entreprise ?? 'Entreprise' }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $candidature->offre->departement ?? 'Secteur' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $candidature->offre->title }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $candidature->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusClasses = [
                                                    'nouveau' => 'status-nouveau',
                                                    'en-cours' => 'status-en-cours',
                                                    'accepte' => 'status-accepte',
                                                    'refuse' => 'status-refuse',
                                                ];
                                                $statusLabels = [
                                                    'nouveau' => 'Nouvelle',
                                                    'en-cours' => 'En cours',
                                                    'accepte' => 'Acceptée',
                                                    'refuse' => 'Refusée',
                                                ];
                                            @endphp
                                            <span
                                                class="status-badge {{ $statusClasses[$candidature->statut] ?? 'status-nouveau' }}">
                                                {{ $statusLabels[$candidature->statut] ?? 'Nouveau' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-2">
                                                <button onclick="viewDetails({{ $candidature->id }})"
                                                    class="action-button text-blue-600 hover:text-blue-800"
                                                    title="Voir détails">
                                                    <span class="material-symbols-outlined">visibility</span>
                                                </button>
                                                @if ($candidature->statut !== 'accepte')
                                                    <button onclick="confirmDelete({{ $candidature->id }})"
                                                        class="action-button text-red-600 hover:text-red-800"
                                                        title="Retirer">
                                                        <span class="material-symbols-outlined">delete</span>
                                                    </button>
                                                @else
                                                    <button class="action-button text-gray-400"
                                                        title="Candidature acceptée" disabled>
                                                        <span class="material-symbols-outlined">delete</span>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center space-y-3">
                                                <span class="material-symbols-outlined text-6xl text-gray-300">inbox</span>
                                                <p class="text-lg font-medium">Aucune candidature pour le moment</p>
                                                <p class="text-sm text-gray-400">Commencez à postuler aux offres qui vous
                                                    intéressent</p>
                                                <a href="{{ route('candidat.offres') }}"
                                                    class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                                    Voir les offres
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($candidatures->hasPages())
                        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                Affichage de <span class="font-medium mx-1">{{ $candidatures->firstItem() }}</span> à
                                <span class="font-medium mx-1">{{ $candidatures->lastItem() }}</span> sur
                                <span class="font-medium mx-1">{{ $candidatures->total() }}</span> résultats
                            </div>
                            <div class="flex items-center space-x-2">
                                {{ $candidatures->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    @include('candidat.partials.candidature-details-modal')

    <script>
        // Fonction CSRF Token
        function getCsrfToken() {
            const metaTag = document.querySelector('meta[name="csrf-token"]');
            return metaTag ? metaTag.getAttribute('content') : '';
        }

        // Filtrage
        document.addEventListener("DOMContentLoaded", function() {
            const filterButtons = document.querySelectorAll(".filter-button");
            const tableRows = document.querySelectorAll("#applicationsTable tbody tr");

            filterButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    filterButtons.forEach((btn) => {
                        btn.classList.remove("active", "bg-[#3B82F6]", "text-white");
                        btn.classList.add("text-gray-700", "bg-gray-100");
                    });

                    this.classList.add("active", "bg-[#3B82F6]", "text-white");
                    this.classList.remove("text-gray-700", "bg-gray-100");

                    const filter = this.getAttribute("data-filter");

                    tableRows.forEach((row) => {
                        if (filter === "all" || row.getAttribute("data-status") ===
                            filter) {
                            row.style.display = "";
                        } else {
                            row.style.display = "none";
                        }
                    });
                });
            });
        });

        // Dropdown tri
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
        });

        // Voir détails
        async function viewDetails(candidatureId) {
            try {
                const response = await fetch(`/candidat/candidatures/${candidatureId}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                });

                if (!response.ok) throw new Error('Erreur lors du chargement');

                const data = await response.json();
                showDetailsModal(data);
            } catch (error) {
                console.error('Erreur:', error);
                showNotification('error', 'Impossible de charger les détails');
            }
        }

        // Confirmer suppression
        function confirmDelete(candidatureId) {
            if (confirm('Êtes-vous sûr de vouloir retirer cette candidature ?')) {
                deleteCandidature(candidatureId);
            }
        }

        // Supprimer candidature
        async function deleteCandidature(candidatureId) {
            try {
                const response = await fetch(`/candidat/candidatures/${candidatureId}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    showNotification('success', data.message);
                    setTimeout(() => window.location.reload(), 1500);
                } else {
                    showNotification('error', data.message);
                }
            } catch (error) {
                console.error('Erreur:', error);
                showNotification('error', 'Erreur lors de la suppression');
            }
        }

        // Notification
        function showNotification(type, message) {
            const colors = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                info: 'bg-blue-500'
            };

            const icons = {
                success: 'check_circle',
                error: 'error',
                info: 'info'
            };

            const notification = document.createElement('div');
            notification.className =
                `fixed top-4 right-4 ${colors[type]} text-white px-6 py-4 rounded-lg shadow-lg z-[100] flex items-center space-x-3 animate-slide-in`;
            notification.innerHTML = `
                <span class="material-symbols-outlined">${icons[type]}</span>
                <span>${message}</span>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slide-out 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Afficher le modal des détails
        function showDetailsModal(data) {
            // Population des champs
            document.getElementById('modalOffreTitle').textContent = data.offre.title || '-';
            document.getElementById('modalEntrepriseName').textContent = data.offre.entreprise.nom_entreprise || '-';
            document.getElementById('modalPoste').textContent = data.offre.title || '-';
            document.getElementById('modalLieu').textContent = data.offre.lieu || '-';
            document.getElementById('modalTypeContrat').textContent = data.offre.type_contrat || '-';
            document.getElementById('modalSalaire').textContent = data.offre.salaire ? `${data.offre.salaire} €/an` :
                'Non spécifié';
            document.getElementById('modalDescription').textContent = data.offre.description ||
                'Aucune description disponible.';
            document.getElementById('modalDateCandidature').textContent = new Date(data.candidature.created_at)
                .toLocaleDateString('fr-FR');
            document.getElementById('modalCV').textContent = data.candidature.cv ? 'Oui (téléchargeable)' : 'Non fourni';
            document.getElementById('modalLettreMotivation').textContent = data.candidature.lettre_motivation ?
                'Oui (téléchargeable)' : 'Non fournie';

            // Statut
            const statusMap = {
                'nouveau': {
                    class: 'bg-yellow-100 text-yellow-800',
                    text: 'Nouvelle'
                },
                'en-cours': {
                    class: 'bg-orange-100 text-orange-800',
                    text: 'En cours'
                },
                'accepte': {
                    class: 'bg-green-100 text-green-800',
                    text: 'Acceptée'
                },
                'refuse': {
                    class: 'bg-red-100 text-red-800',
                    text: 'Refusée'
                }
            };
            const statutEl = document.getElementById('detailStatut');
            const status = data.candidature.statut;
            const statusConfig = statusMap[status] || statusMap['nouveau'];
            statutEl.textContent = statusConfig.text;
            statutEl.className = `inline-flex px-4 py-2 rounded-full text-sm font-medium ${statusConfig.class}`;

            // Commentaire recruteur (si présent et statut en cours ou refusé)
            const commentaireEl = document.getElementById('modalCommentaireRecruteur');
            if (data.candidature.commentaire && (status === 'en-cours' || status === 'refuse')) {
                document.getElementById('modalCommentaireText').textContent = data.candidature.commentaire;
                commentaireEl.classList.remove('hidden');
            } else {
                commentaireEl.classList.add('hidden');
            }

            // Bouton d'action (ex: lien vers offre complète si non acceptée)
            const actionBtn = document.getElementById('actionBtn');
            if (status !== 'accepte') {
                actionBtn.classList.remove('hidden');
                actionBtn.onclick = () => window.location.href = `/offres/${data.offre.id}`;
            } else {
                actionBtn.classList.add('hidden');
            }

            // Afficher le modal
            document.getElementById('detailsModal').classList.remove('hidden');
        }

        // Fermer le modal
        function closeDetailsModal() {
            document.getElementById('detailsModal').classList.add('hidden');
        }

        // Action personnalisée (exemple: redirection vers offre)
        function performAction() {
            // Logique personnalisée ici, ou redirection
            closeDetailsModal();
        }

        // Fermer modal au clic extérieur
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('detailsModal');
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeDetailsModal();
                }
            });
        });
    </script>
@endsection
