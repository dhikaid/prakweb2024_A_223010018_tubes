@extends('main.layouts.main') @section('main')

<div class="mb-5 transform hover:-translate-x-2 transition-transform duration-300 inline-block">
    <a href="{{ route('home') }}" class="flex items-center text-gray-700 hover:text-blue-600 group">
        <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none">
            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            <path d="M9 12H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span class="font-semibold">Kembali ke Home</span>
    </a>
  </div>
<div class="py-5 px-6 lg:px-24">
    <div class="bg-white shadow-lg rounded-lg p-8 lg:p-12">
      <h1 class="text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-gray-200 pb-4">Syarat dan Ketentuan</h1>
      <p class="text-gray-600 leading-relaxed mb-6">
        Selamat datang di <span class="font-bold text-blue-600">BookRN</span>! Dengan menggunakan layanan kami, Anda dianggap
        telah menyetujui syarat dan ketentuan berikut:
      </p>
  
      <ol class="list-decimal list-outside space-y-8 text-gray-700">
        <li>
          <div>
            <span class="font-semibold text-lg">Pendaftaran Akun:</span>
            <p class="ml-6 text-gray-600 leading-relaxed">
              Pengguna wajib mendaftar dengan informasi yang benar dan akurat. Informasi ini akan digunakan untuk memvalidasi
              pembelian tiket Anda.
            </p>
          </div>
        </li>
        <li>
          <div>
            <span class="font-semibold text-lg">Pembelian Tiket:</span>
            <p class="ml-6 text-gray-600 leading-relaxed">
              Semua tiket yang dibeli melalui platform kami tidak dapat dibatalkan atau dikembalikan kecuali dinyatakan sebaliknya
              oleh penyelenggara acara.
            </p>
          </div>
        </li>
        <li>
          <div>
            <span class="font-semibold text-lg">Sistem Waiting Room:</span>
            <p class="ml-6 text-gray-600 leading-relaxed">
              Untuk beberapa acara, kami menerapkan sistem Waiting Room. Harap mengikuti antrian yang ditentukan untuk memastikan
              keadilan.
            </p>
          </div>
        </li>
        <li>
          <div>
            <span class="font-semibold text-lg">Data Pribadi:</span>
            <p class="ml-6 text-gray-600 leading-relaxed">
              BookRN berkomitmen untuk melindungi data pribadi Anda sesuai dengan
              <a href="/privacy" class="text-blue-600 hover:underline">kebijakan privasi</a> kami.
            </p>
          </div>
        </li>
        <li>
          <div>
            <span class="font-semibold text-lg">Tanggung Jawab Pengguna:</span>
            <p class="ml-6 text-gray-600 leading-relaxed">
              Pengguna bertanggung jawab penuh atas penggunaan akun mereka, termasuk menjaga keamanan informasi login.
            </p>
          </div>
        </li>
      </ol>
  
      <p class="text-gray-600 mt-8 leading-relaxed">
        Dengan menggunakan platform kami, Anda menyetujui semua syarat dan ketentuan yang berlaku. Jika Anda memiliki pertanyaan,
        silakan <a href="/contact" class="text-blue-600 hover:underline">hubungi kami</a>.
      </p>
    </div>
  </div>
  
  
@endsection