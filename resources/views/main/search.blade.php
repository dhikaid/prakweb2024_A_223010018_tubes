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
                            @include('layouts.partials.verified')
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