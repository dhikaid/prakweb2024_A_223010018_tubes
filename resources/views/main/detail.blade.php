@extends('main.layouts.main')
@section('main')


<div class="md:flex gap-5  ">
    <div class="md:w-2/3">
        <div class=" rounded-lg mb-4">
            <img class="h-auto w-full rounded-lg shadow-xl dark:shadow-gray-200"
                src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                alt="image description">
        </div>
        <div class="detail-info block md:hidden">
            <h2 class="text-2xl font-bold mb-2 uppercase">
                {{ $event->name }}
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

                    @include('layouts.partials.verified')
                    @endif
                </div>
            </div>
            <div class="my-5">
                <p class="text-gray-600">Mulai dari</p>
                <div class="text-xl font-bold text-black">
                    <p> {{ $event->price_range }}</p>
                </div>
            </div>

            <a href="/event/{{ $event->slug }}/tickets"
                class="text-white bg-purple-600 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-bold rounded-lg w-full inline-block text-lg p-3 text-center me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800 ">BELI
                TIKET</a>
        </div>
        <div class="text-xl text-center w-full text-gray-500 dark:text-gray-400 my-4">
            <ul class="flex w-full justify-between">
                <li class=" w-full">
                    <a href="/event/{{ $event->slug }}"
                        class="inline-block p-1 text-black font-bold border-b-4 border-blue-600 rounded-t-lg active  dark:border-blue-500 w-full text-base"
                        aria-current="page">DETAIL</a>
                </li>
                <li class="w-full">
                    <a href="/event/{{ $event->slug }}/tickets"
                        class="inline-block p-1 text-black font-bold border-b-4  rounded-t-lg active   w-full text-base"
                        aria-current="page">TICKET</a>
                </li>
            </ul>
        </div>

        <div class="text-base leading-loose text-gray-700 my-4">
            {!! $event->description !!}
        </div>
    </div>

    <div class="md:w-1/3 md:pl-6 mt-6 md:mt-0">
        <div class="detail-info hidden md:block">
            <h2 class="text-2xl font-bold mb-2 uppercase">
                {{ $event->name }}
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

                    @include('layouts.partials.verified')
                    @endif
                </div>
            </div>
            <div class="my-5">
                <p class="text-gray-600">Mulai dari</p>
                <div class="text-xl font-bold text-black">
                    <p> {{ $event->price_range }}</p>
                </div>
            </div>

            <a href="/event/{{ $event->slug }}/tickets"
                class="text-white bg-purple-600 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-bold rounded-lg w-full inline-block text-lg p-3 text-center me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800 ">BELI
                TIKET</a>
        </div>
    </div>
</div>


@endsection