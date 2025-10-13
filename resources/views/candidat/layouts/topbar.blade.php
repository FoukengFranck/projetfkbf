<header class="fixed top-0 left-64 right-0 h-16 bg-white border-b flex items-center px-4 py-4 justify-between">
    <div class="flex-1 max-w-1[24px]">
        <form action="#" class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-[0px]">
                <span class="material-symbols-outlined text-gray-400">search</span>
                {{-- <i class="ri-search-line text-gray-400"></i> --}}
            </div>
            <input type="search" placeholder="Rechercher..."
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-[16px] focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
        </form>
    </div>

    <div class="flex items-center space-x-4 ml-8">
        <button
            class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
            <span class="material-symbols-outlined">filter_alt</span>
            {{-- <i class="ri-filter-line"></i> --}}
        </button>
        <button
            class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg relative">
            <span class="material-symbols-outlined">notifications</span>
            {{-- <i class="ri-notification-line"> </i> --}}
            <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></div>
        </button>
        <button
            class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
            <span class="material-symbols-outlined">settings</span>
            {{-- <i class="ri-settings-line"></i> --}}
        </button>
    </div>
</header>
