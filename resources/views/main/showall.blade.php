@extends('main.layouts.main')
@section('main')

<div class="main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Bagian Header Pencarian -->
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold">
            HASIL PENCARIAN <span
                class="bg-gradient-to-r from-blue-500 to-blue-400 bg-clip-text text-transparent uppercase">"{{ $query
                }}"</span>
        </h1>
        <p class="text-gray-600 mt-2">Menemukan hasil pencarian yang sesuai dengan kata kunci Anda</p>
    </div>

    <!-- Bagian Hasil Pencarian -->
    <section class="bg-white rounded-2xl border border-gray-100 shadow-sm">
        <div class="p-6">
            @if ($datas->isEmpty())
            <!-- Tampilan Saat Tidak Ada Hasil -->
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada hasil ditemukan</h3>
                <p class="text-gray-600">Silakan coba dengan kata kunci lain atau periksa ejaan Anda</p>
            </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @if ($query === "Creators")
                @foreach ($datas as $creator)
                <a href="/creator/{{ strtolower($creator->username) }}"
                    class="group flex flex-col items-center p-6 rounded-xl hover:bg-gray-50 transition-all duration-300">
                    <div class="relative">
                        <img src="{{ $creator->image }}"
                            class="w-28 h-28 rounded-full object-cover mb-4 border-2 border-blue-100 group-hover:border-blue-300 transition-all duration-300 shadow-md"
                            alt="{{ $creator->fullname }}">
                        <div
                            class="absolute inset-0 rounded-full bg-blue-500/10 scale-0 group-hover:scale-100 transition-transform duration-500">
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-2">
                            <h3
                                class="font-semibold text-gray-900 group-hover:text-blue-500 transition-colors duration-200">
                                {{ $creator->fullname }}
                            </h3>
                            @if ($creator->isVerified)
                            @include('layouts.partials.verified')
                            @endif
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Penyelenggara Event</p>
                    </div>
                </a>
                @endforeach
                @else
                @foreach ($datas as $event)
                <a href="/event/{{ $event->slug }}"
                    class="group block overflow-hidden rounded-2xl bg-white border border-gray-200 hover:border-blue-200 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                            class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-110"
                            alt="{{ $event->name }}">
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <div
                                class="bg-white/90 backdrop-blur-sm rounded-lg px-3 py-1.5 inline-flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-800">{{ $event->duration }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3
                            class="font-bold text-gray-900 group-hover:text-blue-500 transition-colors duration-200 line-clamp-1 uppercase">
                            {{ $event->name }}
                        </h3>
                        <p class="text-blue-500 font-medium mt-2">{{ $event->price_range }}</p>

                        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-3">
                            <img src="{{ $event->creator->image }}"
                                class="w-8 h-8 rounded-full object-cover border border-gray-200"
                                alt="{{ $event->creator->fullname }}">
                            <div class="flex items-center gap-1">
                                <p class="text-sm font-medium text-gray-700">{{ $event->creator->fullname }}</p>
                                @if ($event->creator->isVerified)
                                @include('layouts.partials.verified')
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            </div>
            @endif
        </div>
    </section>

    <!-- Bagian Pagination -->
    @if($datas->hasPages())
    <div class="mt-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            {{ $datas->links() }}
        </div>
    </div>
    @endif
</div>

@endsection