@extends('main.layouts.main') @section('main')
<h1 class="text-2xl font-bold text-gray-800 mb-4">Syarat dan Ketentuan</h1>
<p class="text-gray-600 mb-4">
    Selamat datang di BookRN! Dengan menggunakan layanan kami, Anda dianggap
    telah menyetujui syarat dan ketentuan berikut:
</p>

<ol class="list-decimal list-inside space-y-4 text-gray-700">
    <li>
        <span class="font-semibold">Pendaftaran Akun:</span>
        <p class="ml-6">
            Pengguna wajib mendaftar dengan informasi yang benar dan akurat.
            Informasi ini akan digunakan untuk memvalidasi pembelian tiket Anda.
        </p>
    </li>
    <li>
        <span class="font-semibold">Pembelian Tiket:</span>
        <p class="ml-6">
            Semua tiket yang dibeli melalui platform kami tidak dapat dibatalkan
            atau dikembalikan kecuali dinyatakan sebaliknya oleh penyelenggara
            acara.
        </p>
    </li>
    <li>
        <span class="font-semibold">Sistem Waiting Room:</span>
        <p class="ml-6">
            Untuk beberapa acara, kami menerapkan sistem Waiting Room. Harap
            mengikuti antrian yang ditentukan untuk memastikan keadilan.
        </p>
    </li>
    <li>
        <span class="font-semibold">Data Pribadi:</span>
        <p class="ml-6">
            BookRN berkomitmen untuk melindungi data pribadi Anda sesuai dengan
            <a href="/privacy-policy" class="text-blue-600 hover:underline">kebijakan privasi</a>
            kami.
        </p>
    </li>
    <li>
        <span class="font-semibold">Tanggung Jawab Pengguna:</span>
        <p class="ml-6">
            Pengguna bertanggung jawab penuh atas penggunaan akun mereka,
            termasuk menjaga keamanan informasi login.
        </p>
    </li>
</ol>

<p class="text-gray-600 mt-6">
    Dengan menggunakan platform kami, Anda menyetujui semua syarat dan ketentuan
    yang berlaku. Jika Anda memiliki pertanyaan, silakan
    <a href="/contact" class="text-blue-600 hover:underline">hubungi kami</a>.
</p>
@endsection