<aside class="fixed inset-y-0 left-0 w-64 bg-white border-r">
    <div class="p-6">
        <div class="text-xl font-bold text-green-700">Candidat</div>
    </div>

    <nav class="p-4 space-y-1">
        <x-side-link route="candidat.dashboard">
            <x-slot name="icon">🏠</x-slot>
            Dashboard
        </x-side-link>

        <x-side-link route="candidat.profil">
            <x-slot name="icon">👤</x-slot>
            Profil
        </x-side-link>

        <x-side-link route="candidat.candidatures">
            <x-slot name="icon">📝</x-slot>
            Candidatures
        </x-side-link>
    </nav>
</aside>
