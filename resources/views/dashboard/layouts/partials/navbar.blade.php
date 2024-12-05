<nav x-data="{ isOpen: false }" class="fixed top-0 z-0 w-full bg-white shadow-md">
    <div class=" px-6 py-3 flex items-center ">

        <!-- Mobile Menu Button -->
        <!-- Buttons -->
        <div class="hidden md:flex items-center justify-end space-x-4">
            @auth
            <div class="profile flex items-center">
                <img src="{{ Auth::user()->image }}" alt="User Avatar" class="w-10 h-10 rounded-full" />
                <div class="ml-2">
                    <span class="text-sm font-medium text-gray-700">{{ Auth::user()->username }}</span>
                </div>
            </div>
            @else
            <a href="{{ route('register') }}"
                class="px-4 py-2 border border-violet-600 text-violet-600 rounded-lg hover:bg-violet-50">
                Daftar
            </a>
            <a href="{{ route('login') }}" class="px-4 py-2 bg-violet-600 text-white rounded-lg hover:bg-violet-500">
                Masuk
            </a>
            @endauth
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" class="md:hidden top-0">
        @include('dashboard.layouts.partials.sidebar')
    </div>
</nav>