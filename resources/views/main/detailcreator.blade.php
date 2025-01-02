@extends('main.layouts.main')
@section('main')

<div class="max-w-7xl mx-auto">
    <div class="relative mb-8">
        <div class="h-64 w-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl"></div>

        <div class="absolute -bottom-16 left-0 right-0 px-6">
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col md:flex-row items-center gap-6">
                <div class="relative">
                    <img src="{{ $user->image }}" alt="{{ $user->username }}"
                        class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md">
                    @if ($user->isVerified)
                    <div class="absolute -bottom-2 -right-2 bg-white rounded-full p-1.5 shadow-md">
                        @include('layouts.partials.verified')
                    </div>
                    @endif
                </div>

                <div class="text-center md:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2 uppercase">
                        {{ $user->fullname }}
                    </h1>
                    <p class="text-gray-600 mt-1">Event Organizer</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-24 px-6">
        <h2 class="text-2xl font-bold mb-6">Event yang diselenggarakan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($events as $event)
            <a href="/event/{{ $event->slug }}" class="group block">
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 group-hover:-translate-y-1">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ $event->image }}" alt="{{ $event->name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                        <div class="absolute bottom-4 left-4">
                            <div
                                class="bg-white/90 backdrop-blur-sm rounded-lg px-3 py-1.5 text-sm font-medium text-gray-900 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $event->duration }}
                            </div>
                        </div>
                    </div>


                    <div class="p-5">
                        <h3
                            class="font-bold text-lg line-clamp-1 uppercase group-hover:text-blue-600 transition-colors">
                            {{ $event->name }}
                        </h3>

                        <div class="mt-4 flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500">Mulai dari</p>
                                <p class="font-bold text-slate-700">{{ $event->price_range }}</p>
                            </div>


                            <div
                                class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @empty

            <div class="col-span-full py-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada event</h3>
                <p class="text-gray-600">Event yang diselenggarakan akan muncul di sini</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
