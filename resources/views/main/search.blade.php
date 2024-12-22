@extends('main.layouts.main')
@section('main')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Search Header -->
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            HASIL PENCARIAN
            <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent uppercase">
                "{{ $query }}"
            </span>
        </h1>
        <p class="text-gray-600 mt-2">Menampilkan {{ $events->count() }} event yang sesuai dengan pencarian Anda</p>
    </div>

    <section class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        @if($events->isEmpty())
        <div class="text-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada hasil ditemukan</h3>
            <p class="text-gray-600">Coba cari dengan kata kunci lain atau periksa ejaan Anda</p>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($events as $event)
            <a href="/event/{{ $event->slug }}"
                class="group block bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="{{ asset('storage/'.$event->image) }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="{{ $event->name }}">
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
                    <h3 class="font-bold text-lg line-clamp-1 uppercase group-hover:text-blue-600 transition-colors">
                        {{ $event->name }}
                    </h3>
                    <p class="text-slate-700 font-semibold mt-2">{{ $event->price_range }}</p>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-3">
                        <img src="{{ $event->creator->image }}"
                            class="w-8 h-8 rounded-full object-cover border border-gray-200"
                            alt="{{ $event->creator->fullname }}">
                        <div class="flex items-center gap-1">
                            <span class="text-sm font-medium text-gray-700">{{ $event->creator->fullname }}</span>
                            @if ($event->creator->isVerified)
                            @include('layouts.partials.verified')
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @endif
    </section>

    <!-- Pagination -->
    @if($events->hasPages())
    <div class="flex justify-center mt-5">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            {{ $events->links() }}
        </div>
    </div>
    @endif
</div>

@endsection