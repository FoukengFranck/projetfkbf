@include('components.header')
<x-guest-layout>



    <main class="flex items-center justify-center min-h-[calc(100vh-80px)] px-4 py-8">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <h1 class="text-[32px] font-extrabold text-[#3b82f6] mb-2">Se Connecter</h1>
                    <p class="text-gray-600">Accédez à votre espace personnel</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Afficher les erreurs d'authentification --}}
                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-md text-sm">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    {{-- <div class="mt-4">
                        <x-label for="password" value="Mot de Passe" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div> --}}

                    <div class="mt-4 relative">
                        <x-label for="password" value="Mot de Passe" />
                        <div class="relative">
                            <x-input id="password" class="block mt-1 w-full pr-10" type="password" name="password"
                                required autocomplete="current-password" />
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none"
                                aria-label="Afficher le mot de passe">

                                <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  id="eyeIcon"
                                    fill="currentColor" viewBox="0 0 24 24" >
                                    <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
                                    <path d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6"></path><path d="M12 19c7.63 0 9.93-6.62 9.95-6.68.07-.21.07-.43 0-.63-.02-.07-2.32-6.68-9.95-6.68s-9.93 6.61-9.95 6.67c-.07.21-.07.43 0 .63.02.07 2.32 6.68 9.95 6.68Zm0-12c5.35 0 7.42 3.85 7.93 5-.5 1.16-2.58 5-7.93 5s-7.42-3.84-7.93-5c.5-1.16 2.58-5 7.93-5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    @push('scripts')
                        <script>
                            const togglePassword = document.querySelector('#togglePassword');
                            const password = document.querySelector('#password');
                            const eyeIcon = document.querySelector('#eyeIcon');

                            togglePassword.addEventListener('click', function() {
                                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                password.setAttribute('type', type);

                                // Optionnel : changer l’icône (croix barrée pour "caché")
                                if (type === 'text') {
                                    eyeIcon.setAttribute('stroke-linecap', 'round');
                                    eyeIcon.innerHTML =
                                        `<path d="M12 17c-5.35 0-7.42-3.84-7.93-5 .2-.46.65-1.34 1.45-2.23l-1.4-1.4c-1.49 1.65-2.06 3.28-2.08 3.31-.07.21-.07.43 0 .63.02.07 2.32 6.68 9.95 6.68.91 0 1.73-.1 2.49-.26l-1.77-1.77c-.24.02-.47.03-.72.03ZM21.95 12.32c.07-.21.07-.43 0-.63-.02-.07-2.32-6.68-9.95-6.68-1.84 0-3.36.39-4.61.97L2.71 1.29 1.3 2.7l4.32 4.32 1.42 1.42 2.27 2.27 3.98 3.98 1.8 1.8 1.53 1.53 4.68 4.68 1.41-1.41-4.32-4.32c2.61-1.95 3.55-4.61 3.56-4.65m-7.25.97c.19-.39.3-.83.3-1.29 0-1.64-1.36-3-3-3-.46 0-.89.11-1.29.3l-1.8-1.8c.88-.31 1.9-.5 3.08-.5 5.35 0 7.42 3.85 7.93 5-.3.69-1.18 2.33-2.96 3.55z" />`;
                                } else {
                                    eyeIcon.innerHTML =
                                        `<path  d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6 M12 19c7.63 0 9.93-6.62 9.95-6.68.07-.21.07-.43 0-.63-.02-.07-2.32-6.68-9.95-6.68s-9.93 6.61-9.95 6.67c-.07.21-.07.43 0 .63.02.07 2.32 6.68 9.95 6.68Zm0-12c5.35 0 7.42 3.85 7.93 5-.5 1.16-2.58 5-7.93 5s-7.42-3.84-7.93-5c.5-1.16 2.58-5 7.93-5 /">`;
                                }
                            });
                        </script>
                    @endpush

                    <div class="flex items-center justify-between mt-8">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">Se Souvenir de moi</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-primary hover:text-blue-700 font-medium"
                                href="{{ route('password.request') }}">
                                Mot de passe oublier
                            </a>
                        @endif
                    </div>

                    {{-- <div class="flex items-center justify-end mt-4 gap-9">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                Mot de passe oublier
                            </a>
                        @endif

                        
                    </div> --}}

                    <x-button
                        class="w-full bg-[#10b981] text-white py-3 flex items-center justify-center mt-8 rounded-button font-black hover:bg-green-600 transition-colors whitespace-nowrap !rounded-button">
                        Se Connecter
                    </x-button>


                    <div class="text-center mt-4">
                        <span class="text-gray-600">Vous n'avez pas de compte ? </span>
                        <a href="{{ route('register.candidat.create') }}"
                            class="text-[#3b82f6] hover:text-blue-700 font-medium">S'inscrire</a>
                    </div>
                </form>
            </div>
        </div>
    </main>


</x-guest-layout>
