@extends('layouts.layouts')

@section('content')

<div class="bg-img-auth w-full h-screen background-image flex items-center justify-center">
    <div class="flex items-center justify-center h-full gap-16">
        @yield('auth')
    </div>
    <div class="fixed bottom-4 left-6">
        <a href="{{{ url()->previous() }}}"
            class="bg-blue-200 text-black px-4 py-2 rounded-full hover:bg-purple-100 hover:text-gray-500 transition duration-300">Kembali</a>
    </div>
</div>

@endsection