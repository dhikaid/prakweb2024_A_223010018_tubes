@extends('main.layouts.main')

@section('main')
<!-- Breadcrumb Back-Link -->
<div class="mb-5 px-4 transform hover:-translate-x-2 transition-transform duration-300 inline-block">
    <a href="{{ route('home') }}" class="flex items-center text-gray-600 hover:text-blue-500 transition group">
        <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none">
            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <span class="font-semibold">Kembali ke Home</span>
    </a>
</div>

<div class="px-5 md:px-8 py-10 mx-auto">
    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 leading-snug text-center">
        Kebijakan <span class="text-blue-600">Privasi</span>
    </h1>

    <p class="mt-4 text-base sm:text-lg text-gray-700 text-center leading-relaxed md:max-w-2xl mx-auto">
        Di <span class="font-medium">BookRN</span>, kami sangat menghargai privasi Anda. Kebijakan ini menjelaskan
        bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda.
    </p>

    <section class="mt-10 space-y-12">
        <!-- Informasi yang Kami Kumpulkan -->
        <div class="space-y-3 relative pl-10">
            <div
                class="absolute left-0 top-1 w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-full font-semibold">
                1
            </div>
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">
                Informasi yang Kami <span class="text-blue-600">Kumpulkan</span>
            </h2>
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                Kami dapat mengumpulkan informasi pribadi seperti:
            </p>
            <ul class="list-disc list-inside ml-4 text-gray-700 text-sm sm:text-base">
                <li>Nama lengkap, alamat email, dan nomor telepon.</li>
                <li>Informasi pembayaran untuk pemrosesan transaksi tiket.</li>
                <li>Data perangkat, seperti alamat IP dan jenis browser, untuk peningkatan pengalaman pengguna.</li>
            </ul>
        </div>

        <!-- Bagaimana Kami Menggunakan Informasi Anda -->
        <div class="space-y-3 relative pl-10">
            <div
                class="absolute left-0 top-1 w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-full font-semibold">
                2
            </div>
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">
                Bagaimana Kami <span class="text-blue-600">Menggunakan</span> Informasi Anda
            </h2>
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                Informasi yang Anda berikan akan digunakan untuk:
            </p>
            <ul class="list-disc list-inside ml-4 text-gray-700 text-sm sm:text-base">
                <li>Memproses pemesanan tiket acara Anda.</li>
                <li>Menyediakan pembaruan tentang acara yang Anda ikuti.</li>
                <li>Memberikan dukungan pelanggan sesuai kebutuhan Anda.</li>
            </ul>
        </div>

        <!-- Keamanan Informasi -->
        <div class="space-y-3 relative pl-10">
            <div
                class="absolute left-0 top-1 w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-full font-semibold">
                3
            </div>
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">
                <span class="text-blue-600">Keamanan</span> Informasi
            </h2>
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                Kami menggunakan langkah-langkah keamanan yang sesuai untuk melindungi informasi Anda dari akses yang
                tidak sah,
                seperti enkripsi data dan sistem autentikasi.
            </p>
        </div>

        <!-- Berbagi Informasi -->
        <div class="space-y-3 relative pl-10">
            <div
                class="absolute left-0 top-1 w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-full font-semibold">
                4
            </div>
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">
                Berbagi <span class="text-blue-600">Informasi</span>
            </h2>
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                Kami tidak akan membagikan informasi pribadi Anda kepada pihak ketiga, kecuali jika diwajibkan oleh
                hukum atau untuk memproses transaksi Anda (misalnya, penyedia pembayaran).
            </p>
        </div>

        <!-- Hak Anda -->
        <div class="space-y-3 relative pl-10">
            <div
                class="absolute left-0 top-1 w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-full font-semibold">
                5
            </div>
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">
                Hak <span class="text-blue-600">Anda</span>
            </h2>
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                Anda memiliki hak untuk:
            </p>
            <ul class="list-disc list-inside ml-4 text-gray-700 text-sm sm:text-base">
                <li>Mengakses, mengubah, atau menghapus informasi pribadi Anda.</li>
                <li>Menolak penggunaan data Anda untuk pemasaran.</li>
            </ul>
            <p class="text-gray-700 mt-2 text-sm sm:text-base leading-relaxed">
                Silakan hubungi kami di
                <a href="/contact" class="text-blue-600 hover:underline">halaman kontak</a>
                untuk melaksanakan hak Anda.
            </p>
        </div>
    </section>

    <!-- Footer Notes -->
    <p class="text-gray-700 mt-10 text-center text-xs sm:text-sm leading-relaxed">
        Kebijakan ini dapat diperbarui dari waktu ke waktu. Kami menyarankan Anda untuk memeriksa halaman ini secara
        berkala untuk memastikan Anda tetap terinformasi.
    </p>
</div>
@endsection
