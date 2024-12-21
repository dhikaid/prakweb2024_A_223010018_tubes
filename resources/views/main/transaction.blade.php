@extends('main.layouts.main')
@section('main')

<div class="flex justify-center items-center h-screen w-full"
    x-data="countdown('{{ $payment->tenggat_waktu  }}', {{ $payment->isAvailable }})" x-init="startCountdown()">
    <div class="relative bg-white border border-gray-300 rounded-xl m-0 p-6 w-full">
        <!-- Icon -->
        <div class="flex justify-center mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-full flex justify-center items-center">
                @if($payment->status == 'pending')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-12 text-orange-500">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                        clip-rule="evenodd" />
                </svg>
                @elseif($payment->status == 'settlement')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-12 text-green-500">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                        clip-rule="evenodd" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-12 text-red-600">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                        clip-rule="evenodd" />
                </svg>
                @endif

            </div>
        </div>
        <h3 class="text-center text-lg font-semibold text-gray-800 mb-6 capitalize">Payment {{ $payment->status }}</h3>
        <!-- Details -->
        <div class="text-sm text-gray-600 space-y-2">
            <div class="flex justify-between">
                <span>ID Payment</span>
                <span class="font-medium text-gray-800">{{ $payment->uuid }}</span>
            </div>
            @if ($payment->status == 'pending')
            <div class="flex justify-between">
                <span>Tenggat waktu pembayaran</span>
                {{-- <span class="font-medium text-gray-800">{{ $payment->tenggat_waktu }}</span> --}}

                <div class="font-medium text-white px-5 py-1 rounded-full bg-red-500/70 te"
                    x-text="minutes + ' Menit ' + seconds + ' Detik'">
                </div>
            </div>
            <div class="flex justify-between">
                <span>Metode pembayaran</span>
                <span class="font-medium text-gray-800 uppercase">{{ $payment->bank ?? $payment->method }}</span>
            </div>
            @if($payment->bank !== null)
            <div class="flex justify-between">
                <span>Virtual Account</span>
                <span class="font-medium text-gray-800">{{ $payment->va }}</span>
            </div>
            @else
            <div class="">
                <span>QRIS</span>
                <img src="{{ $payment->va }}" class="rounded-md m-auto size-56 md:size-64 " alt="">
            </div>
            @endif
            @endif

            <hr class="my-4 border-gray-200" />
            <div class="flex justify-between">
                <span>Subtotal</span>
                <span class="font-medium text-gray-800">{{ $payment->price }}</span>
            </div>
            <div class="flex justify-between text-lg font-semibold text-gray-800">
                <span>Total</span>
                <span>{{ $payment->price
                    }}</span>
            </div>
        </div>

        <div class="absolute inset-x-0 bottom-[-20px] flex justify-center">
            <div class="bg-white  h-6 rounded-b-lg shadow-md"></div>
        </div>
    </div>
</div>



@endsection