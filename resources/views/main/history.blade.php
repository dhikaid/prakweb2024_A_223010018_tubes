@extends('main.layouts.main')
@section('main')

<div class="min-h-screen ">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-5">My Order</h1>
        <div class="mb-4 md:flex justify-between items-center">
            <div class="flex space-x-2">
                <a href="/history"
                    class="inline-flex items-center h-9 px-3 py-1 -mb-px text-sm text-gray-600 bg-white rounded-md focus:outline-none">
                    All
                </a>
                <a href="/history?status=success"
                    class="inline-flex items-center h-9 px-3 py-1 -mb-px text-sm text-green-600 bg-green-50 rounded-md focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    Success
                </a>
                <a href="/history?status=failed"
                    class="inline-flex items-center h-9 px-3 py-1 -mb-px text-sm text-red-600 bg-red-50 rounded-md focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Failed
                </a>
            </div>
            <form method="GET" class="relative mt-4 rounded-xl">
                <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="query"
                    class="block w-full pl-8 pr-2 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-300 sm:text-sm"
                    placeholder="Search orders...">
            </form>
        </div>

        <div class="grid gap-6 sm:grid-cols-1 lg:grid-cols-1">
            @foreach($history as $payment)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-gray-600 text-sm">Events</span>
                        @if ($payment->status === 'settlement')
                        <span
                            class="bg-green-300 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Berhasil</span>
                        @elseif ($payment->status === 'pending')
                        <span
                            class="bg-orange-300 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Pending</span>
                        @else
                        <span
                            class="bg-red-300 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Failed</span>
                        @endif

                    </div>
                    <p class="block font-bold text-xl text-gray-800  mb-2">{{
                        $payment->booking->event->name ?? 'Event tidak tersedia' }}</p>
                    <p class="text-gray-600 text-sm mb-1">ID Transaksi: {{ $payment->uuid }}</p>
                    <p class="text-gray-600 text-sm mb-1">Total Pembayaran: {{ $payment->price }}</p>
                    <p class="text-gray-600 text-sm mb-4">Tanggal Pembayaran: {{ $payment->created_at }}</p>
                    <div class="flex items-center justify-between mt-4">
                        <a href="/tickets/{{ $payment->uuid }}"
                            class="inline-flex items-center text-blue-600 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            Download Tiket
                        </a>
                        <div class="flex items-center">
                            <img class="hidden object-cover w-8 h-8 rounded-full sm:block"
                                src="{{ Auth::user()->image }}" alt="avatar">
                            <span class="font-medium text-gray-700 ml-2">{{ Auth::user()->username }}</span>
                            @if (auth()->user()->isVerified)
                            <span class="inline-flex items-center ml-2 text-xs text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                                Terverifikasi
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="flex justify-center items-center mt-14">
        {{ $history->links() }}
    </div>
</div>
@endsection