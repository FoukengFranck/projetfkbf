@include('components.header')

<x-guest-layout>

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <div class="max-w-md mx-auto mt-12 p-6 bg-white shadow rounded-2xl">
        <h1 class="text-2xl font-bold text-center mb-6">Inscrivez-vous en tant que Candidats ou Entreprises</h1>

        <div class="flex flex-col md:flex-row justify-center gap-8">
            <!-- Candidat -->
            <a href="{{ route('register.candidat.create') }}"
               class="w-full md:w-100 md:h-25 border border-gray-200 p-5 rounded-md relative hover:shadow-md transition-shadow">

               <!-- Icône en haut à gauche -->
               <div class="absolute top-3 left-3 text-3xl text-gray-500">
                   <span class="material-symbols-outlined">person</span>
               </div>

               <p class="text-black leading-relaxed font-semibold mt-10">
                   Je suis un candidat, à la recherche d'un emploi
               </p>
            </a>

            <!-- Entreprise -->
            <a href="{{ route('register.entreprise.create') }}"
               class="w-full md:w-100 border border-gray-200 p-5 rounded-md relative hover:shadow-md transition-shadow">

               <!-- Icône en haut à gauche -->
               <div class="absolute top-3 left-3 text-3xl text-gray-500">
                   <span class="material-symbols-outlined">business_center</span>
               </div>

               <p class="text-black leading-relaxed font-semibold mt-10">
                   Je suis une Entreprise, j'embauche pour des offres d'emplois ou pour un projet
               </p>
            </a>
        </div>
    </div>
</x-guest-layout>
