<!-- Modal Détails Candidature Candidat -->
<div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 id="modalOffreTitle" class="text-2xl font-bold">-</h2>
                    <p id="modalEntrepriseName" class="text-blue-100 mt-1">-</p>
                </div>
                <button onclick="closeDetailsModal()" class="text-white hover:text-gray-200">
                    <span class="material-symbols-outlined text-3xl">close</span>
                </button>
            </div>
        </div>
        <!-- Body -->
        <div class="overflow-y-auto p-6" style="max-height: calc(90vh - 180px);">
            <!-- Statut -->
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Statut de la candidature</h3>
                <div id="detailStatut" class="inline-flex px-4 py-2 rounded-full text-sm font-medium">
                    -
                </div>
            </div>
            <!-- Info offre -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-3">Détails de l'offre</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-gray-500">work</span>
                        <span>Poste : <strong id="modalPoste">-</strong></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-gray-500">location_on</span>
                        <span>Lieu : <strong id="modalLieu">-</strong></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-gray-500">schedule</span>
                        <span>Type de contrat : <strong id="modalTypeContrat">-</strong></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-gray-500">attach_money</span>
                        <span>Salaire : <strong id="modalSalaire">-</strong></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-gray-500">description</span>
                        <span>Description : </span>
                    </div>
                    <div id="modalDescription" class="ml-6 text-gray-700 leading-relaxed">-</div>
                </div>
            </div>
            <!-- Détails candidature -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-3">Détails de votre candidature</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-gray-500">event</span>
                        <span>Date de candidature : <strong id="modalDateCandidature">-</strong></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-gray-500">attach_file</span>
                        <span>CV joint : <strong id="modalCV">-</strong></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-gray-500">mail</span>
                        <span>Lettre de motivation : <strong id="modalLettreMotivation">-</strong></span>
                    </div>
                    <div id="modalCommentaireRecruteur" class="ml-6 mt-2 p-3 bg-white rounded-md border border-gray-200 text-sm text-gray-700 hidden">
                        <strong>Commentaire du recruteur :</strong>
                        <p id="modalCommentaireText">-</p>
                    </div>
                </div>
            </div>
            <!-- Actions -->
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <button id="actionBtn" onclick="performAction()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium hidden">
                    Voir l'offre complète
                </button>
                <button onclick="closeDetailsModal()" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 font-medium">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>
