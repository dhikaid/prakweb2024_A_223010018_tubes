@extends('main.layouts.main')
@section('main')
@if($event->is_tiket_war)
<div class="w-full text-white bg-red-500 mb-5 rounded-lg" x-data="countdown('{{ $queue->AddTime}}', false,true)"
    x-init="startCountdown()">
    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
        <div class="flex">
            <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                </path>
            </svg>

            <p class="mx-3">Waktu pembelian : <span x-text="output"></span></p>
        </div>
    </div>
</div>
@endif
<div class="md:flex gap-8" x-data="useForm">
    <!-- Bagian Kiri -->
    <div class="md:w-2/3">
        <!-- Hero Image -->
        <div class="rounded-2xl overflow-hidden mb-6 group">
            <img class="w-full h-[400px] object-cover transform transition-transform duration-500 group-hover:scale-105 shadow-lg"
                src="{{ $event->image }}" alt="{{ $event->name }}">
        </div>


        <!-- Mobile Info -->
        <div class="detail-info block md:hidden bg-white rounded-2xl p-6 shadow-sm border border-gray-100 mb-6">
            <h2 class="text-2xl font-bold mb-4 text-slate-800 uppercase">
                {{ $event->name }}
            </h2>

            <!-- Info Section -->
            <div class="space-y-4">
                <!-- Date -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tanggal</p>
                        <p class="font-medium">{{ $event->duration }}</p>
                    </div>
                </div>

                <!-- Time -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Waktu</p>
                        <p class="font-medium">{{ $event->range_duration }} WIB</p>
                    </div>
                </div>

                <!-- Location -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Lokasi</p>
                        <p class="font-medium">{{ $event->locations->venue }}</p>
                    </div>
                </div>
            </div>

            <!-- Organizer -->
            <div class="mt-6 p-4 bg-gray-50 rounded-xl">
                <p class="text-sm text-gray-500 mb-3">Diselenggarakan oleh</p>
                <div class="flex items-center gap-3">
                    <img src="https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1"
                        class="w-12 h-12 rounded-full border-2 border-blue-100" alt="">
                    <div>
                        <div class="flex items-center gap-2">
                            <p class="font-bold text-lg uppercase">{{ $event->creator->fullname }}</p>
                            @if ($event->creator->isVerified)
                            @include('layouts.partials.verified')
                            @endif
                        </div>
                        <p class="text-sm text-gray-500">Event Organizer</p>
                    </div>
                </div>
            </div>

            <!-- Price Range -->
            <div class="mt-6">
                <p class="text-sm text-gray-500">Mulai dari</p>
                <p class="text-xl md:text-2xl font-bold text-blue-600">{{ $event->price_range }}</p>

                @include('main.layouts.partials.cardbayar')
            </div>
        </div>

        <!-- Navigation -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
            <div class="flex">
                <a href="/event/{{ $event->slug }}"
                    class="flex-1 py-4 text-center font-bold text-gray-600 hover:text-gray-900 transition-colors">
                    DETAIL
                </a>
                <a href="/event/{{ $event->slug }}/tickets"
                    class="flex-1 py-4 text-center font-bold text-blue-600 border-b-2 border-blue-600">
                    TICKET
                </a>
            </div>
        </div>

        <!-- Ticket List -->
        <div class="space-y-4">
            @foreach ($event->tickets as $ticket)
            @if (!$ticket->is_empty)
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-md md:text-xl font-bold uppercase mb-2">{{ $ticket->ticket }}</h3>
                        <p class="text-md md:text-2xl text-blue-600 font-bold mb-2">{{ $ticket->ticket_price }}</p>
                        <p class="text-xs md:text-sm text-gray-500">*minimal pemesanan 1 tiket, maksimal 10 tiket</p>
                    </div>
                    @auth
                    <form class="form" @submit.prevent="post('{{ $ticket->uuid }}')">
                        <div class="flex items-center gap-3">
                            <input type="number" min="1" max="10" required value="1"
                                class="w-16 p-2 text-center rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200"
                                name="qty">
                            <input type="hidden" value="{{ $ticket->ticket }}" name="name">
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl px-8 py-3 transition-all duration-300 transform hover:scale-105 active:scale-95">
                                BELI
                            </button>
                        </div>
                    </form>
                    @else
                    <a href="{{ route('login') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl px-8 py-3 transition-all duration-300 transform hover:scale-105 active:scale-95">
                        MASUK
                    </a>
                    @endauth
                </div>
            </div>
            @else
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold uppercase text-gray-400 mb-2">{{ $ticket->ticket }}</h3>
                        <p class="text-2xl text-gray-400 font-bold mb-2">{{ $ticket->ticket_price }}</p>
                        <p class="text-sm text-gray-400">*minimal pemesanan 1 tiket, maksimal 10 tiket</p>
                    </div>
                    <button class="bg-gray-300 text-gray-500 font-bold rounded-xl px-8 py-3 cursor-not-allowed"
                        disabled>
                        HABIS
                    </button>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <!-- Bagian Kanan - Sticky Info -->
    <div class="md:w-1/3">
        <div class="hidden md:block sticky top-24">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <!-- Judul Event -->
                <h2 class="text-2xl font-bold mb-4 text-slate-800 uppercase">
                    {{ $event->name }}
                </h2>

                <!-- Info Section -->
                <div class="space-y-4">
                    <!-- Date -->
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal</p>
                            <p class="font-medium">{{ $event->duration }}</p>
                        </div>
                    </div>

                    <!-- Time -->
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Waktu</p>
                            <p class="font-medium">{{ $event->range_duration }} WIB</p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Lokasi</p>
                            <p class="font-medium">{{ $event->locations->venue }}</p>
                        </div>
                    </div>
                </div>

                <!-- Organizer -->
                <div class="mt-6 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <p class="text-sm text-gray-500 mb-3">Diselenggarakan oleh</p>
                    <div class="flex items-center gap-3">
                        <img src="https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1"
                            class="w-12 h-12 rounded-full border-2 border-blue-100"
                            alt="{{ $event->creator->fullname }}">
                        <div>
                            <div class="flex items-center gap-2">
                                <p class="font-bold text-lg uppercase">{{ $event->creator->fullname }}</p>
                                @if ($event->creator->isVerified)
                                @include('layouts.partials.verified')
                                @endif
                            </div>
                            <p class="text-sm text-gray-500">Event Organizer</p>
                        </div>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="mt-6 border-t border-gray-100 pt-6">
                    <p class="text-sm text-gray-500">Mulai dari</p>

                    <p class="text-xl font-bold text-blue-600">{{ $event->price_range }}</p>

                    <!-- Card Bayar -->
                    @include('main.layouts.partials.cardbayar')
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
