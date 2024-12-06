@extends('main.layouts.main')
@section('main')


<div class="main">
    <h1 class="text-xl font-bold mb-4">HASIL PENCARIAN <span class="text-purple-600 uppercase">"{{ $query }}"</span>
    </h1>
    <section class="bg-white flex items-center">
        <div class="grid gap-x-20 gap-y-4  mt-4 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($events as $event)
            <a href="/event/{{ $event->slug }}"
                class="uppercase w-full md:w-80 h-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl flex justify-between flex-col">
                <img src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                    class="rounded-tl-3xl rounded-br-3xl w-full h-full object-cover  mb-3">
                <div class="px-3 pb-3 ">
                    <p class="font-bold text-lg line-clamp-1 uppercase">{{ $event->name }}</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">{{ $event->duration }}</p>
                    <p class="text-m font-semibold capitalize">{{ $event->price_range }}</p>
                    <div class="img mt-3 flex items-center  gap-3 ">
                        <img src="{{ $event->creator->image }}" class="w-7 rounded-full" alt="">
                        <div class="badge flex items-center justify-center gap-1">
                            <p class="flex justify-center items-center gap-1">{{ $event->creator->fullname }}
                            </p>
                            @if ($event->creator->isVerified)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    <div class="m-8 flex justify-center">
        {{ $events->links() }}
    </div>
</div>

@endsection