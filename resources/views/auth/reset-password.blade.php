@extends('auth.layouts.layouts')
@section('auth')


<div class="relative m-4">
    <h1 class="text-2xl font-semibold text-left mb-2 text-white">Pulihkan Akunmu</h1>
    <p class="text-left mb-6 text-white">Mulai kembali menikmati konser dengan mudah!</p>
    <div class="bg-white p-6 rounded-2xl shadow-xl relative w-full">
        <div class="transparan absolute -top-4 -left-4 bg-blue-200 w-12 h-12 rounded-full"></div>
        <div class="transparan absolute -bottom-4 -right-4 bg-purple-200 w-12 h-12 rounded-full"></div>
        @if(session()->has('success'))
        <div class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg ">
            <div class="flex items-center justify-center w-5 bg-green-500">
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-green-500 ">Success</span>
                    <p class="text-sm text-gray-600 ">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
        @endif
        <form class="space-y-2" action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}" required>
            <input type="hidden" name="email" value="{{ $email ?? old('email') }}" required>
            <div>
                <label class="block text-sm font-medium mb-1" for="password">Kata Sandi Baru</label>
                <input
                    class="w-full {{ $errors->has('password') ? 'border border-red-500' : 'border border-gray-300' }} rounded-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                    id="password" name="password" type="password" required />
                @error('password') <p class="text-xs text-red-500 m-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="password">Konfirmasi Kata Sandi Baru</label>
                <input
                    class="w-full {{ $errors->has('password_confirmation') ? 'border border-red-500' : 'border border-gray-300' }} rounded-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                    id="password_confirmation" name="password_confirmation" type="password" />
                @error('password_confirmation') <p class="text-xs text-red-500 m-1">{{ $message }}</p> @enderror
            </div>
            <button
                class="w-full bg-purple-600 text-white py-2 rounded-full hover:bg-blue-500 hover:text-white transition duration-300">Ganti
                Kata Sandi</button>
        </form>
    </div>
</div>
<div class="hidden md:block">
    <img alt="login" src="/assets/reset-password.svg" height="400" width="400" />
</div>

@endsection