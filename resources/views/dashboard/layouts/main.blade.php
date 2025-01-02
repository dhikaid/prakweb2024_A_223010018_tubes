@extends('layouts.layouts')

@section('content')
@include('dashboard.layouts.navbar')
<div class="ms-16 md:ms-72 me-10">
    @yield('main')
</div>

{{-- SCRIPTS --}}
<script src="{{ asset('js/location.js') }}"></script>

<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });
</script>

@include('dashboard.layouts.footer')

@endsection