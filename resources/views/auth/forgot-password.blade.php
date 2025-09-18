{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

@include('components.header')
<x-guest-layout>
    <div class="bg-white border-solid shadow rounded-2xl justify-center min-h-[calc(100vh-80px)] py-[200px] px-[450px] m-4">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-400">Rénitialisez votre Mot de passe</h1>

        @if(session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="text-red-600 mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.sendOtp') }}" method="POST">
            @csrf
            <div class="mb-5 w-full">
                <x-label for="email" class="block mb-2 font-bold text-gray-700 text-center"
                value="Entrez votre adresse email" />
                <x-input id="email" type="email" name="email" required autofocus class="w-full py-2" />
            </div>

            <x-button class="w-[50%] mx-[25%] px-5 py-2 bg-blue-500  hover:bg-blue-400">Envoyer le code OTP</x-button>
        </form>
    </div>
</x-guest-layout>

