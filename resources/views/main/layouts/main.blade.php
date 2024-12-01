@extends('layouts.layouts')

@section('content')

@include('main.layouts.navbar')
<div class="container max-w-screen-xl m-auto mt-28 px-5">
    @yield('main')
</div>

{{-- SCRIPTS --}}
<script src="{{ asset('js/location.js') }}"></script>
@include('main.layouts.footer')

@endsection
