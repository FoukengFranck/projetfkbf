{{-- @include('components.header')

<x-guest-layout>

    @push('scripts')
        <script src="{{ asset('js/inscription-entreprise.js') }}" defer></script>
    @endpush
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold">Inscription Entreprise</h1>
        <p class="text-gray-600">Créez votre compte et vos informations entreprise</p>
    </div>

    @if ($errors->any())
        <div class="mb-4 rounded border border-red-300 bg-red-50 p-3 text-red-700">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form x-data="{ secteur: '{{ old('secteur_activite') }}' }" method="POST" action="{{ route('register.entreprise.store') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">Nom de l'entreprise *</label>
                <input name="nom_entreprise" value="{{ old('nom_entreprise') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Identifiant unique *</label>
                <input name="identifiant_unique" value="{{ old('identifiant_unique') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Secteur d'activité *</label>
                <select name="secteur_activite" x-model="secteur" class="mt-1 w-full border rounded px-3 py-2" required>
                    <option value="">-- Sélectionnez --</option>
                    <option>Informatique</option>
                    <option>Commerce</option>
                    <option>Banque</option>
                    <option>BTP</option>
                    <option>Agroalimentaire</option>
                    <option>Énergie</option>
                    <option>Autre</option> <!-- dernière position -->
                </select>
            </div>

            <div x-show="secteur === 'Autre'">
                <label class="block text-sm font-medium">Précisez le secteur *</label>
                <input name="secteur_personnalise" value="{{ old('secteur_personnalise') }}" class="mt-1 w-full border rounded px-3 py-2">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Adresse *</label>
                <input name="adresse" value="{{ old('adresse') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Région *</label>
                <input name="region" value="{{ old('region') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Ville *</label>
                <input name="ville" value="{{ old('ville') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Quartier (optionnel)</label>
                <input name="quartier" value="{{ old('quartier') }}" class="mt-1 w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Email professionnel (login) *</label>
                <input type="email" name="email_professionnel" value="{{ old('email_professionnel') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Site web (optionnel)</label>
                <input name="site_web" value="{{ old('site_web') }}" class="mt-1 w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Nom du responsable *</label>
                <input name="nom_responsable" value="{{ old('nom_responsable') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Fonction du responsable *</label>
                <input name="fonction_responsable" value="{{ old('fonction_responsable') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Téléphone du responsable *</label>
                <input name="telephone_responsable" value="{{ old('telephone_responsable') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Email du responsable *</label>
                <input type="email" name="email_responsable" value="{{ old('email_responsable') }}" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Nombre d'employés *</label>
                <select name="nombre_employes" class="mt-1 w-full border rounded px-3 py-2" required>
                    <option value="">-- Sélectionnez --</option>
                    <option>1-5</option>
                    <option>6-20</option>
                    <option>21-50</option>
                    <option>51-200</option>
                    <option>200+</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Description (optionnel)</label>
                <textarea name="description" class="mt-1 w-full border rounded px-3 py-2" rows="3">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">Mot de passe *</label>
                <input type="password" name="password" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Confirmation du mot de passe *</label>
                <input type="password" name="password_confirmation" class="mt-1 w-full border rounded px-3 py-2" required>
            </div>
        </div>

        <div class="mt-6">
            <button class="w-full bg-green-600 text-white font-semibold py-2 rounded">Créer mon compte entreprise</button>
        </div>
    </form>
</x-guest-layout> --}}

@include('components.header')

<x-guest-layout>

    {{-- Font Awesome (chargement simple, pas d’attribut integrity incomplet) --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          referrerpolicy="no-referrer" />

    @push('scripts')
        <script src="{{ asset('js/inscription-entreprise.js') }}" defer></script>
    @endpush

    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-blue-700">
            Inscription Entreprise / Centre de Formation
        </h1>
        <p class="text-gray-600">
            Créez votre compte pour publier des offres d'emploi, des missions freelance ou des formations.
        </p>
        <p class="text-center text-gray-600">
            Votre NUI sera vérifié pour garantir la qualité de la plateforme.
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-4 rounded border border-red-300 bg-red-50 p-3 text-red-700">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ===== Barre de progression + icônes ===== --}}
    <div class="max-w-4xl mx-auto mb-8 px-2">
        <div class="relative">
            {{-- ligne grise en arrière-plan --}}
            <div class="absolute left-0 right-0 top-[50px] my-3 h-2 bg-gray-300 rounded-full"></div>
            {{-- ligne bleue qui progresse --}}
            <div id="progress-line" class="absolute left-0 top-[50px] my-3 h-2 bg-blue-600 rounded-full transition-all duration-500"
                 style="width:0%"></div>

            {{-- icônes réparties sur toute la largeur --}}
            <div class="relative z-10 grid grid-cols-5">
                <div class="flex flex-col items-center">
                    <div class="progress-step w-12 h-12 rounded-full flex items-center justify-center text-xl transition-colors"
                         data-title="Informations de base">
                        <i class="fa-solid fa-building"></i>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="progress-step w-12 h-12 rounded-full flex items-center justify-center text-xl transition-colors"
                         data-title="Coordonnées">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="progress-step w-12 h-12 rounded-full flex items-center justify-center text-xl transition-colors"
                         data-title="Responsable légal">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="progress-step w-12 h-12 rounded-full flex items-center justify-center text-xl transition-colors"
                         data-title="Informations spécifiques">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="progress-step w-12 h-12 rounded-full flex items-center justify-center text-xl transition-colors"
                         data-title="Sécurité">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Texte sous la barre : Étape X sur 5 : Titre --}}
        <div class="mt-4 text-center">
            <span id="stepText"
                  class="inline-block px-4 py-1 my-5 rounded-full border border-blue-600 text-blue-700 font-semibold">
                Étape 1 sur 5 : Informations de base
            </span>
        </div>
    </div>

    {{-- ===== Étapes du formulaire ===== --}}
    <div class="max-w-4xl mx-auto">
        <form id="entrepriseForm" method="POST" action="{{ route('register.entreprise.store') }}">
            @csrf

            {{-- Étape 1 : Informations de base --}}
            <div class="step">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-building mr-2 text-blue-600"></i>
                        <h2 class="text-xl font-bold text-blue-700">Informations de base</h2>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Renseignez les informations de base de votre organisation
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Raison sociale <span class="text-red-500">*</span></label>
                            <input name="nom_entreprise" value="{{ old('nom_entreprise') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('nom_entreprise') border-red-500 @enderror"
                                   placeholder="Nom de votre entreprise" required>
                            @error('nom_entreprise')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">NUI (Numéro d'Identification Unique) <span class="text-red-500">*</span></label>
                            <input name="identifiant_unique" value="{{ old('identifiant_unique') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('identifiant_unique') border-red-500 @enderror"
                                   placeholder="P987654321DEF" required pattern="[A-Za-z0-9]{13}">
                            @error('identifiant_unique')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">13 caractères alphanumériques</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Secteur d'activité <span class="text-red-500">*</span></label>
                            <select name="secteur_activite"
                                    class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('secteur_activite') border-red-500 @enderror"
                                    required>
                                <option value="">-- Sélectionnez un secteur --</option>
                                <option>Informatique</option>
                                <option>Commerce</option>
                                <option>Banque</option>
                                <option>BTP</option>
                                <option>Agroalimentaire</option>
                                <option>Énergie</option>
                                <option>Autre</option>
                            </select>
                            @error('secteur_activite')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="button"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                            onclick="nextStep()">Suivant →</button>
                </div>
            </div>

            {{-- Étape 2 : Coordonnées --}}
            <div class="step hidden">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-location-dot mr-2 text-blue-600"></i>
                        <h2 class="text-xl font-bold text-blue-700">Coordonnées</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Indiquez vos coordonnées de contact</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Région <span class="text-red-500">*</span></label>
                            <select name="region" id="region" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Sélectionnez une région --</option>
                                <option value="Centre">Centre</option>
                                <option value="Littoral">Littoral</option>
                                <option value="Ouest">Ouest</option>
                                <option value="Nord">Nord</option>
                                <option value="Sud">Sud</option>
                                <option value="Est">Est</option>
                                <option value="Extrême-Nord">Extrême-Nord</option>
                                <option value="Adamaoua">Adamaoua</option>
                                <option value="Nord-Ouest">Nord-Ouest</option>
                                <option value="Sud-Ouest">Sud-Ouest</option>
                            </select>
                            {{-- <input name="region" value="{{ old('region') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('region') border-red-500 @enderror"
                                   placeholder="Région" required>
                            @error('region') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror --}}
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Ville <span class="text-red-500">*</span></label>
                            <input name="ville" value="{{ old('ville') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('ville') border-red-500 @enderror"
                                   placeholder="Ville" required>
                            @error('ville') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Adresse complète <span class="text-red-500">*</span></label>
                            <input name="adresse" value="{{ old('adresse') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('adresse') border-red-500 @enderror"
                                   placeholder="Adresse complète" required>
                            @error('adresse') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Quartier (optionnel)</label>
                            <input name="quartier" value="{{ old('quartier') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Quartier">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Email professionnel (login) <span class="text-red-500">*</span></label>
                            <input type="email" name="email_professionnel" value="{{ old('email_professionnel') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('email_professionnel') border-red-500 @enderror"
                                   placeholder="contact@entreprise.com" required>
                            @error('email_professionnel') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Site web (optionnel)</label>
                            <input name="site_web" value="{{ old('site_web') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="https://www.entreprise.com">
                        </div>
                    </div>
                </div>

                <div class="flex justify-between">
                    <button type="button"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors"
                            onclick="prevStep()">← Précédent</button>

                    <button type="button"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                            onclick="nextStep()">Suivant →</button>
                </div>
            </div>

            {{-- Étape 3 : Responsable légal --}}
            <div class="step hidden">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-user-tie mr-2 text-blue-600"></i>
                        <h2 class="text-xl font-bold text-blue-700">Responsable légal</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Informations du responsable légal</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Nom complet <span class="text-red-500">*</span></label>
                            <input name="nom_responsable" value="{{ old('nom_responsable') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('nom_responsable') border-red-500 @enderror"
                                   placeholder="Nom et prénom du responsable" required>
                            @error('nom_responsable') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Fonction <span class="text-red-500">*</span></label>
                            <input name="fonction_responsable" value="{{ old('fonction_responsable') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('fonction_responsable') border-red-500 @enderror"
                                   placeholder="Directeur Général, PDG, etc." required>
                            @error('fonction_responsable') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Téléphone <span class="text-red-500">*</span></label>
                            <input name="telephone_responsable" value="{{ old('telephone_responsable') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('telephone_responsable') border-red-500 @enderror"
                                   placeholder="+237XXXXXXXXX" required>
                            @error('telephone_responsable') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email_responsable" value="{{ old('email_responsable') }}"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('email_responsable') border-red-500 @enderror"
                                   placeholder="responsable@gmail.com" required>
                            @error('email_responsable') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-between">
                    <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors"
                            onclick="prevStep()">← Précédent</button>
                    <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                            onclick="nextStep()">Suivant →</button>
                </div>
            </div>

            {{-- Étape 4 : Informations spécifiques --}}
            <div class="step hidden">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-clipboard-list mr-2 text-blue-600"></i>
                        <h2 class="text-xl font-bold text-blue-700">Informations spécifiques</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Détails spécifiques selon votre profil</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Nombre d'employés <span class="text-red-500">*</span></label>
                            <select name="nombre_employes"
                                    class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('nombre_employes') border-red-500 @enderror" required>
                                <option value="">-- Sélectionnez --</option>
                                <option>1-5</option>
                                <option>6-20</option>
                                <option>21-50</option>
                                <option>51-200</option>
                                <option>200+</option>
                            </select>
                            @error('nombre_employes') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Description de l'entreprise</label>
                            <textarea name="description"
                                      class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                                      rows="4">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between">
                    <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors"
                            onclick="prevStep()">← Précédent</button>
                    <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                            onclick="nextStep()">Suivant →</button>
                </div>
            </div>

            {{-- Étape 5 : Validation --}}
            <div class="step hidden">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-lock mr-2 text-blue-600"></i>
                        <h2 class="text-xl font-bold text-blue-700">Sécurité</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Vérifiez vos informations avant de soumettre</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Mot de passe <span class="text-red-500">*</span></label>
                            <input type="password" name="password"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror" required>
                            @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Confirmation du mot de passe <span class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation"
                                   class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 @error('password_confirmation') border-red-500 @enderror" required>
                            @error('password_confirmation') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-between">
                    <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors"
                            onclick="prevStep()">← Précédent</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">
                        Créer mon compte entreprise
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="text-center mt-8">
        <p class="text-sm">
            Vous êtes candidat ?
            <a href="{{ route('register.candidat.create') }}" class="text-blue-600 font-medium">Inscription candidat</a>
            &ensp;·&ensp; Déjà inscrit ?
            <a href="{{ route('login') }}" class="text-blue-600 font-medium">Se connecter</a>
        </p>
    </div>
</x-guest-layout>
