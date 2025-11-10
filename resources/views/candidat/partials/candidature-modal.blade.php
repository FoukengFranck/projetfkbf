<!-- Modal de candidature -->
<div id="candidatureModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">Postuler à l'offre</h2>
                    <p id="modalOffreTitle" class="text-blue-100 mt-1"></p>
                </div>
                <button onclick="closeModal()" class="text-white hover:text-gray-200">
                    <span class="material-symbols-outlined text-3xl">close</span>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 200px);">
            <form id="candidatureForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="offreIdInput" name="offre_id">

                <!-- Info CV existant -->
                @if (Auth::user()->candidat->cv_path)
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <span class="material-symbols-outlined text-green-600">check_circle</span>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-green-900">Votre CV est déjà enregistré</p>
                                <p class="text-xs text-green-700 mt-1">Nous utiliserons le CV de votre profil pour cette
                                    candidature</p>
                            </div>
                            <a href="{{ Storage::url(Auth::user()->candidat->cv_path) }}" target="_blank"
                                class="text-sm text-blue-600 hover:text-blue-800 flex items-center">
                                <span class="material-symbols-outlined text-sm mr-1">visibility</span>
                                Voir
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Option: Uploader un nouveau CV -->
                <div class="mb-6">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" id="uploadNewCV" class="rounded text-blue-600">
                        <span class="text-sm font-medium text-gray-700">Utiliser un CV différent pour cette
                            candidature</span>
                    </label>

                    <div id="cvUploadSection" class="hidden mt-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nouveau CV (optionnel)
                        </label>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors">
                            <input type="file" name="cv_path" id="cvFileInput" accept=".pdf,.doc,.docx"
                                class="hidden">
                            <label for="cvFileInput" class="cursor-pointer">
                                <span class="material-symbols-outlined text-4xl text-gray-400 mb-2">upload_file</span>
                                <p class="text-sm text-gray-600">Cliquez pour sélectionner un fichier</p>
                                <p class="text-xs text-gray-500 mt-1">PDF, DOC, DOCX (Max 4MB)</p>
                            </label>
                            <div id="cvFileName" class="hidden mt-3 text-sm text-green-600 font-medium"></div>
                        </div>
                    </div>
                </div>

                <!-- Lettre de motivation -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Lettre de motivation
                        <span class="text-xs text-gray-500 font-normal">(optionnelle mais recommandée)</span>
                    </label>
                    <input id="lettreMotivationInput" type="hidden" name="lettre_motivation">
                    <trix-editor input="lettreMotivationInput" class="trix-content border border-gray-300 rounded-lg"
                        placeholder="Expliquez pourquoi vous êtes le candidat idéal pour ce poste..."></trix-editor>
                </div>

                <!-- Informations du candidat (résumé) -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <h3 class="text-sm font-medium text-gray-900 mb-3">Vos informations</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-600">Nom:</span>
                            <span class="font-medium ml-2">{{ Auth::user()->name }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Email:</span>
                            <span class="font-medium ml-2">{{ Auth::user()->email }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Téléphone:</span>
                            <span class="font-medium ml-2">{{ Auth::user()->candidat->telephone }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Ville:</span>
                            <span class="font-medium ml-2">{{ Auth::user()->candidat->ville }}</span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t">
                    <button type="button" onclick="closeModal()"
                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Annuler
                    </button>
                    <button type="submit" id="submitBtn"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center space-x-2">
                        <span>Envoyer ma candidature</span>
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Styles pour Trix Editor */
    trix-toolbar {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    trix-editor {
        min-height: 200px;
        max-height: 400px;
        overflow-y: auto;
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
        padding: 1rem;
    }

    trix-editor:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
</style>

<script>
    // Toggle CV upload section
    document.getElementById('uploadNewCV')?.addEventListener('change', function(e) {
        const section = document.getElementById('cvUploadSection');
        if (e.target.checked) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
            document.getElementById('cvFileInput').value = '';
            document.getElementById('cvFileName').classList.add('hidden');
        }
    });

    // Show selected file name
    document.getElementById('cvFileInput')?.addEventListener('change', function(e) {
        const fileName = document.getElementById('cvFileName');
        if (e.target.files.length > 0) {
            fileName.textContent = `✓ ${e.target.files[0].name}`;
            fileName.classList.remove('hidden');
        } else {
            fileName.classList.add('hidden');
        }
    });

    function openCandidatureModal(offreId, offreTitle) {
        document.getElementById('offreIdInput').value = offreId;
        document.getElementById('modalOffreTitle').textContent = offreTitle;
        document.getElementById('candidatureModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('candidatureModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
        document.getElementById('candidatureForm').reset();
        document.querySelector('trix-editor').editor.loadHTML('');
        document.getElementById('cvUploadSection').classList.add('hidden');
        document.getElementById('uploadNewCV').checked = false;
    }

    // Form submission
    document.getElementById('candidatureForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML =
            '<span class="material-symbols-outlined animate-spin">hourglass_empty</span> <span>Envoi en cours...</span>';

        const formData = new FormData(this);

        try {
            const response = await fetch('{{ route('candidat.candidatures.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                // Success notification
                showNotification('success', data.message);
                closeModal();
                // Reload page to update UI
                setTimeout(() => window.location.reload(), 1500);
            } else {
                showNotification('error', data.message || 'Une erreur est survenue');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showNotification('error', 'Erreur de connexion au serveur');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML =
                '<span>Envoyer ma candidature</span><span class="material-symbols-outlined">send</span>';
        }
    });

    function showNotification(type, message) {
        const colors = {
            success: 'bg-green-500',
            error: 'bg-red-500',
            info: 'bg-blue-500'
        };

        const notification = document.createElement('div');
        notification.className =
            `fixed top-4 right-4 ${colors[type]} text-white px-6 py-4 rounded-lg shadow-lg z-[100] flex items-center space-x-3 animate-slide-in`;
        notification.innerHTML = `
        <span class="material-symbols-outlined">${type === 'success' ? 'check_circle' : 'error'}</span>
        <span>${message}</span>
    `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slide-out 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
</script>

<style>
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
