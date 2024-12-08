@extends('layouts.layouts')

@section('content')

@include('main.layouts.navbar')
<div class="container max-w-screen-xl m-auto mt-28 px-5">
    @yield('main')
</div>

{{-- SCRIPTS --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script src="{{ asset('js/location.js') }}"></script>
<script src="{{ asset('js/addCart.js') }}"></script>
<script src="{{ asset('js/payment.js') }}"></script>
<script src="{{ asset('js/salam.js') }}"></script>


@include('main.layouts.footer')

@endsection