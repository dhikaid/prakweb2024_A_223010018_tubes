@extends('layouts.layouts')

@section('content')

@include('dashboard.layouts.navbar')
<div class="container m-auto mt-14 pl-28 px-5">
    @yield('main')
</div>

{{-- SCRIPTS --}}
<script src="{{ asset('js/location.js') }}"></script>

@include('dashboard.layouts.footer')

@endsection