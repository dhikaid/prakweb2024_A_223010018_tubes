@extends('main.layouts.main')
@section('main')

<div class="flex justify-center" x-data="countdown('{{ $payment->tenggat_waktu }}', {{ $payment->isAvailable }})"
    x-init="startCountdown()">
    <div class="w-full max-w-2xl">
        <!-- Back Button -->
        <div class="flex items-center justify-between mb-6">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-gray-700 bg-white rounded-xl border border-gray-200 hover:bg-gray-50 transition-colors group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-gray-500 group-hover:-translate-x-1 transition-transform duration-150"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-medium">Kembali</span>
            </a>
            <span class="text-sm text-gray-500">Payment Details</span>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow border border-gray-100 overflow-hidden">
            <!-- Header Section -->
            <div
                class="relative h-24 bg-gradient-to-r {{ $payment->status === 'settlement' ? 'from-green-500 to-green-400' : 'from-red-500 to-red-400' }}">
                <div class="absolute -bottom-10 inset-x-0 flex justify-center">
                    <div class="bg-white rounded-full p-3 shadow-md">
                        @if($payment->status == 'pending')
                        <div class="bg-red-50 rounded-full p-3">
                            <svg class="size-8 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                            </svg>
                        </div>
                        @elseif($payment->status == 'settlement')
                        <div class="bg-red-50 rounded-full p-3">
                            <svg class="size-8 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" />
                            </svg>
                        </div>
                        @else
                        <div class="bg-red-50 rounded-full p-3">
                            <svg class="size-8 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" />
                            </svg>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="px-6 pt-16 pb-6">
                <!-- Status Title -->
                <h3 class="text-center text-xl font-bold text-gray-900 mb-6 capitalize">
                    Payment {{ $payment->status }}
                </h3>

                <!-- Payment Details -->
                <div class="space-y-4">
                    <!-- ID Payment -->
                    <div
                        class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150">
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">ID Payment</p>
                            <p class="font-semibold text-gray-900">{{ $payment->uuid }}</p>
                        </div>
                        <button class="text-red-500 hover:text-red-600 transition-colors p-2"
                            onclick="navigator.clipboard.writeText('{{ $payment->uuid }}')" title="Copy ID">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </button>
                    </div>

                    @if ($payment->status == 'pending')
                    <!-- Timer -->
                    <div class="bg-red-50 p-4 rounded-xl border border-red-100">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-red-700 text-sm">Batas Waktu Pembayaran</span>
                            </div>
                            <div class="font-bold text-red-600 px-4 py-1.5 rounded-full bg-red-100"
                                x-text="minutes + ' Menit ' + seconds + ' Detik'">
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150">
                        <p class="text-sm text-gray-500 mb-1">Metode Pembayaran</p>
                        <p class="font-semibold text-gray-900 uppercase">{{ $payment->bank ?? $payment->method }}</p>
                    </div>

                    @if($payment->bank !== null)
                    <!-- Virtual Account -->
                    <div
                        class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150">
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Virtual Account</p>
                            <p class="font-semibold text-gray-900">{{ $payment->va }}</p>
                        </div>
                        <button class="text-red-500 hover:text-red-600 transition-colors p-2"
                            onclick="navigator.clipboard.writeText('{{ $payment->va }}')" title="Copy VA Number">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </button>
                    </div>
                    @else
                    <!-- QRIS -->
                    <div class="bg-gray-50 p-6 rounded-xl text-center">
                        <p class="text-sm text-gray-500 mb-4">QRIS</p>
                        <div class="inline-block bg-white p-3 rounded-xl border border-gray-200">
                            <img src="{{ $payment->va }}" class="w-56 h-56 object-contain mx-auto" alt="QRIS Code">
                        </div>
                        <p class="text-sm text-gray-500 mt-4">Scan QR code untuk melakukan pembayaran</p>
                    </div>
                    @endif
                    @endif
                    <!-- Price Details -->
                    <div class="border-t border-gray-100 pt-4 mt-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium text-gray-900">{{ $payment->price }}</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold">
                            <span class="text-slate-800">Total</span>
                            <span class="text-blue-500">{{ $payment->price }}</span>
                        </div>
                    </div>

                    @if($payment->status === 'settlement')
                    <!-- ID Payment -->
                    <a href="/tickets/{{ $payment->uuid }}"
                        class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150">
                        <div class="flex-1 text-gray-500">
                            <p class="text-sm ">Print Ticket</p>
                            <p class="font-semibold text-gray-900">Ticket {{ $payment->booking->event->name }}</p>
                            <p class="text-xs">Tiket juga telah dikirim ke emailmu!</p>
                        </div>
                        <button class="text-indigo-500 hover:text-indigo-600 transition-colors p-2"
                            onclick="navigator.clipboard.writeText('{{ $payment->uuid }}')" title="Copy ID">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection