{{-- @include('components.header')
<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold">Inscription Candidat</h1>
        <p class="text-gray-600">Créez votre compte candidat</p>
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

    <form x-data="candidatForm()" x-init="init()" method="POST" action="{{ route('register.candidat.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">Nom complet <span class="text-red-500">*</span></label>
                <input name="name" value="{{ old('name') }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200" placeholder="Foulefack jacque william" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Adresse Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200" placeholder="foulefackjacque@gmail.com" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium">Numéro de Téléphone <span class="text-red-500">*</span></label>
                    <input name="telephone" value="{{ old('telephone') }}" placeholder="+2376XXXXXXXX" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Ville <span class="text-red-500">*</span></label>
                    <input name="ville" value="{{ old('ville') }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200" placeholder="Douala" required>
                </div>
            </div>

         

            
            <div class="mt-4">
                <label class="block text-sm font-medium">Compétences <span class="text-red-500">*</span></label>
                <div class="flex gap-2">

                    <input x-model="skillInput" @keydown.enter.prevent="addSkill()" placeholder="Ex: Développement Web" 
                        class="mt-1 flex-1 rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">

                    <button type="button" @click="addSkill()" 
                        class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Ajouter</button>

                </div>
                <p class="text-xs text-gray-500 mt-1">Ajoutez chaque compétence puis cliquez sur “Ajouter”.</p>

                <div class="mt-3 flex flex-wrap gap-2">
                    <template x-for="(s, idx) in skills" :key="idx">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full border">
                            <span x-text="s"></span>
                            <button type="button" @click="removeSkill(idx)" class="text-red-600 font-bold">&times;</button>
                            <input type="hidden" name="competences[]" :value="s">
                        </span>
                    </template>
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium">CV (PDF/Word) - optionnel</label>

                <div id="cv-dropzone" class="border-2 border-dashed rounded-md p-8 text-center text-gray-500 cursor-pointer">
                    Cliquez pour télécharger votre CV
                </div>

                <input type="file" name="cv" accept=".pdf,.doc,.docx" class="mt-1 w-full border rounded px-3 py-2">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium">Niveau d'étude <span class="text-red-500">*</span></label>
                    <select name="niveau_etude" class="mt-1 w-full border rounded px-3 py-2" required>
                        <option value="">-- Sélectionnez --</option>
                        @foreach (['CEP','BEPC','Probatoire','Baccalauréat','Licence','Master','Doctorat','Autre'] as $opt)
                        <option value="{{ $opt }}" @selected(old('niveau_etude')===$opt)>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Domaine d'activité <span class="text-red-500">*</span></label>
                    <select name="domaine_activite" class="mt-1 w-full border rounded px-3 py-2" required>
                        <option value="">-- Sélectionnez --</option>
                        @foreach (['Informatique','Finance','Commerce','Logistique','Santé','Éducation','Ingénierie','Autre'] as $opt)
                        <option value="{{ $opt }}" @selected(old('domaine_activite')===$opt)>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium">Mot de passe <span class="text-red-500">*</span></label>
                    <input type="password" name="password" class="mt-1 w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Confirmation du mot de passe <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" class="mt-1 w-full border rounded px-3 py-2" required>
                </div>
            </div>
            
        </div>

        <div class="pt-2">
            <button class="w-full bg-blue-600 text-white font-semibold py-2 rounded">Créer mon compte candidat</button>
        </div>
    </form>

    <script>
        function candidatForm() {
            return {
                skills: @json(old('competences', [])),
                skillInput: '',
                init(){},
                addSkill(){
                    const s = this.skillInput.trim();
                    if(!s) return;
                    if(this.skills.includes(s)) { this.skillInput=''; return; }
                    this.skills.push(s);
                    this.skillInput='';
                },
                removeSkill(i){
                    this.skills.splice(i,1);
                }
            }
        }
    </script>
</x-guest-layout> --}}

@include('components.header')

<x-guest-layout>


    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          referrerpolicy="no-referrer" 
        />

    @push('scripts')
        <script src="{{ asset('js/inscription-candidat.js') }}" defer></script>
    @endpush

    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-blue-700">Inscription Candidats / Freelance</h1>
        <p class="text-gray-600">Créez votre compte pour rejoindre la communauté professionnelle du Cameroun</p>
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

    <div class="bg-white rounded-lg shadow-md p-6 md:p-8 border border-gray-200 mx-[300px] my-[10px]">
        <form x-data="candidatForm()" x-init="init()" method="POST" action="{{ route('register.candidat.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Nom Complet <span class="text-red-500">*</span>
                    </label>
                    <input name="name" value="{{ old('name') }}" class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Foulefack jacque william" required
                        
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">
                        Adresse Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="foulefackjacque@gmail.com" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Numéro de Téléphone <span class="text-red-500">*</span>
                    </label>
                    <input name="telephone" value="{{ old('telephone') }}" placeholder="+237XXXXXXXXX" class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">
                        Ville <span class="text-red-500">*</span>
                    </label>
                    <input name="ville" value="{{ old('ville') }}" class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Douala, Yaoundé" required>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium mb-1">
                    Compétences <span class="text-red-500">*</span>
                </label>
                <div class="flex gap-2">
                    <input x-model="skillInput" @keydown.enter.prevent="addSkill()" placeholder="Ex: Développement Web, Marketing Digital" 
                        class="mt-1 flex-1 px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <button type="button" @click="addSkill()" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        Ajouter
                    </button>
                </div>
                <div class="mt-3 flex flex-wrap gap-2">
                    <template x-for="(s, idx) in skills" :key="idx">
                        <span class="inline-flex items-center gap-2 px-3 py-1 bg-gray-100 rounded-full border">
                            <span x-text="s"></span>
                            <button type="button" @click="removeSkill(idx)" class="text-red-600 font-bold">&times;</button>
                            <input type="hidden" name="competences[]" :value="s">
                        </span>
                    </template>
                </div>
            </div>


            <div class="mt-6">
                <label class="block text-sm font-medium mb-1">CV</label>
                <div id="cv-dropzone"
                    class="border-2 border-dashed rounded-md p-10 text-center text-gray-500 cursor-pointer my-2 hover:bg-gray-100 transition">
                    Cliquez ou glissez-déposez votre CV ici
                </div>

                <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" class="hidden">

                <p class="mt-2 text-sm text-gray-600" id="cv-filename"></p>
            </div>


            {{-- <div class="mt-6">
                <label class="block text-sm font-medium mb-1">CV</label>
                <div id="cv-dropzone"
                    class="border-2 border-dashed rounded-md p-10 text-center text-gray-500 cursor-pointer my-2">
                    Cliquez pour télécharger votre CV
                </div>
                <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" class="hidden">
                <p class="mt-2 text-sm text-green-600 font-extrabold" id="cv-filename"></p>
            </div> --}}


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Niveau d'étude <span class="text-red-500">*</span>
                    </label>
                    <select name="niveau_etude" class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Choisir le niveau --</option>
                        @foreach (['CEP','BEPC','Probatoire','Baccalauréat','Licence','Master','Doctorat','Autre'] as $opt)
                            <option value="{{ $opt }}" @selected(old('niveau_etude')===$opt)>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">
                        Domaine d'activité <span class="text-red-500">*</span>
                    </label>
                    <select name="domaine_activite" class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Choisir le domaine --</option>
                        @foreach (['Informatique','Finance','Commerce','Logistique','Santé','Éducation','Ingénierie','Autre'] as $opt)
                            <option value="{{ $opt }}" @selected(old('domaine_activite')===$opt)>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Mot de passe -->
                <div class="relative">
                    <label class="block text-sm font-medium mb-1">
                        Mot de passe <span class="text-red-500">*</span>
                    </label>
                    <input id="password"
                        type="password"
                        name="password"
                        class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
        <!-- Icône FontAwesome -->
                    <span id="togglePassword" class="absolute right-3  bottom-1/2 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-600">
                        <i class="fa-solid fa-eye text-2xl"></i>
                    </span>
                </div>

                <!-- Confirmation Mot de passe -->
                <div class="relative">
                    <label class="block text-sm font-medium mb-1">
            Confirmation Mot de passe <span class="text-red-500">*</span>
                    </label>
                    <input id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
                    <!-- Icône FontAwesome -->
                    <span id="togglePasswordConfirm" class="absolute right-3 bottom-1/2 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-600">
                        <i class="fa-solid fa-eye text-2xl"></i>
                    </span>
                </div>

                <!-- Conditions du mot de passe -->
                <div class="col-span-full mt-2">
                    <div class="password-requirements flex flex-wrap gap-2 text-sm">
                        <span class="password-req-uppercase text-gray-500"> Majuscule</span>
                        <span class="password-req-lowercase text-gray-500"> Minuscule</span>
                        <span class="password-req-number text-gray-500"> Chiffre</span>
                        <span class="password-req-symbol text-gray-500"> Symbole (!@#$%)</span>
                    </div>
                </div>
            </div>


            {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div class="relative">
                    <label class="block text-sm font-medium mb-1">
                        Mot de passe <span class="text-red-500">*</span>
                    </label>
                    <input id="password" 
                        type="password" 
                        name="password" 
                        class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" 
                        required
                    >
                    <img src="{{ asset('images/eye-close.png') }}" alt="" id="eye" onclick="changer()" 
                    class="absolute right-3 bottom-[0.9px]  transform -translate-y-1/2 h-[25px] cursor-pointer">
                </div>

                <div class="relative">
                    <label class="block text-sm font-medium mb-1">
                        Confirmation Mot de passe <span class="text-red-500">*</span>
                    </label>
                    <input type="password" 
                        name="password_confirmation" 
                        class="mt-1 w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" 
                        required
                    >
                    <img src="{{ asset('images/eye-close.png') }}" alt="" id="eye" onclick="changer()" 
                    class="absolute right-3 bottom-[0.9px]  transform -translate-y-1/2 h-[25px] cursor-pointer">
                </div>

                <div class="col-span-full mt-2">
                    <div class="password-requirements flex flex-wrap gap-2 text-sm">
                        <span class="password-req-uppercase text-gray-500"> Majuscule</span>
                        <span class="password-req-lowercase text-gray-500"> Minuscule</span>
                        <span class="password-req-number text-gray-500"> Chiffre</span>
                        <span class="password-req-symbol text-gray-500"> Symbole (!@#$%)</span>
                    </div>
                </div>
            </div> --}}
            
            <div class="pt-4 mt-8 border-t border-gray-300">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-[9px] px-5 rounded-lg mt-2 mx-auto block w-[200px] sm:w-auto">
                    S'inscrire
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p>Vous êtes Entreprise ? <a href="{{ route('register.entreprise.create') }}" class="text-blue-600 font-medium">Inscription Entreprise</a></p>
            <p>Déjà inscrit ? <a href="{{ route('login') }}" class="text-blue-600 font-medium">Se connecter</a></p>
        </div>
    </div>

    

    {{-- <style>
        /* Masquer l'input file par défaut */
        #cv-dropzone input[type="file"] {
            display: none;
        }

        /* Style personnalisé pour les selects */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding-right: 2rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
        }
    </style> --}}

    <script>
        function candidatForm() {
            return {
                skills: @json(old('competences', [])),
                skillInput: '',
                init(){},
                addSkill(){
                    const s = this.skillInput.trim();
                    if(!s) return;
                    if(this.skills.includes(s)) { this.skillInput=''; return; }
                    this.skills.push(s);
                    this.skillInput='';
                },
                removeSkill(i){
                    this.skills.splice(i,1);
                }
            }
        }
    </script>
</x-guest-layout>

