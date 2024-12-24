<nav x-data="{ isOpen: false, isSearchFocused: false }"
    class="fixed top-0 z-50 w-full bg-white/80 backdrop-blur-lg border-b border-gray-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
        <!-- Logo Section -->
        <div class="flex items-center flex-1">
            <a href="/" class="flex items-center space-x-2 group relative">
                <img src="/assets/newlogo.png"
                    class="w-8 sm:w-10 md:w-12 transition-all duration-500 group-hover:scale-110" alt="Logo Situs">
                <div
                    class="absolute inset-0 rounded-full bg-blue-500/10 scale-0 group-hover:scale-125 transition-transform duration-500">
                </div>
            </a>

            <!-- Desktop Search -->
            <div class="hidden md:flex flex-1 max-w-2xl ml-4 lg:ml-8" x-data="{
                searchQuery: '',
                searchResults: [],
                isSearchFocused: false,
                search() {
                    if (this.searchQuery.length > 0) {
                        fetch(`/service/api/search?query=${this.searchQuery}`)
                            .then(response => response.json())
                            .then(data => {
                                this.searchResults = data.data.data;
                            });
                    } else {
                        this.searchResults = [];
                    }
                }
            }">
                <form method="GET" action="/search" class="w-[90%] relative">
                    <div class="relative" @click.away="isSearchFocused = false">
                        <input type="text" name="query" placeholder="Cari event menarik disini..."
                            @focus="isSearchFocused = true; search()" @input.debounce.300ms="search()"
                            x-model="searchQuery" required autocomplete="off" class="w-full px-4 lg:px-5 py-2 lg:py-2.5 rounded-xl bg-gray-50/80
                                      placeholder-gray-400 text-gray-700 text-sm lg:text-base
                                      border-2 border-blue-400
                                      hover:border-blue-500 hover:bg-white
                                      focus:border-blue-500 focus:bg-white focus:ring-4
                                      focus:ring-blue-100 focus:outline-none
                                      transition-all duration-300 ease-in-out" />
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2
                                   bg-blue-500 hover:bg-blue-600
                                   text-white p-1.5 lg:p-2 rounded-lg
                                   transition-all duration-300 ease-in-out
                                   hover:scale-105 active:scale-95
                                   shadow-lg shadow-blue-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 lg:h-5 lg:w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>

                    {{-- INI HASILL DARI API --}}
                    <div class="absolute bg-white/100 backdrop-blur-lg border border-gray-200 w-full rounded-lg mt-1 z-10"
                        x-show="isSearchFocused && searchResults.length > 0"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        <ul class="py-2">
                            <template x-for="event in searchResults" :key="event.uuid">
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                                    <a :href="'/event/' + event.slug" class="w-full inline-block">
                                        <div class="flex items-center space-x-2">
                                            <img :src="'/storage/' + event.image" alt="Event Image"
                                                class="w-10 h-10 rounded object-cover">
                                            <div>
                                                <p class="text-sm font-semibold" x-text="event.name"></p>
                                                <p class="text-xs text-gray-500"
                                                    x-text="new Date(event.start_date).toLocaleDateString()"></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="absolute bg-white/100 backdrop-blur-lg border border-gray-200 w-full h-12 rounded-lg mt-1 flex items-center justify-center text-gray-500 text-sm"
                        x-show="isSearchFocused && searchResults.length === 0 && searchQuery.length > 0"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        Tidak ada event yang ditemukan.
                    </div>
                    {{-- END OF HASIL --}}
                </form>
            </div>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-3 lg:space-x-4">
            @auth
            @include('main.layouts.partials.accountoggle')
            @else
            <a href="{{ route('register') }}" class="px-4 lg:px-6 py-2 lg:py-2.5 border-2 border-blue-500
                          text-blue-500 rounded-xl text-sm lg:text-base
                          hover:bg-blue-50 hover:border-blue-600 hover:text-blue-600
                          transition-all duration-300 font-medium
                          active:scale-95">
                Daftar
            </a>
            <a href="{{ route('login') }}" class="px-4 lg:px-6 py-2 lg:py-2.5 bg-blue-500 text-white
                          rounded-xl text-sm lg:text-base
                          hover:bg-blue-600 transition-all duration-300
                          font-medium shadow-lg shadow-blue-500/25
                          hover:shadow-blue-500/40 active:scale-95">
                Masuk
            </a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button @click="isOpen = !isOpen" class="md:hidden p-2 rounded-lg hover:bg-blue-50
                       transition-all duration-300 active:scale-95
                       focus:outline-none focus:ring-4 focus:ring-blue-100" aria-label="Buka/Tutup Menu">
            <svg x-show="!isOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-slate-800" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="isOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 rotate-90" x-transition:enter-end="opacity-100 rotate-0"
                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-slate-800" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4" class="md:hidden bg-white border-t border-gray-200">
        <div class="container mx-auto px-4 py-4 space-y-4">

            <!-- Mobile Search -->
            <form method="GET" action="/search" class="w-full">
                <div class="relative">
                    <input type="text" name="query" placeholder="Cari event menarik disini..." class="w-full px-4 lg:px-5 py-2 lg:py-2.5 rounded-xl bg-gray-50/80
                                      placeholder-gray-400 text-gray-700 text-sm lg:text-base
                                      border-2 border-blue-400
                                      hover:border-blue-500 hover:bg-white
                                      focus:border-blue-500 focus:bg-white focus:ring-4
                                      focus:ring-blue-100 focus:outline-none
                                      transition-all duration-300 ease-in-out" />
                    <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2
                                bg-blue-500 hover:bg-blue-600 text-white
                                p-1.5 sm:p-2 rounded-lg transition-all duration-300
                                hover:scale-105 active:scale-95
                                shadow-lg shadow-blue-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Mobile Auth Buttons -->
            @auth
            @include('main.layouts.partials.accountoggle')
            @else
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('register') }}" class="px-4 py-2.5 border-2 border-blue-500
                              text-blue-500 rounded-xl text-center text-sm
                              hover:bg-blue-50 hover:border-blue-600
                              hover:text-blue-600 transition-all
                              duration-300 font-medium active:scale-95">
                    Daftar
                </a>
                <a href="{{ route('login') }}" class="px-4 py-2.5 bg-blue-500 text-white
                              rounded-xl text-center text-sm hover:bg-blue-600
                              transition-all duration-300 font-medium
                              shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40
                              active:scale-95">
                    Masuk
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>
