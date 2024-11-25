@extends('auth.layouts.layouts')
@section('auth')
<div class="flex items-center justify-center space-x-16 h-full">
    <div class="relative">
        <h1 class="text-2xl font-semibold text-left mb-2 text-white">Masuk ke Akunmu</h1>
        <p class="text-left mb-6 text-white">Mulai kembali menikmati konser dengan mudah!</p>

        <div class="bg-white p-6 rounded-2xl shadow-xl relative w-80">
            <div class="transparan absolute -top-4 -left-4 bg-blue-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -top-4 -right-4 bg-blue-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -bottom-4 -right-4 bg-purple-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -bottom-4 -left-4 bg-purple-200 w-12 h-12 rounded-full"></div>
            <form class="space-y-2" action="/login" method="post">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1" for="username">Nama Pengguna</label>
                    <input
                        class="w-full border border-gray-300 rounded-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200 "
                        id="username" name="username" type="text" autofocus required />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="password">Kata Sandi</label>
                    <input
                        class="w-full border border-gray-300 rounded-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                        id="password" name="password" type="password" required />
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
                <button
                    class="w-1/2 text-gray-500 bg-white border border-gray-300 py-2 rounded-lg ml-2 flex items-center justify-center hover:bg-purple-300 hover:text-white transition duration-300"><img
                        alt="Google icon" class="w-4 h-4 mr-2" src="/assets/google-icon.png" />Google</button>
                <button
                    class="w-1/2 text-gray-500 bg-white border border-gray-300 py-2 rounded-lg ml-2 flex items-center justify-center hover:bg-purple-300 hover:text-white transition duration-300"><img
                        alt="DiAkun icon" class="w-6 h-6 mr-1" src="/assets/diakun-icon.png" />DiAkun</button>
            </div>
            <div class="text-center mt-4">
                <p class="text-sm">Belum memiliki akun? <a
                        class="text-gray-500 hover:text-gray-300 transition duration-300" href="/register">Daftar
                        disini!</a></p>
            </div>
        </div>
    </div>
    <div class="hidden md:block">
        <img alt="login" src="/assets/login.svg" height="400" width="400" />
    </div>
</div>
<div class="absolute bottom-4 left-6">
    <button
        class="bg-blue-200 text-black px-4 py-2 rounded-full hover:bg-purple-100 hover:text-gray-500 transition duration-300">Kembali</button>
</div>
@endsection