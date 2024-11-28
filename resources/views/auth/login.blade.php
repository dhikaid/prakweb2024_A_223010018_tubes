@extends('auth.layouts.layouts')
@section('auth')

<div class="relative m-4">
    <h1 class="text-2xl font-semibold text-left mb-2 text-white">Masuk ke Akunmu</h1>
    <p class="text-left mb-6 text-white">Mulai kembali menikmati konser dengan mudah!</p>
    <div class="flex justify-center items-center">
        <div class="bg-white p-6 rounded-2xl shadow-xl relative w-full">
            <div class="transparan absolute -top-4 -left-4 bg-blue-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -top-4 -right-4 bg-blue-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -bottom-4 -right-4 bg-purple-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -bottom-4 -left-4 bg-purple-200 w-12 h-12 rounded-full"></div>

            @if (session()->has('error'))
            <div class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg ">
                <div class="flex items-center justify-center w-5 bg-red-500">
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-red-500 ">Error</span>
                        <p class="text-sm text-gray-600 ">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            </div>
            @elseif(session()->has('success'))
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

            <form class="space-y-2" action="/login" method="post">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1" for="username">Nama Pengguna</label>
                    <input
                        class="w-full border border-gray-300 rounded-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200 "
                        id="username" name="username" type="text" autofocus required autocomplete="off" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="password">Kata Sandi</label>
                    <input
                        class="w-full border border-gray-300 rounded-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                        id="password" name="password" type="password" required required autocomplete="off" />
                </div>
                <div class="text-right">
                    <a class="text-sm text-gray-500 hover:text-gray-300 transition duration-300"
                        href="/lupa-password">Lupa kata sandi?</a>
                </div>
                <button
                    class="w-full bg-purple-600 text-white py-2 rounded-full hover:bg-blue-500 hover:text-white transition duration-300">Masuk</button>
            </form>
            <div class="text-center my-2">Atau masuk dengan</div>
            <div class="flex justify-between space-x-4">
                <form method="POST" action="{{ route('auth.google') }}" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full text-gray-500 bg-white border border-gray-300 py-2 rounded-lg ml-2 flex items-center justify-center hover:bg-purple-300 hover:text-white transition duration-300"><img
                            alt="Google icon" class="w-4 h-4 mr-2" src="/assets/google-icon.png" />Google</button>
                </form>
                <form method="POST" action="{{ route('auth.diakun') }}" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full text-gray-500 bg-white border border-gray-300 py-2 rounded-lg ml-2 flex items-center justify-center hover:bg-purple-300 hover:text-white transition duration-300"><img
                            alt="DiAkun icon" class="w-6 h-6 mr-1" src="/assets/diakun-icon.png" />DiAkun</button>
                </form>
            </div>
            <div class="text-center mt-4">
                <p class="text-sm">Belum memiliki akun? <a
                        class="text-gray-500 hover:text-gray-300 transition duration-300" href="/register">Daftar
                        disini!</a></p>
            </div>
        </div>
    </div>
</div>
<div class="hidden md:block">
    <img alt="login" src="/assets/login.svg" height="600" width="600" />
</div>


@endsection