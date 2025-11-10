<!-- Modal Détails Candidature -->
<div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <span class="material-symbols-outlined text-4xl">person</span>
                    </div>
                    <div>
                        <h2 id="modalCandidatName" class="text-2xl font-bold">-</h2>
                        <p id="modalCandidatEmail" class="text-blue-100 mt-1">-</p>
                    </div>
                </div>
                <button onclick="closeDetailsModal()" class="text-white hover:text-gray-200 transition-colors">
                    <span class="material-symbols-outlined text-3xl">close</span>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="overflow-y-auto" style="max-height: calc(90vh - 200px);">
            <!-- Informations principales -->
            <div class="p-6 border-b border-gray-200">
                <div class="grid grid-cols-2 gap-6">
                    <!-- Colonne gauche -->
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Informations de
                                Contact</h3>
                            <div class="space-y-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-blue-600">mail</span>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Email</p>
                                        <p id="detailEmail" class="text-sm font-medium text-gray-900">-</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-green-600">phone</span>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Téléphone</p>
                                        <p id="detailTelephone" class="text-sm font-medium text-gray-900">-</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-purple-600">location_on</span>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Ville</p>
                                        <p id="detailVille" class="text-sm font-medium text-gray-900">-</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Formation</h3>
                            <div class="space-y-2">
                                <div class="flex items-center space-x-2">
                                    <span class="material-symbols-outlined text-gray-400 text-sm">school</span>
                                    <span class="text-sm text-gray-600">Niveau d'étude:</span>
                                    <span id="detailNiveauEtude" class="text-sm font-medium text-gray-900">-</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="material-symbols-outlined text-gray-400 text-sm">work</span>
                                    <span class="text-sm text-gray-600">Domaine:</span>
                                    <span id="detailDomaine" class="text-sm font-medium text-gray-900">-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne droite -->
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Offre
                                Candidatée</h3>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p id="detailOffreTitre" class="font-semibold text-gray-900 text-lg mb-1">-</p>
                                <div class="flex items-center space-x-3 text-sm text-gray-600">
                                    <span id="detailOffreContrat">-</span>
                                    <span>•</span>
                                    <span id="detailOffreVille">-</span>
                                </div>
                                <div class="mt-3 text-sm text-gray-600 flex items-center space-x-1">
                                    <span class="material-symbols-outlined text-xs">event</span>
                                    <span>Candidature envoyée le</span>
                                    <span id="detailDateCandidature" class="font-medium text-gray-900">-</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Statut</h3>
                            <div id="detailStatutBadge"
                                class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium">
                                -
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Documents</h3>
                            <div id="detailCVSection" class="space-y-2">
                                <!-- CV dynamiquement ajouté -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Compétences -->
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Compétences</h3>
                <div id="detailCompetences" class="flex flex-wrap gap-2">
                    <!-- Compétences dynamiquement ajoutées -->
                </div>
            </div>

            <!-- Lettre de motivation -->
            <div class="p-6 bg-gray-50">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3 flex items-center">
                    <span class="material-symbols-outlined mr-2">edit_note</span>
                    Lettre de Motivation
                </h3>
                <div id="detailLettreMotivation"
                    class="bg-white rounded-lg p-4 border border-gray-200 min-h-[150px] max-h-[300px] overflow-y-auto text-sm text-gray-700 leading-relaxed">
                    <!-- Lettre dynamiquement ajoutée -->
                </div>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <button onclick="closeDetailsModal()"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors">
                    Fermer
                </button>
                <div id="detailActions" class="flex items-center space-x-3">
                    <!-- Actions dynamiquement ajoutées -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmation d'Action -->
<div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[60] flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6">
        <div class="text-center">
            <div id="confirmIcon" class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                <span class="material-symbols-outlined text-4xl"></span>
            </div>
            <h3 id="confirmTitle" class="text-xl font-bold text-gray-900 mb-2">-</h3>
            <p id="confirmMessage" class="text-gray-600 mb-6">-</p>
            <div class="flex items-center space-x-3">
                <button onclick="closeConfirmModal()"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Annuler
                </button>
                <button id="confirmActionBtn" class="flex-1 px-4 py-2 rounded-lg text-white transition-colors">
                    Confirmer
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animation du modal */
    #detailsModal.show,
    #confirmModal.show {
        animation: fadeIn 0.2s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Style pour la lettre de motivation */
    #detailLettreMotivation {
        font-family: Georgia, 'Times New Roman', serif;
    }

    #detailLettreMotivation p {
        margin-bottom: 1em;
    }

    #detailLettreMotivation strong {
        font-weight: 600;
    }

    #detailLettreMotivation em {
        font-style: italic;
    }

    #detailLettreMotivation ul,
    #detailLettreMotivation ol {
        margin-left: 1.5em;
        margin-bottom: 1em;
    }

    /* Scrollbar personnalisée */
    #detailLettreMotivation::-webkit-scrollbar {
        width: 6px;
    }

    #detailLettreMotivation::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    #detailLettreMotivation::-webkit-scrollbar-thumb {
        background: #cbd5e0;
        border-radius: 3px;
    }

    #detailLettreMotivation::-webkit-scrollbar-thumb:hover {
        background: #a0aec0;
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

<script>
    let currentCandidatureId = null;

    async function viewDetails(candidatureId) {
        currentCandidatureId = candidatureId;

        try {
            const response = await fetch(`/entreprise/candidatures/${candidatureId}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) {
                throw new Error('Erreur lors du chargement des détails');
            }

            const data = await response.json();
            console.log('Données reçues:', data);

            // Remplir le modal avec les données
            document.getElementById('modalCandidatName').textContent = data.candidat.user.name;
            document.getElementById('modalCandidatEmail').textContent = data.candidat.user.email;
            document.getElementById('detailEmail').textContent = data.candidat.user.email;
            document.getElementById('detailTelephone').textContent = data.candidat.telephone || 'Non renseigné';
            document.getElementById('detailVille').textContent = data.candidat.ville || 'Non renseignée';
            document.getElementById('detailNiveauEtude').textContent = data.candidat.niveau_etude ||
            'Non renseigné';
            document.getElementById('detailDomaine').textContent = data.candidat.domaine_activite ||
            'Non renseigné';

            // Offre
            document.getElementById('detailOffreTitre').textContent = data.offre.title;
            document.getElementById('detailOffreContrat').textContent = data.offre.contract_type || 'Non spécifié';
            document.getElementById('detailOffreVille').textContent = data.offre.ville || 'Non spécifiée';

            // Date candidature
            const date = new Date(data.created_at);
            const dateFormatted = date.toLocaleDateString('fr-FR', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
            document.getElementById('detailDateCandidature').textContent = dateFormatted;

            // Statut
            const statutBadge = document.getElementById('detailStatutBadge');
            const statutColors = {
                'nouveau': 'bg-yellow-100 text-yellow-800',
                'en-cours': 'bg-orange-100 text-orange-800',
                'accepte': 'bg-green-100 text-green-800',
                'refuse': 'bg-red-100 text-red-800'
            };
            const statutLabels = {
                'nouveau': 'Nouveau',
                'en-cours': 'En cours d\'examen',
                'accepte': 'Accepté',
                'refuse': 'Refusé'
            };
            statutBadge.className =
                `inline-flex items-center px-4 py-2 rounded-full text-sm font-medium ${statutColors[data.statut]}`;
            statutBadge.textContent = statutLabels[data.statut];

            // CV
            const cvSection = document.getElementById('detailCVSection');
            if (data.cv_path) {
                cvSection.innerHTML = `
                <a href="/storage/${data.cv_path}" target="_blank"
                   class="flex items-center space-x-3 p-3 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition-colors">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white">description</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">CV du candidat</p>
                        <p class="text-xs text-gray-500">Cliquez pour télécharger</p>
                    </div>
                    <span class="material-symbols-outlined text-blue-600">download</span>
                </a>
            `;
            } else {
                cvSection.innerHTML = `
                <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg text-center text-sm text-gray-500">
                    Aucun CV fourni
                </div>
            `;
            }

            // Compétences
            const competencesDiv = document.getElementById('detailCompetences');
            if (data.candidat.competences && data.candidat.competences.length > 0) {
                competencesDiv.innerHTML = data.candidat.competences.map(comp =>
                    `<span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full font-medium">${comp}</span>`
                ).join('');
            } else {
                competencesDiv.innerHTML =
                '<span class="text-sm text-gray-500">Aucune compétence renseignée</span>';
            }

            // Lettre de motivation
            const lettreDiv = document.getElementById('detailLettreMotivation');
            if (data.lettre_motivation) {
                lettreDiv.innerHTML = data.lettre_motivation;
            } else {
                lettreDiv.innerHTML =
                    '<p class="text-gray-500 italic text-center py-8">Aucune lettre de motivation fournie</p>';
            }

            // Actions
            const actionsDiv = document.getElementById('detailActions');
            if (data.statut === 'nouveau' || data.statut === 'en-cours') {
                actionsDiv.innerHTML = `
                <button onclick="showConfirmAction('accepte')"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center space-x-2">
                    <span class="material-symbols-outlined">check_circle</span>
                    <span>Accepter</span>
                </button>
                <button onclick="showConfirmAction('refuse')"
                        class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors flex items-center space-x-2">
                    <span class="material-symbols-outlined">cancel</span>
                    <span>Refuser</span>
                </button>
            `;
            } else {
                actionsDiv.innerHTML = `
                <span class="text-sm text-gray-500 italic">
                    Candidature ${statutLabels[data.statut].toLowerCase()}
                </span>
            `;
            }

            // Afficher le modal
            const modal = document.getElementById('detailsModal');
            modal.classList.remove('hidden');
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';

        } catch (error) {
            console.error('Erreur:', error);
            showNotification('error', 'Erreur lors du chargement des détails: ' + error.message);
        }
    }

    function closeDetailsModal() {
        const modal = document.getElementById('detailsModal');
        modal.classList.add('hidden');
        modal.classList.remove('show');
        document.body.style.overflow = 'auto';
        currentCandidatureId = null;
    }

    function showConfirmAction(action) {
        const confirmModal = document.getElementById('confirmModal');
        const confirmIcon = document.getElementById('confirmIcon');
        const confirmTitle = document.getElementById('confirmTitle');
        const confirmMessage = document.getElementById('confirmMessage');
        const confirmBtn = document.getElementById('confirmActionBtn');

        if (action === 'accepte') {
            confirmIcon.className = 'w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center';
            confirmIcon.querySelector('span').className = 'material-symbols-outlined text-4xl text-green-600';
            confirmIcon.querySelector('span').textContent = 'check_circle';
            confirmTitle.textContent = 'Accepter cette candidature ?';
            confirmMessage.textContent = 'Le candidat sera notifié de votre décision positive.';
            confirmBtn.className =
                'flex-1 px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg text-white transition-colors';
            confirmBtn.textContent = 'Accepter';
            confirmBtn.onclick = () => executeUpdateStatus('accepte');
        } else {
            confirmIcon.className = 'w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center';
            confirmIcon.querySelector('span').className = 'material-symbols-outlined text-4xl text-red-600';
            confirmIcon.querySelector('span').textContent = 'cancel';
            confirmTitle.textContent = 'Refuser cette candidature ?';
            confirmMessage.textContent = 'Le candidat sera notifié de votre décision. Cette action est irréversible.';
            confirmBtn.className =
                'flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white transition-colors';
            confirmBtn.textContent = 'Refuser';
            confirmBtn.onclick = () => executeUpdateStatus('refuse');
        }

        confirmModal.classList.remove('hidden');
        confirmModal.classList.add('show');
    }

    function closeConfirmModal() {
        const confirmModal = document.getElementById('confirmModal');
        confirmModal.classList.add('hidden');
        confirmModal.classList.remove('show');
    }

    async function executeUpdateStatus(newStatus) {
        closeConfirmModal();

        const confirmBtn = document.getElementById('confirmActionBtn');
        const originalText = confirmBtn.textContent;
        confirmBtn.disabled = true;
        confirmBtn.innerHTML = '<span class="material-symbols-outlined animate-spin">hourglass_empty</span>';

        try {
            const response = await fetch(`/entreprise/candidatures/${currentCandidatureId}/statut`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    statut: newStatus
                })
            });

            const data = await response.json();

            if (data.success) {
                showNotification('success', data.message);
                closeDetailsModal();
                setTimeout(() => window.location.reload(), 1500);
            } else {
                showNotification('error', data.message || 'Une erreur est survenue');
                confirmBtn.disabled = false;
                confirmBtn.textContent = originalText;
            }
        } catch (error) {
            console.error('Erreur:', error);
            showNotification('error', 'Erreur de connexion au serveur');
            confirmBtn.disabled = false;
            confirmBtn.textContent = originalText;
        }
    }

    async function updateStatus(candidatureId, newStatus) {
        currentCandidatureId = candidatureId;
        showConfirmAction(newStatus);
    }

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

    // Fermer les modals avec Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDetailsModal();
            closeConfirmModal();
        }
    });
</script>
