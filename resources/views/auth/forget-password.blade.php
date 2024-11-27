@extends('auth.layouts.layouts')
@section('auth')

<div class="hidden md:block">
    <img alt="login" src="/assets/lupa-password.svg" height="600" width="600" />
</div>
<div class="relative m-4">
    <h1 class="text-2xl font-semibold text-left mb-2 text-white">Pulihkan Akunmu</h1>
    <p class="text-left mb-6 text-white">Mulai kembali menikmati konser dengan mudah!</p>
    <div class="flex justify-center items-center">
        <div class="bg-white p-6 rounded-2xl shadow-xl relative w-full">
            <div class="transparan absolute -top-4 -right-4 bg-blue-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -bottom-4 -left-4 bg-purple-200 w-12 h-12 rounded-full"></div>
            @if (session('status'))
            <p class="text-green-500 text-sm">{{ session('status') }}</p>
            @endif

            @if ($errors->any())
            <div class="text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="space-y-2" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1" for="email">Email</label>
                    <input
                        class="w-full border border-gray-300 rounded-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                        id="email" name="email" type="email" required aria-label="Email" />
                </div>
                <button
                    class="w-full bg-purple-600 text-white py-2 rounded-full hover:bg-blue-500 hover:text-white transition duration-300">Kirim
                    Email</button>
            </form>
        </div>
    </div>
</div>


@endsection