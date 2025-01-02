@extends('auth.layouts.layouts')
@section('auth')



<div class="relative">
    <h1 class="text-2xl font-semibold text-left mb-2 text-white">Daftarkan Akunmu</h1>
    <p class="text-left mb-6 text-white">Mulai menikmati konser dengan mudah!</p>

    <div class="flex justify-center items-center">
        <div class="bg-white p-5 rounded-2xl shadow-xl relative w-full">
            <div class="transparan absolute -top-4 -left-4 bg-blue-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -top-4 -right-4 bg-blue-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -bottom-4 -right-4 bg-purple-200 w-12 h-12 rounded-full"></div>
            <div class="transparan absolute -bottom-4 -left-4 bg-purple-200 w-12 h-12 rounded-full"></div>
            <form class="space-y-2" action="/register" method="post">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1" for="username">Nama Pengguna</label>
                    <input
                        class="w-full  rounded-full px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200 {{ $errors->has('username') ? 'border border-red-500' : 'border border-gray-300' }} text-sm"
                        id=" username" name="username" type="text" required autocomplete="off"
                        value="{{ old('username') }}" />
                    @error('username') <p class="text-xs text-red-500 m-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="fullname">Nama Lengkap</label>
                    <input
                        class="w-full {{ $errors->has('fullname') ? 'border border-red-500' : 'border border-gray-300' }} text-sm rounded-full px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200 "
                        id="fullname" name="fullname" type="text" required autocomplete="off"
                        value="{{ old('fullname') }}" />
                    @error('fullname') <p class="text-xs text-red-500 m-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="email">Email</label>
                    <input
                        class="w-full {{ $errors->has('email') ? 'border border-red-500' : 'border border-gray-300' }} text-sm rounded-full px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                        id="email" name="email" type="email" required autocomplete="off" value="{{ old('email') }}" />
                    @error('email') <p class="text-xs text-red-500 m-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="password">Kata Sandi</label>
                    <input
                        class="w-full {{ ($errors->has('password') ) ? 'border border-red-500' : 'border border-gray-300' }} text-sm rounded-full px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                        id="password" name="password" type="password" required autocomplete="off" />
                    @error('password') <p class="text-xs text-red-500 m-1">{{ $message }}</p> @enderror

                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="confirm_password">Konfirmasi Kata
                        Sandi</label>
                    <input
                        class="w-full {{ ( $errors->has('password_confirmation')) ? 'border border-red-500' : 'border border-gray-300' }} rounded-full px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200"
                        id="confirm password" name="password_confirmation" type="password" required
                        autocomplete="off" />
                    @error('password_confirmation') <p class="text-xs text-red-500 m-1">{{ $message }}</p> @enderror
                </div>
                <button
                    class="w-full bg-purple-600 text-white py-2 rounded-full hover:bg-blue-500 hover:text-white transition duration-300">Daftar</button>
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
                <p class="text-sm">Sudah memiliki akun? <a
                        class="text-gray-500 hover:text-gray-300 transition duration-300" href="/login">Login
                        disini!</a></p>
            </div>
        </div>
    </div>
</div>
<div class="hidden md:block">
    <img alt="login" src="/assets/regist.svg" height="600" width="600" />
</div>



@endsection