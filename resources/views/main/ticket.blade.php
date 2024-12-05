@extends('main.layouts.main')
@section('main')


<div class="md:flex gap-5" x-data="useForm">
    <div class="md:w-2/3">
        <div class=" rounded-lg mb-4">
            <img class="h-auto w-full rounded-lg shadow-xl dark:shadow-gray-200"
                src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                alt="image description">
        </div>
        <div class="detail-info block md:hidden">

            {{-- MOBILE --}}
            <div class="block fixed md:hidden w-full -bottom-5 left-0 mt-10">
                @include('main.layouts.partials.cardbayar')
            </div>
            <h2 class="text-2xl font-bold mb-2 uppercase">
                {{ $event->event_name }}
            </h2>
            <div class="text-gray-600 text-base mb-4 space-y-2">
                <div class="flex gap-2 items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M12 11.993a.75.75 0 0 0-.75.75v.006c0 .414.336.75.75.75h.006a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75H12ZM12 16.494a.75.75 0 0 0-.75.75v.005c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H12ZM8.999 17.244a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.006ZM7.499 16.494a.75.75 0 0 0-.75.75v.005c0 .414.336.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H7.5ZM13.499 14.997a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.005a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.005ZM14.25 16.494a.75.75 0 0 0-.75.75v.006c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75h-.005ZM15.75 14.995a.75.75 0 0 1 .75-.75h.005a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75H16.5a.75.75 0 0 1-.75-.75v-.006ZM13.498 12.743a.75.75 0 0 1 .75-.75h2.25a.75.75 0 1 1 0 1.5h-2.25a.75.75 0 0 1-.75-.75ZM6.748 14.993a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" />
                        <path fill-rule="evenodd"
                            d="M18 2.993a.75.75 0 0 0-1.5 0v1.5h-9V2.994a.75.75 0 1 0-1.5 0v1.497h-.752a3 3 0 0 0-3 3v11.252a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3V7.492a3 3 0 0 0-3-3H18V2.993ZM3.748 18.743v-7.5a1.5 1.5 0 0 1 1.5-1.5h13.5a1.5 1.5 0 0 1 1.5 1.5v7.5a1.5 1.5 0 0 1-1.5 1.5h-13.5a1.5 1.5 0 0 1-1.5-1.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="uppercase">{{ $event->duration }}</p>
                </div>
                <div class="flex gap-2 items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>09:00 - 15:00 WIB</p>
                </div>
                <div class="flex gap-2 items-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>{{ $event->locations->venue }}</p>
                </div>
            </div>
            <div class="my-5 space-y-2">
                <div class="text-gray-600">
                    <p>Diselenggarakan oleh</p>
                </div>
                <div class="text-black font-bold text-xl flex  items-center gap-1">
                    <img src="https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1" class="rounded-full w-10 h-10"
                        alt="">
                    <p class="uppercase">{{ $event->creator->fullname }}</p>
                    @if ($event->creator->isVerified)

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-5">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    @endif
                </div>
            </div>
            <div class="my-5">
                <p class="text-gray-600">Mulai dari</p>
                <div class="text-xl font-bold text-black">
                    <p> {{ $event->price_range }}</p>
                </div>
            </div>
        </div>
        <div class="text-xl text-center w-full text-gray-500 dark:text-gray-400 my-4">
            <ul class="flex w-full justify-between">
                <li class=" w-full">
                    <a href="/event/{{ $event->slug }}"
                        class="inline-block p-1 text-black font-bold border-b-4 rounded-t-lg active w-full text-base"
                        aria-current="page">DETAIL</a>
                </li>
                <li class="w-full">
                    <a href="/event/{{ $event->slug }}/tickets"
                        class="inline-block p-1 text-black font-bold border-b-4 border-blue-600 rounded-t-lg active  dark:border-blue-500 w-full text-base"
                        aria-current="page">TICKET</a>
                </li>
            </ul>
        </div>

        <div class="text-base leading-loose my-4">
            @foreach ($event->tickets as $ticket )
            <div class="bg-gray-200 w-full p-5 mb-4 rounded-tl-3xl rounded-br-3xl flex justify-between items-center ">
                <div class="info">
                    <p class="text-xl uppercase font-bold block">{{ $ticket->jenis_ticket }}</p>
                    <p>{{ $ticket->price }}</p>
                    <p class="text-xs">*minimal pemesanan 1 tiket, maksimal 10 tiket</p>
                </div>
                @auth
                <form class="form" @submit.prevent="post('{{ $ticket->ticket_uuid }}')">
                    <div class="flex ticket gap-2">
                        <input type="number" min="1" max="10" required value="1" class="rounded-lg w-10 text-center"
                            name="qty" required>
                        <input type="hidden" value="{{ $ticket->jenis_ticket }}" class="rounded-lg w-10 text-center"
                            name="name" readonly required>
                        <button
                            class="bg-blue-700 text-white font-bold rounded-lg px-8 py-2 uppercase text-sm md:text-base">BELI</button>
                    </div>
                </form>
                @else
                <a href="{{ route('login') }}"
                    class="bg-blue-700 text-white font-bold rounded-lg px-8 py-2 uppercase text-sm md:text-base">MASUK</a>
                @endauth
            </div>
            @endforeach
        </div>
    </div>


    <div class="md:w-1/3 md:pl-6 mt-6 md:mt-0">
        <div class="detail-info hidden md:block">
            <h2 class="text-2xl font-bold mb-2 uppercase">
                {{ $event->event_name }}
            </h2>
            <div class="text-gray-600 text-base mb-4 space-y-2">
                <div class="flex gap-2 items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M12 11.993a.75.75 0 0 0-.75.75v.006c0 .414.336.75.75.75h.006a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75H12ZM12 16.494a.75.75 0 0 0-.75.75v.005c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H12ZM8.999 17.244a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.006ZM7.499 16.494a.75.75 0 0 0-.75.75v.005c0 .414.336.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H7.5ZM13.499 14.997a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.005a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.005ZM14.25 16.494a.75.75 0 0 0-.75.75v.006c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75h-.005ZM15.75 14.995a.75.75 0 0 1 .75-.75h.005a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75H16.5a.75.75 0 0 1-.75-.75v-.006ZM13.498 12.743a.75.75 0 0 1 .75-.75h2.25a.75.75 0 1 1 0 1.5h-2.25a.75.75 0 0 1-.75-.75ZM6.748 14.993a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" />
                        <path fill-rule="evenodd"
                            d="M18 2.993a.75.75 0 0 0-1.5 0v1.5h-9V2.994a.75.75 0 1 0-1.5 0v1.497h-.752a3 3 0 0 0-3 3v11.252a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3V7.492a3 3 0 0 0-3-3H18V2.993ZM3.748 18.743v-7.5a1.5 1.5 0 0 1 1.5-1.5h13.5a1.5 1.5 0 0 1 1.5 1.5v7.5a1.5 1.5 0 0 1-1.5 1.5h-13.5a1.5 1.5 0 0 1-1.5-1.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="uppercase">{{ $event->duration }}</p>
                </div>
                <div class="flex gap-2 items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>09:00 - 15:00 WIB</p>
                </div>
                <div class="flex gap-2 items-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>{{ $event->locations->venue }}</p>
                </div>
            </div>
            <div class="my-5 space-y-2">
                <div class="text-gray-600">
                    <p>Diselenggarakan oleh</p>
                </div>
                <div class="text-black font-bold text-xl flex  items-center gap-1">
                    <img src="https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1" class="rounded-full w-10 h-10"
                        alt="">
                    <p class="uppercase">{{ $event->creator->fullname }}</p>
                    @if ($event->creator->isVerified)

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-5">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    @endif
                </div>
            </div>
            <div class="my-5">
                <p class="text-gray-600">Mulai dari</p>
                <div class="text-xl font-bold text-black">
                    <p> {{ $event->price_range }}</p>
                </div>
            </div>

            @include('main.layouts.partials.cardbayar')
        </div>
    </div>

</div>


@endsection