<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-white shadow rounded-2xl">
        <h1 class="text-2xl font-bold text-center mb-6">Décidez votre type de compte</h1>

        <div class="grid gap-4">
            <a href="{{ route('register.candidat.create') }}"
               class="block text-center py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                Je suis candidat
            </a>

            <a href="{{ route('register.entreprise.create') }}"
               class="block text-center py-3 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700">
                Je suis entreprise
            </a>
        </div>
    </div>
</x-guest-layout>
