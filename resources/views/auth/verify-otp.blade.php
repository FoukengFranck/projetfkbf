@include('components.header')
<x-guest-layout>
    <div class="bg-white border-solid shadow rounded-2xl justify-center py-[200px] px-[450px] m-9">
        <h2 class="mb-5 text-black font-extrabold">Vérification OTP pour {{ $email }}</h2>

        @if(session('success'))
            <div style="color: green">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('password.verifyOtp') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
    
            <label for="otp" class="mb-5">Entrez le code reçu par Gmail:</label>
            <input type="text" name="otp" required class="py-3 w-full mb-3 rounded-md border border-gray-300 mt-3">
    
            <button type="submit" class="w-[50%] mx-[25%] px-5 py-2 bg-blue-500  hover:bg-blue-400 rounded-md text-center font-extrabold text-white">Vérifier</button>
        </form>


    </div>
</x-guest-layout>
