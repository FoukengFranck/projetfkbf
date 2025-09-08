@props(['route' => null])

@php
    // Vérifie si la prop correspond à un nom de route existant
    $hasNamedRoute = $route ? \Illuminate\Support\Facades\Route::has($route) : false;
    // si c'est un nom de route valide -> on génère l'URL, sinon on utilise la valeur brute (utile si tu passes '/chemin')
    $url = $hasNamedRoute ? route($route) : ($route ?? '#');

    // actif si la route nommée correspond (avec wildcard pour sous-routes)
    $isActive = $hasNamedRoute ? request()->routeIs($route . '*') : request()->is(trim($route, '/').'*');
@endphp

<a href="{{ $url }}"
   {{ $attributes->merge(['class' => 'flex items-center px-4 py-3 mx-4 mb-2 transition ' . ($isActive ? 'bg-blue-50 text-blue-600 font-semibold border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 hover:translate-x-6')]) }}>
    {{-- Optional named slot "icon" --}}
    @isset($icon)
        <span class="w-5 h-5 inline-flex items-center justify-center">
            {{ $icon }}
        </span>
    @endisset

    <span>{{ $slot }}</span>
</a>
