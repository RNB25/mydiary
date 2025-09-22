<!-- Header (desktop only) -->
<header class="hidden md:flex justify-between items-center px-8 py-5 bg-white/70 backdrop-blur-md shadow-lg">
    <!-- Logo -->
    <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="w-16 h-auto">

    <!-- Right section -->
    <div class="flex items-center gap-6">
        <p class="font-semibold text-blue-900">{{ $user->name }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white font-medium rounded-xl shadow-md hover:bg-red-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                Logout
            </button>
        </form>
    </div>
</header>

<!-- Header (mobile only) -->
<header class="md:hidden flex justify-between items-center px-4 py-4 bg-white/70 backdrop-blur-md shadow-lg">
    <!-- Burger button -->
    <button id="burger" class="text-2xl">☰</button>

    <!-- Logo -->
    <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="w-12 h-12">

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" 
            class="flex items-center gap-1 px-3 py-2 bg-red-500 text-white text-sm font-medium rounded-xl shadow-md hover:bg-red-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
            Logout
        </button>
    </form>
</header>
