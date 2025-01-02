@extends('main.layouts.main')
@section('main')

<div class="min-h-screen text-gray-700">
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

    <!-- Intro Section -->
    <div class="py-12">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="lg:flex lg:items-center lg:gap-12">
                <!-- Left: Image -->
                <div class="relative flex-shrink-0 lg:w-1/2 w-full mb-6 lg:mb-0">
                    <img src="https://images.unsplash.com/photo-1522158637959-30385a09e0da?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Tentang Kami" class="rounded-2xl shadow-lg object-cover w-full h-80 lg:h-96" />
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-30 rounded-2xl"></div>
                </div>

                <!-- Right: Content -->
                <div class="lg:w-1/2">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Tentang Kami</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Selamat datang di <span class="font-bold text-blue-500">BookRN</span>, platform utama untuk
                        mempermudah Anda menemukan, mengelola, dan menghadiri acara terbaik di sekitar Anda.
                    </p>
                    <h3 class="text-xl lg:text-2xl font-semibold mb-4 text-gray-800">Apa yang Kami Tawarkan?</h3>
                    <ul class="space-y-4">
                        @foreach (['Pencarian acara berdasarkan kategori, lokasi, atau minat Anda.',
                        'Proses pemesanan tiket yang cepat dan mudah.',
                        'Notifikasi dan pembaruan real-time tentang acara.',
                        'Layanan pelanggan yang siap membantu kapan saja.'] as $item)
                        <li class="flex items-center">
                            <span
                                class="flex items-center justify-center w-8 h-8 bg-blue-500 text-white rounded-full mr-4">
                                ✓
                            </span>
                            <p class="text-gray-700">{{ $item }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="py-12">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-center text-gray-800 mb-6">Misi Kami</h2>
            <div class="grid gap-6 lg:gap-8 md:grid-cols-2">
                @foreach ([
                ['title' => 'Menciptakan Koneksi', 'desc' => 'Kami percaya bahwa setiap acara adalah kesempatan untuk
                menciptakan kenangan dan mempererat hubungan.'],
                ['title' => 'Pengalaman Mulus', 'desc' => 'Dengan teknologi terbaik, kami memastikan pengalaman Anda
                menjadi mudah dan efisien.']
                ] as $mission)
                <div class="p-6 bg-gray-50 rounded-2xl shadow-md transition hover:shadow-lg hover:-translate-y-1">
                    <h3 class="text-xl lg:text-2xl font-semibold text-gray-800 mb-2">{{ $mission['title'] }}</h3>
                    <p class="text-gray-600">{{ $mission['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="py-12">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-center text-gray-800 mb-6">Nilai Kami</h2>
            <div class="grid gap-6 md:grid-cols-3">
                @foreach ([
                ['title' => 'Inovasi', 'desc' => 'Kami mencari cara untuk meningkatkan layanan.'],
                ['title' => 'Kepuasan Pelanggan', 'desc' => 'Kami memastikan kepuasan maksimal untuk setiap pengguna.'],
                ['title' => 'Kepercayaan', 'desc' => 'Keamanan dan transparansi dalam menjaga kepercayaan Anda.']
                ] as $value)
                <div
                    class="p-6 bg-gray-50 rounded-2xl shadow-md transition hover:shadow-lg hover:-translate-y-1 text-center">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $value['title'] }}</h3>
                    <p class="text-gray-600">{{ $value['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Call to Action -->
    <div class="py-16 bg-blue-500 text-center text-white">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">Bergabunglah dengan Kami!</h2>
            <p class="text-lg">
                Terima kasih telah mempercayai <span class="font-semibold">BookRN</span>. Mari ciptakan pengalaman luar
                biasa bersama!
            </p>
            <a href="{{ route('register') }}"
                class="inline-block mt-8 px-8 py-3 bg-white text-blue-500 rounded-full shadow-md hover:bg-gray-100 transition">
                Daftar Sekarang
            </a>
        </div>
    </div>
</div>

@endsection
