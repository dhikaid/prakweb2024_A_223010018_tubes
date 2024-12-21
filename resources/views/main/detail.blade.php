@extends('main.layouts.main')
@section('main')

<div class="md:flex gap-8">
    <!-- Bagian Kiri - Gambar dan Deskripsi -->
    <div class="md:w-2/3">
        <!-- Hero Image -->
        <div class="rounded-2xl overflow-hidden mb-6 group">
            <img class="w-full h-[400px] object-cover transform transition-transform duration-500 group-hover:scale-105 shadow-lg"
                src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->name }}">
        </div>

        <!-- Info Mobile -->
        <div class="detail-info block md:hidden bg-white rounded-2xl p-6 shadow-sm border border-gray-100 mb-6">
            <h2
                class="text-2xl font-bold mb-4 uppercase bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                {{ $event->name }}
            </h2>

            <!-- Info Section -->
            <div class="text-gray-600 space-y-4 mb-6">
                <!-- Date -->
                <div class="flex gap-3 items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6 text-blue-500">
                        <path
                            d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                        <path fill-rule="evenodd"
                            d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="uppercase font-medium">{{ $event->duration }}</p>
                </div>

                <!-- Time -->
                <div class="flex gap-3 items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6 text-blue-500">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="font-medium">09:00 - 15:00 WIB</p>
                </div>

                <!-- Location -->
                <div class="flex gap-3 items-start p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6 text-blue-500 shrink-0">
                        <path fill-rule="evenodd"
                            d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="font-medium">{{ $event->locations->venue }}</p>
                </div>
            </div>

            <!-- Organizer -->
            <div class="border-t border-gray-100 pt-6 mb-6">
                <p class="text-gray-600 mb-3">Diselenggarakan oleh</p>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <img src="https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1"
                        class="w-12 h-12 rounded-full border-2 border-blue-100" alt="{{ $event->creator->fullname }}">
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

            <!-- Price & CTA -->
            <div class="border-t border-gray-100 pt-6">
                <p class="text-gray-600 mb-2">Mulai dari</p>
                <p class="text-2xl font-bold text-blue-600 mb-6">{{ $event->price_range }}</p>
                <a href="/event/{{ $event->slug }}/tickets"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl w-full inline-block text-lg p-4 text-center transition-all duration-300 transform hover:scale-[1.02] focus:ring-4 focus:ring-blue-200">
                    BELI TIKET
                </a>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
            <ul class="flex">
                <li class="flex-1">
                    <a href="/event/{{ $event->slug }}"
                        class="inline-block py-4 px-6 w-full text-center font-bold text-blue-600 border-b-2 border-blue-600">
                        DETAIL
                    </a>
                </li>
                <li class="flex-1">
                    <a href="/event/{{ $event->slug }}/tickets"
                        class="inline-block py-4 px-6 w-full text-center font-bold text-gray-600 hover:text-gray-900 transition-colors">
                        TICKET
                    </a>
                </li>
            </ul>
        </div>

        <!-- Event Description -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="prose prose-blue max-w-none">
                {!! $event->description !!}
            </div>
        </div>
    </div>

    <!-- Bagian Kanan - Sticky Info -->
    <div class="md:w-1/3">
        <div class="hidden md:block sticky top-24">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <!-- Desktop Info - Same structure as mobile but sticky -->
                <h2
                    class="text-2xl font-bold mb-4 uppercase bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    {{ $event->name }}
                </h2>

                <!-- Info Section -->
                <div class="text-gray-600 space-y-4 mb-6">
                    <!-- Date -->
                    <div class="flex gap-3 items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 text-blue-500">
                            <path
                                d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                            <path fill-rule="evenodd"
                                d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="uppercase font-medium">{{ $event->duration }}</p>
                    </div>

                    <!-- Time -->
                    <div class="flex gap-3 items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 text-blue-500">
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="font-medium">09:00 - 15:00 WIB</p>
                    </div>

                    <!-- Location -->
                    <div class="flex gap-3 items-start p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 text-blue-500 shrink-0">
                            <path fill-rule="evenodd"
                                d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="font-medium">{{ $event->locations->venue }}</p>
                    </div>
                </div>

                <!-- Organizer -->
                <div class="border-t border-gray-100 pt-6 mb-6">
                    <p class="text-gray-600 mb-3">Diselenggarakan oleh</p>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
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

                <!-- Price & CTA -->
                <div class="border-t border-gray-100 pt-6">
                    <p class="text-gray-600 mb-2">Mulai dari</p>
                    <p class="text-xl font-bold text-slate-700 mb-6">{{ $event->price_range }}</p>
                    <a href="/event/{{ $event->slug }}/tickets"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl w-full inline-block text-lg p-4 text-center transition-all duration-300 transform hover:scale-[1.02] focus:ring-4 focus:ring-blue-200">
                        BELI TIKET
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection