<navbar class="fixed top-0 z-50 w-full bg-slate-100 shadow-md">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center  py-2">
        <div class="flex items-center">
            <img src="/assets/bookrn.png" width="60" alt="logo">
            <form action="" method="get" class="flex items-center mx-4 relative">
                <input type="search" name="search" id="search"
                    class="w-96 bg-gray-200 border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                    placeholder="Cari event seru disini">
                <button type="submit" class="bg-blue-600 right-0 absolute p-1 rounded-lg w-10 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="flex items-center justify-center ml-8 space-x-4 h-1/2">
            <a href="{{route('register')}}"
                class="px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-100">Daftar</a>
            <a href="{{route('login')}}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Masuk</a>
        </div>
    </div>
</navbar>