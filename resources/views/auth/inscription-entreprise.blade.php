@include('components.header')

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
</x-guest-layout>