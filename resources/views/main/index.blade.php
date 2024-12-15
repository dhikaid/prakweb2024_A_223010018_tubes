@extends('main.layouts.main')
@section('main')

<div class="main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
    <!-- Hero Carousel Section -->
    <div class="w-full relative">
        <div class="swiper progress-slide-carousel swiper-container relative">
            <div class="swiper-wrapper mb-6">
                <div class="swiper-slide">
                    <img src="https://loket-production-sg.s3.ap-southeast-1.amazonaws.com/images/ss/1721803506_tkCKPu.jpg"
                        class="rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="https://assets.loket.com/images/ss/1724041803_0wxM2s.jpg" class="rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="https://assets.loket.com/images/ss/1730276568_GdNISN.png" class="rounded-xl">
                </div>
            </div>
            <div class="swiper-pagination !bottom-2 !top-auto !w-80 right-0 mx-auto bg-gray-100"></div>
        </div>
    </div>

    <!-- Creator Section -->
    <div class="my-16">
        <div class="flex justify-between items-center mb-8">
            <h1
                class="font-bold text-2xl md:text-3xl bg-gradient-to-r from-blue-600 to-violet-500 bg-clip-text text-transparent">
                Creator Event</h1>
            <a class="text-sm text-blue-500 hover:text-blue-600 font-medium transition-all duration-200 flex items-center gap-2 hover:gap-3 active:scale-95"
                href="/events/{{ $location }}">
                Lihat semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        <div class="relative -mx-4 px-4">
            <div class="w-full flex gap-8 snap-x scroll-pl-1 overflow-x-auto py-4 scrollbar-hide">
                @foreach ($creators as $creator)
                <div class="snap-start shrink-0">
                    <a href="/creator/{{ strtolower($creator->username) }}"
                        class="group flex flex-col items-center justify-center text-center w-36 transition-transform duration-300 hover:-translate-y-1">
                        <div class="relative">
                            <img src="{{ $creator->image }}"
                                class="rounded-full w-24 md:w-28 aspect-square object-cover mb-3 border-2 border-blue-100 group-hover:border-blue-300 transition-all duration-300 shadow-lg"
                                alt="{{ $creator->fullname }}">
                            <div
                                class="absolute inset-0 rounded-full bg-blue-500/10 scale-0 group-hover:scale-100 transition-transform duration-500">
                            </div>
                        </div>
                        <div class="detail-creator flex items-center justify-center">
                            <p
                                class="items-center mr-1 text-sm md:text-base font-semibold line-clamp-1 uppercase text-center group-hover:text-blue-500 transition-colors duration-200">
                                {{ $creator->fullname }}
                            </p>
                            @if ($creator->isVerified)
                            @include('layouts.partials.verified')
                            @endif
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Event Location Section -->
    <div class="my-16">
        <div class="flex justify-between items-center mb-8">
            <h1 class="font-bold text-2xl md:text-3xl">Event di <span
                    class="bg-gradient-to-r from-violet-500 to-purple-500 bg-clip-text text-transparent uppercase">{{
                    $location }}</span></h1>
            <a class="text-sm text-blue-500 hover:text-blue-600 font-medium transition-all duration-200 flex items-center gap-2 hover:gap-3 active:scale-95"
                href="/events/{{ $location }}">
                Lihat semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        <div class="relative -mx-4 px-4">
            <div class="w-full flex gap-6 snap-x scroll-pl-1 overflow-x-auto py-4 scrollbar-hide">
                @foreach ($eventlocation as $event)
                <div class="snap-start shrink-0">
                    <a href="/event/{{ $event->slug }}"
                        class="group block w-80 overflow-hidden rounded-2xl bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="relative overflow-hidden">
                            <img src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                                class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="{{ $event->name }}">
                        </div>
                        <div class="p-5">
                            <h3
                                class="font-bold text-lg line-clamp-1 uppercase group-hover:text-blue-500 transition-colors duration-200">
                                {{ $event->name }}</h3>
                            <p class="text-sm text-gray-500 mt-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $event->duration }}
                            </p>
                            <p class="text-slate-700 font-semibold mt-2 capitalize">{{ $event->price_range }}</p>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-3">
                                <img src="{{ $event->creator->image }}"
                                    class="w-8 h-8 rounded-full object-cover border border-gray-200" alt="">
                                <div class="flex items-center gap-1">
                                    <p class="text-sm font-medium text-gray-700">{{ $event->creator->fullname }}</p>
                                    @if ($event->creator->isVerified)
                                    @include('layouts.partials.verified')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Latest Events Section -->
    <div class="my-16">
        <div class="flex justify-between items-center mb-8">
            <h1
                class="font-bold text-2xl md:text-3xl bg-gradient-to-r from-blue-500 to-cyan-500 bg-clip-text text-transparent">
                Event Terbaru</h1>
            <a class="text-sm text-blue-500 hover:text-blue-600 font-medium transition-all duration-200 flex items-center gap-2 hover:gap-3 active:scale-95"
                href="/events">
                Lihat semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        <div class="relative -mx-4 px-4">
            <div class="w-full flex gap-6 snap-x scroll-pl-1 overflow-x-auto py-4 scrollbar-hide">
                @foreach ($latest as $event)
                <div class="snap-start shrink-0">
                    <a href="/event/{{ $event->slug }}"
                        class="group block w-80 overflow-hidden rounded-2xl bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="relative overflow-hidden">
                            <img src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                                class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="{{ $event->name }}">
                        </div>
                        <div class="p-5">
                            <h3
                                class="font-bold text-lg line-clamp-1 uppercase group-hover:text-blue-500 transition-colors duration-200">
                                {{ $event->name }}</h3>
                            <p class="text-sm text-gray-500 mt-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $event->duration }}
                            </p>
                            <p class="text-slate-700 font-semibold mt-2 capitalize">{{ $event->price_range }}</p>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-3">
                                <img src="{{ $event->creator->image }}"
                                    class="w-8 h-8 rounded-full object-cover border border-gray-200" alt="">
                                <div class="flex items-center gap-1">
                                    <p class="text-sm font-medium text-gray-700">{{ $event->creator->fullname }}</p>
                                    @if ($event->creator->isVerified)
                                    @include('layouts.partials.verified')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection