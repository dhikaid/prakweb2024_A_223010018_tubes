<footer class="bg-gray-100 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-6 md:space-y-0">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('assets/'.env('PATH_LOGO', 'newlogo.png')) }}" alt="BookRN Logo" class="h-8 w-auto">
                <p class="text-gray-600 text-sm">© 2024 BookRN.</p>
            </div>
            <nav class="flex flex-col md:flex-row text-center  text-gray-600 text-sm">
                <a href="/" class="hover:text-gray-800 m-3  ">Home</a>
                <a href="/events" class="hover:text-gray-800 m-3  ">Tentang Kami</a>
                <a href="/creators" class="hover:text-gray-800 m-3  ">Kebijakan Privasi</a>
                <a href="/creators" class="hover:text-gray-800 m-3  ">Syarat & Ketentuan</a>
                <a href="/docs/api" class="hover:text-gray-800 m-3  ">API Documentation</a>
            </nav>
        </div>
    </div>
</footer>