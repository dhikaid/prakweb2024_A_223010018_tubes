@extends('main.layouts.main') @section('main')
<h1 class="text-2xl font-bold text-gray-800 mb-4">Kebijakan Privasi</h1>
<p class="text-gray-600 mb-4">
    Kami di BookRN sangat menghargai privasi Anda. Kebijakan ini menjelaskan
    bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda.
</p>

<section class="space-y-6">
    <div>
        <h2 class="text-xl font-semibold text-gray-700 mb-2">
            1. Informasi yang Kami Kumpulkan
        </h2>
        <p class="text-gray-600">
            Kami dapat mengumpulkan informasi pribadi seperti:
        </p>
        <ul class="list-disc list-inside ml-6 text-gray-600">
            <li>Nama lengkap, alamat email, dan nomor telepon.</li>
            <li>Informasi pembayaran untuk pemrosesan transaksi tiket.</li>
            <li>
                Data perangkat, seperti alamat IP dan jenis browser, untuk
                peningkatan pengalaman pengguna.
            </li>
        </ul>
    </div>

    <div>
        <h2 class="text-xl font-semibold text-gray-700 mb-2">
            2. Bagaimana Kami Menggunakan Informasi Anda
        </h2>
        <p class="text-gray-600">
            Informasi yang Anda berikan akan digunakan untuk:
        </p>
        <ul class="list-disc list-inside ml-6 text-gray-600">
            <li>Memproses pemesanan tiket acara Anda.</li>
            <li>Menyediakan pembaruan tentang acara yang Anda ikuti.</li>
            <li>Memberikan dukungan pelanggan sesuai kebutuhan Anda.</li>
        </ul>
    </div>

    <div>
        <h2 class="text-xl font-semibold text-gray-700 mb-2">
            3. Keamanan Informasi
        </h2>
        <p class="text-gray-600">
            Kami menggunakan langkah-langkah keamanan yang sesuai untuk
            melindungi informasi Anda dari akses yang tidak sah, seperti
            enkripsi data dan sistem autentikasi.
        </p>
    </div>

    <div>
        <h2 class="text-xl font-semibold text-gray-700 mb-2">
            4. Berbagi Informasi
        </h2>
        <p class="text-gray-600">
            Kami tidak akan membagikan informasi pribadi Anda kepada pihak
            ketiga, kecuali jika diwajibkan oleh hukum atau untuk memproses
            transaksi Anda (misalnya, penyedia pembayaran).
        </p>
    </div>

    <div>
        <h2 class="text-xl font-semibold text-gray-700 mb-2">5. Hak Anda</h2>
        <p class="text-gray-600">Anda memiliki hak untuk:</p>
        <ul class="list-disc list-inside ml-6 text-gray-600">
            <li>Mengakses, mengubah, atau menghapus informasi pribadi Anda.</li>
            <li>Menolak penggunaan data Anda untuk pemasaran.</li>
        </ul>
        <p class="text-gray-600 mt-2">
            Silakan hubungi kami di
            <a href="/contact" class="text-blue-600 hover:underline">halaman kontak</a>
            untuk melaksanakan hak Anda.
        </p>
    </div>
</section>

<p class="text-gray-600 mt-6">
    Kebijakan ini dapat diperbarui dari waktu ke waktu. Kami menyarankan Anda
    untuk memeriksa halaman ini secara berkala untuk memastikan Anda tetap
    terinformasi.
</p>
@endsection