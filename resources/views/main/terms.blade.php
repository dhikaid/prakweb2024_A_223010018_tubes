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

<div class="relative">
    <div class="container mx-auto  px-6 lg:px-12 py-10">
        <div>
            <header class="text-center">
                <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-800 tracking-tight mb-4">
                    Syarat dan Ketentuan
                </h1>
                <p class="text-lg lg:text-xl text-gray-600 leading-relaxed">
                    Dengan menggunakan layanan <span class="font-bold text-blue-600">BookRN</span>, Anda setuju pada
                    poin-poin berikut.
                </p>
            </header>

            <section class="mt-12">
                <ol class="list-none space-y-8 text-gray-700">
                    <li class="relative pl-10">
                        <div
                            class="absolute left-0 top-3 w-6 h-6 bg-blue-600 text-white flex items-center justify-center rounded-full">
                            1
                        </div>
                        <h3 class="font-bold text-lg leading-tight mb-2">Pendaftaran Akun</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Pengguna wajib mendaftar dengan informasi yang benar dan akurat. Informasi ini akan
                            digunakan untuk memvalidasi
                            pembelian tiket Anda.
                        </p>
                    </li>
                    <li class="relative pl-10">
                        <div
                            class="absolute left-0 top-3 w-6 h-6 bg-blue-600 text-white flex items-center justify-center rounded-full">
                            2
                        </div>
                        <h3 class="font-bold text-lg leading-tight mb-2">Pembelian Tiket</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Semua tiket yang dibeli melalui platform kami tidak dapat dibatalkan atau dikembalikan
                            kecuali dinyatakan sebaliknya
                            oleh penyelenggara acara.
                        </p>
                    </li>
                    <li class="relative pl-10">
                        <div
                            class="absolute left-0 top-3 w-6 h-6 bg-blue-600 text-white flex items-center justify-center rounded-full">
                            3
                        </div>
                        <h3 class="font-bold text-lg leading-tight mb-2">Sistem Waiting Room</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Untuk beberapa acara, kami menerapkan sistem Waiting Room. Harap mengikuti antrian yang
                            ditentukan untuk memastikan
                            keadilan.
                        </p>
                    </li>
                    <li class="relative pl-10">
                        <div
                            class="absolute left-0 top-3 w-6 h-6 bg-blue-600 text-white flex items-center justify-center rounded-full">
                            4
                        </div>
                        <h3 class="font-bold text-lg leading-tight mb-2">Data Pribadi</h3>
                        <p class="text-gray-600 leading-relaxed">
                            BookRN berkomitmen untuk melindungi data pribadi Anda sesuai dengan
                            <a href="/privacy" class="text-blue-600 hover:underline">kebijakan privasi</a> kami.
                        </p>
                    </li>
                    <li class="relative pl-10">
                        <div
                            class="absolute left-0 top-3 w-6 h-6 bg-blue-600 text-white flex items-center justify-center rounded-full">
                            5
                        </div>
                        <h3 class="font-bold text-lg leading-tight mb-2">Tanggung Jawab Pengguna</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Pengguna bertanggung jawab penuh atas penggunaan akun mereka, termasuk menjaga keamanan
                            informasi login.
                        </p>
                    </li>
                </ol>
            </section>

            <footer class="mt-12 text-center">
                <p class="text-gray-600 leading-relaxed">
                    Dengan menggunakan platform kami, Anda menyetujui semua syarat dan ketentuan yang berlaku. Jika Anda
                    memiliki pertanyaan,
                    silakan <a href="/contact" class="text-blue-600 hover:underline">hubungi kami</a>.
                </p>
            </footer>
        </div>
    </div>
</div>

@endsection
