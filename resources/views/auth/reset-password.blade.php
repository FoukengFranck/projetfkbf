@include('components.header')

<x-guest-layout>
    <div class="max-w-md mx-auto mt-[10%] p-4 bg-white shadow rounded-2xl">
        <h2 class="w-full font-bold text-center">Réinitialision du mot de passe de {{ $email ?? '' }}</h2>

        @if (session('success'))
            <div style="color: green">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="text-red-600 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.reset') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $email ?? (old('email') ?? '') }}">

            <div class="mb-4">
                <x-label for="password" value="Nouveau mot de passe" class="mt-3" />
                <x-input id="password" type="password" name="password" required class="w-full mt-3" />
            </div>

            <div class="mb-4">
                <x-label for="password_confirmation" value="Confirmer le mot de passe" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full mt-3" />
            </div>

            <div class="col-span-full mt-5 mb-4 mx-[44px]">
                <div class="password-requirements flex flex-wrap gap-2 text-sm">
                    <span class="password-req-uppercase text-gray-500"> Majuscule</span>
                    <span class="password-req-lowercase text-gray-500"> Minuscule</span>
                    <span class="password-req-number text-gray-500"> Chiffre</span>
                    <span class="password-req-symbol text-gray-500"> Symbole (!@#$%)</span>
                </div>
            </div>

            <x-button class="w-[70%] mx-[15%] px-5 py-2 bg-green-500  hover:bg-green-400">Réinitialiser le mot de passe</x-button>
        </form>
    </div>

    <script>
        const passwordInput = document.getElementById("password");
        const requirements = {
            uppercase: document.querySelector(".password-req-uppercase"),
            lowercase: document.querySelector(".password-req-lowercase"),
            number: document.querySelector(".password-req-number"),
            symbol: document.querySelector(".password-req-symbol"),
        };

        function validatePassword() {
            const pwd = passwordInput.value;
            const checks = {
                uppercase: /[A-Z]/.test(pwd),
                lowercase: /[a-z]/.test(pwd),
                number: /\d/.test(pwd),
                symbol: /[^a-zA-Z0-9]/.test(pwd),
            };

            // Met à jour les couleurs avec Tailwind
            Object.keys(checks).forEach((key) => {
                if (requirements[key]) {
                    requirements[key].classList.toggle("text-gray-500", !checks[key]);
                    requirements[key].classList.toggle("text-green-600", checks[key]);
                }
            });
        }

        passwordInput?.addEventListener("input", validatePassword);
    </script>
</x-guest-layout>
