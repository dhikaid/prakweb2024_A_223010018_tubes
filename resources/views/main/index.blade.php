@extends('main.layouts.main')
@section('main')

<div class="main">
    <!--HTML CODE-->
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


    <div class="my-10">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg md:text-xl mb-7">Creator Event</h1>
            <a class="text-sm mb-7 text-blue-300" href="/creators">Lihat semua</a>
        </div>
        <div class="relative overflow-auto">
            <div class="w-full flex gap-8 snap-x scroll-pl-1 overflow-x-auto py-3">
                @foreach ($creators as $creator)
                <div class="snap-start shrink-0 ">
                    <a href="" class="flex flex-col items-center justify-center text-center  md:text-left w-36">
                        <img src="{{ $creator->image }}" class="rounded-full w-24 md:w-28 mb-3"
                            alt="{{ $creator->fullname }}">
                        <div class="detail-creator flex items-center justify-center">
                            <p
                                class="items-center mr-1 text-sm md:text-base font-semibold line-clamp-1 uppercase text-center">
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

    <div class="my-10">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg md:text-xl mb-7">Event di <span class="text-violet-300 uppercase">{{ $location
                    }}</span></h1>
            <a class="text-sm mb-7 text-blue-300" href="/events/{{ $location }}">Lihat semua</a>
        </div>
        <div class="relative overflow-auto">
            <div class="w-full flex gap-3 snap-x scroll-pl-1 overflow-x-auto py-3">
                @foreach ($eventlocation as $event)
                <div class="snap-start shrink-0 ">
                    <a href="/event/{{ $event->slug }}"
                        class="uppercase w-80 h-72 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                        <img src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                            class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                        <div class="px-3 pb-3">
                            <p class="font-bold text-lg line-clamp-1 uppercase">{{ $event->name }}</p>
                            <p class="font-regular text-sm text-gray-500 mb-2">{{ $event->duration }}</p>
                            <p class="text-m font-semibold capitalize">{{ $event->price_range }}</p>
                            <div class="img mt-3 flex items-center  gap-3">
                                <img src="https://assets.loket.com/neo/production/images/organization/20240404153109_660e654d3c31b.png"
                                    class="w-7 rounded-full" alt="">
                                <div class="badge flex items-center justify-center gap-1">
                                    <p class="flex justify-center items-center gap-1">{{ $event->creator->fullname }}
                                    </p>
                                    @if ($event->creator->isVerified)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue"
                                        class="size-4">
                                        <path fill-rule="evenodd"
                                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                            clip-rule="evenodd" />
                                    </svg>
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

    <div class="my-10">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg md:text-xl mb-7">Event Terbaru</h1>
            <a class="text-sm mb-7 text-blue-300" href="/events">Lihat semua</a>
        </div>
        <div class="relative overflow-auto">
            <div class="w-full flex gap-3 snap-x scroll-pl-1 overflow-x-auto py-3">
                @foreach ($latest as $event)
                <div class="snap-start shrink-0 ">
                    <a href="/event/{{ $event->slug }}"
                        class="uppercase w-80 h-72 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                        <img src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                            class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                        <div class="px-3 pb-3">
                            <p class="font-bold text-lg line-clamp-1 uppercase">{{ $event->name }}</p>
                            <p class="font-regular text-sm text-gray-500 mb-2">{{ $event->duration }}</p>
                            <p class="text-m font-semibold capitalize">{{ $event->price_range }}</p>
                            <div class="img mt-3 flex items-center  gap-3">
                                <img src="https://assets.loket.com/neo/production/images/organization/20240404153109_660e654d3c31b.png"
                                    class="w-7 rounded-full" alt="">
                                <div class="badge flex items-center justify-center gap-1">
                                    <p class="flex justify-center items-center gap-1">{{ $event->creator->fullname }}
                                    </p>
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