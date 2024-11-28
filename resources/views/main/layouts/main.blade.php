@extends('layouts.layouts')

@section('content')

@include('main.layouts.navbar')
<div class="container max-w-screen-xl m-auto mt-28">
    @yield('main')
</div>
@include('main.layouts.footer')

@endsection