@extends('main.layouts.main')

@section('main')



<!-- Back Button -->
<div class="mb-8 transform hover:-translate-x-2 transition-transform duration-300 inline-block">
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-blue-600 group">
        <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none">
            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            <path d="M9 12H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span class="font-semibold">Kembali ke Event</span>
    </a>
</div>

<!-- Two Column Layout -->
<div class="flex flex-col lg:flex-row gap-8">
    <!-- Left Column - Fixed Event Info -->
    <div class="lg:w-5/12">
        <div class="sticky top-32">
            <div class="bg-white rounded-3xl shadow-xl shadow-black/5 p-8">
                <!-- Event Title -->
                <div class="space-y-3 mb-8">
                    <div class="inline-block px-4 py-2 bg-blue-50 rounded-full">
                        <p class="text-blue-600 font-medium text-sm">Anda akan memulai WAR Ticket:</p>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $event->name }}</h1>
                </div>

                <!-- Event Details -->
                <div class="space-y-4">
                    <!-- Date -->
                    <div
                        class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors">
                        <div class="flex-none flex items-center justify-center w-12 h-12 bg-blue-100 rounded-xl">
                            <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Event</p>
                            <p class="font-semibold text-gray-900">{{ $event->duration }}</p>
                        </div>
                    </div>

                    <!-- Time -->
                    <div
                        class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors">
                        <div class="flex-none flex items-center justify-center w-12 h-12 bg-blue-100 rounded-xl">
                            <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Waktu Pelaksanaan</p>
                            <p class="font-semibold text-gray-900">{{ $event->range_duration }} WIB</p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div
                        class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors">
                        <div class="flex-none flex items-center justify-center w-12 h-12 bg-blue-100 rounded-xl">
                            <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Lokasi</p>
                            <p class="font-semibold text-gray-900">{{ $event->locations->venue }}</p>
                        </div>
                    </div>
                </div>

                <!-- Organizer -->
                <div class="mt-8 pt-8 border-t border-gray-100">
                    <p class="text-gray-500 mb-4">Diselenggarakan oleh:</p>
                    <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-xl">
                        <img src="https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1"
                            class="w-14 h-14 rounded-xl border-2 border-blue-100" alt="{{ $event->creator->fullname }}">
                        <div>
                            <div class="flex items-center gap-2">
                                <p class="font-bold text-lg text-gray-900">{{ $event->creator->fullname }}</p>
                                @if ($event->creator->isVerified)
                                @include('layouts.partials.verified')
                                @endif
                            </div>
                            <p class="text-sm text-gray-500">Event Organizer</p>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="mt-8">
                    @if ($event->is_war_open)
                    <form action="{{ route('war', ['event' => $event->slug]) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-bold px-6 py-4 rounded-xl shadow-lg shadow-blue-600/20 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden group">
                            <span class="relative z-10">Oke, saya sudah siap WAR!</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000">
                            </div>
                        </button>
                    </form>

                    @else
                    <div class="" x-data="countdown('{{ $event->queue_open }}', false, true)" x-init="startCountdown()">
                        <button
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-bold px-6 py-4 rounded-xl shadow-lg shadow-blue-600/20 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden group">
                            <span class="relative z-10 flex items-center gap-2 justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span x-text="output"></span>
                            </span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000">
                            </div>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column - Scrollable Guidelines -->
    <div class="lg:w-7/12">
        <div class="bg-white rounded-3xl shadow-xl shadow-black/5 p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Panduan Waiting Room</h2>

            <div class="space-y-8">
                <!-- Steps Section -->
                <div class="space-y-6">
                    @foreach ([
                    ['title' => 'Buat Akun', 'desc' => 'Pastikan kamu sudah memiliki akun BookRN yang aktif.
                    Jika belum, daftarkan diri terlebih dahulu.'],
                    ['title' => 'Masuk ke Acara', 'desc' => 'Cari acara yang tiketnya ingin kamu beli dan masuk
                    ke halaman detail acara tersebut.'],
                    ['title' => 'Gabung ke Waiting Room', 'desc' => 'Jika tiket acara tersebut sedang
                    menggunakan sistem Waiting Room, kamu akan diarahkan untuk bergabung ke antrian.'],
                    ['title' => 'Tunggu Giliran', 'desc' => 'Setelah bergabung, kamu akan diberikan nomor
                    antrian. Sabarlah menunggu giliranmu untuk masuk ke halaman pembelian tiket.'],
                    ['title' => 'Siapkan Data', 'desc' => 'Siapkan semua data yang diperlukan untuk proses
                    pembelian, seperti data kartu kredit atau debit, alamat email, dan nomor telepon.'],
                    ['title' => 'Lakukan Pembayaran', 'desc' => 'Ketika giliranmu tiba, kamu akan diarahkan ke
                    halaman pembayaran. Segera lakukan pembayaran untuk mengamankan tiketmu.'],
                    ['title' => 'Konfirmasi Pembelian', 'desc' => 'Setelah pembayaran berhasil, kamu akan
                    menerima konfirmasi pembelian melalui email atau aplikasi BookRN.']
                    ] as $index => $step)
                    <div class="flex gap-4 p-4 rounded-xl hover:bg-slate-50 transition-colors">
                        <div class="flex-none">
                            <div
                                class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-semibold text-sm">
                                {{ $index + 1 }}
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">{{ $step['title'] }}</h3>
                            <p class="text-gray-600">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Tips Box -->
                <div class="bg-gradient-to-r from-slate-50 to-blue-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Tips Penting</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                            </svg>
                            <span class="text-gray-700">Pastikan koneksi internet stabil dan gunakan browser
                                terbaru</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                            </svg>
                            <span class="text-gray-700">Siapkan metode pembayaran sebelum mulai antre</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                            </svg>
                            <span class="text-gray-700">Jangan refresh halaman saat sedang dalam antrian</span>
                        </li>
                    </ul>
                </div>

                <!-- Important Notice -->
                <div class="bg-red-50 rounded-xl p-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-red-700 mb-2">Penting Diperhatikan</h3>
                            <p class="text-red-500">Tata cara dan ketentuan dapat berbeda untuk setiap event.
                                Silakan hubungi customer service BookRN jika mengalami kendala.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection