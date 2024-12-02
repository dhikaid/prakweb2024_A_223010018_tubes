<nav x-data="{ isOpen: false }" class="fixed top-0 z-50 w-full bg-white shadow-md">
    <div class="container mx-auto px-6 py-3 flex items-center justify-between">
        <div class="flex w-full items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="/assets/logo.png" class="w-10 md:w-14" alt="logo">
            </a>

            <!-- Search Bar -->
            <form
                class="flex items-center w-full max-w-lg mx-4 hidden md:flex bg-gray-100 border border-gray-300 rounded-lg overflow-hidden h-full">
                <input type="text" placeholder="Cari event menarik"
                    class="flex-grow bg-gray-100 px-4 py-2 focus:ring-2 focus:ring-violet-300 focus:outline-none" />
                <button type="submit" class="bg-violet-600 text-white px-4 flex items-center justify-center h-11">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </form>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button @click="isOpen = !isOpen" class="text-gray-600 hover:text-gray-800 focus:outline-none"
                aria-label="Toggle navigation">
                <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                </svg>
                <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Buttons -->
        <div class="hidden md:flex items-center space-x-4">
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
    <div x-show="isOpen" class="md:hidden bg-white shadow-md absolute inset-x-0 z-40 w-full px-6 py-4">
        <form class="relative flex items-center w-full mb-4">
            <input type="text" placeholder="Cari event menarik"
                class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-violet-300 focus:outline-none" />
            <button type="submit"
                class="absolute right-0 top-0 bottom-0 flex items-center justify-center bg-violet-600 text-white w-12 h-full rounded-r-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="white" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>
        <div class="flex flex-col items-start space-y-4">
            @auth
            <div class="profile flex items-center">
                <img src="{{ Auth::user()->image }}" alt="User Avatar" class="w-10 h-10 rounded-full" />
                <div class="ml-2">
                    <span class="text-sm font-medium text-gray-700">{{ Auth::user()->username }}</span>
                </div>
            </div>
            @else
            <div class="flex items-center w-full justify-between gap-2">
                <a href="{{ route('register') }}"
                    class="px-4 py-2 border border-violet-600 text-violet-600 rounded-lg hover:bg-violet-50 w-full text-center">
                    Daftar
                </a>
                <a href="{{ route('login') }}"
                    class="px-4 py-2 bg-violet-600 text-white rounded-lg hover:bg-violet-500 w-full text-center">
                    Masuk
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>