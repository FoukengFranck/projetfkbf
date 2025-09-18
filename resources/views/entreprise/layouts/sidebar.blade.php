<aside class="w-64 bg-white shadow-lg h-screen fixed left-0 top-0 z-10">
    <div class="flex items-center p-6 border-b border-gray-200 ">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
        <span class="text-lg font-bold text-gray-700">FKBF KamerLink</span>
    </div>

    <nav class="mt-6">
        <div class="px-4">
            <x-side-link route="entreprise.dashboard">
                <div class="flex items-center text-gray-600 hover:cursor-pointer hover:text-blue-600 hover:font-bold">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <span class="material-symbols-outlined">dashboard</span>
                    </div>
                    Dashboard
                </div>
            </x-side-link>


            <x-side-link route="entreprise.offres">
                <div class="flex items-center text-gray-600 hover:cursor-pointer hover:text-blue-600 hover:font-bold">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <span class="material-symbols-outlined">business_center</span>
                    </div>
                     Offres Publiés
                </div>
               
            </x-side-link>

            <x-side-link route="entreprise.candidatures">
                <div class="flex items-center text-gray-600 hover:cursor-pointer hover:text-blue-600 hover:font-bold">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <span class="material-symbols-outlined">person_2</span>
                    </div>
                    Candidatures
                </div>
                
            </x-side-link>

            <x-side-link route="entreprise.chatbox">
                <div class="flex items-center text-gray-600 hover:cursor-pointer hover:text-blue-600 hover:font-bold">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <span class="material-symbols-outlined">person_2</span>
                    </div>
                    ChatBox
                </div>
                
            </x-side-link>

            <x-side-link route="entreprise.notifications">
                <div class="flex items-center text-gray-600 hover:cursor-pointer hover:text-blue-600 hover:font-bold">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <span class="material-symbols-outlined">person_2</span>
                    </div>
                    Notifications
                </div>
                
            </x-side-link>

            <x-side-link route="entreprise.profil">
                <div class="flex items-center text-gray-600 hover:cursor-pointer hover:text-blue-600 hover:font-bold">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <span class="material-symbols-outlined">person_2</span>
                    </div>
                    Mon Profil
                </div>
                
            </x-side-link>

            {{-- <x-side-link route="entreprise.deconnexion">
                <div class="flex items-center text-gray-600 hover:cursor-pointer hover:text-blue-600 hover:font-bold">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <span class="material-symbols-outlined">person_2</span>
                    </div>
                    Déconnexion
                </div>
                
            </x-side-link> --}}

           <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="px-8 flex items-center text-gray-600 hover:cursor-pointer hover:text-blue-600 hover:font-bold">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <span class="material-symbols-outlined">logout</span>
                    </div>
                    Déconnexion
                </button>
            </form>

            
            {{-- <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-white">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mr-3">
                            <i class="ri-user-fill text-gray-600 text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <div class="font-medium text-gray-800">Franck William</div>
                            <div class="text-sm text-gray-500">Directeur Général</div>
                            <div class="text-xs text-gray-400">franckwilliam@gmail.com</div>
                        </div>
                    </div>
            </div> --}}

            @auth
                @if (auth()->user()->role === 'entreprise')
                    @php
                        $entreprise = auth()->user()->entreprise;
                    @endphp
                    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-white">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mr-3">
                                @if ($entreprise->photo)
                                    <img src="{{ asset('storage/' . $entreprise->photo) }}" 
                                        alt="Photo de profil" 
                                        class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <i class="ri-user-fill text-gray-600 text-lg"></i>
                                @endif
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-800">{{ $entreprise->nom_responsable }}</div>
                                <div class="text-sm text-gray-500">{{ $entreprise->fonction_responsable }}</div>
                                <div class="text-xs text-gray-400">{{ $entreprise->email_responsable }}</div>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
           
        </div>
    </nav>
</aside>
