@extends('layouts.layouts')

@section('content')

<div class="flex flex-col min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">
    @include('main.layouts.navbar')

    <div class="container max-w-screen-xl mx-auto px-5 mt-16 md:mt-28 flex-grow">
        @yield('main')
    </div>

    <div class="mt-8">@include('main.layouts.partials.popupai')</div>
    <div class="mt-8">@include('main.layouts.footer')</div>
</div>

{{-- SCRIPTS --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script src="{{ asset('js/location.js') }}"></script>
<script src="{{ asset('js/addCart.js') }}"></script>
<script src="{{ asset('js/payment.js') }}"></script>
<script src="{{ asset('js/salam.js') }}"></script>
<script src="{{ asset('js/ai.js') }}"></script>

@endsection
