@extends('main.layouts.main')
@section('main')
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
<div class="min-h-screen  text-black">
  <div class=" py-5">
    <div class="container mx-auto px-6 lg:px-20">
      <div class="grid lg:grid-cols-2 gap-8 items-center">
        <!-- Bagian Kiri: Gambar -->
        <div class="relative ">
          <img 
            src="https://images.unsplash.com/photo-1522158637959-30385a09e0da?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            alt="About Us" 
            class="rounded-lg shadow-lg object-cover w-full h-96"
          />
          <div class="absolute inset-0 bg-black bg-opacity-30 rounded-lg"></div>
        </div>
  
        <!-- Bagian Kanan: Konten -->
        <div>
          <h2 class="text-4xl font-bold text-gray-800 mb-4">
            Tentang Kami
          </h2>
          <p class="text-gray-600 text-lg leading-relaxed mb-6">
            Selamat datang di <span class="font-bold text-blue-600">BookRN</span>, platform utama
    untuk mempermudah Anda menemukan, mengelola, dan menghadiri acara-acara terbaik di sekitar Anda.
          </p>
          <h3 class="text-2xl font-semibold mb-4 text-black">Apa yang Kami tawarkan?</h3>
          <ul class="space-y-4">
            <li class="flex items-center">
              <span class="w-6 h-6 flex justify-center items-center bg-blue-500 text-white rounded-full mr-4">
                ✓
              </span>
              <span class="text-gray-700">
                Pencarian acara berdasarkan kategori, lokasi, atau minat Anda.
              </span>
            </li>
            <li class="flex items-center">
              <span class="w-6 h-6 flex justify-center items-center bg-blue-500 text-white rounded-full mr-4">
                ✓
              </span>
              <span class="text-gray-700">
                Proses pemesanan tiket yang cepat dan mudah.
              </span>
            </li>
            <li class="flex items-center">
              <span class="w-6 h-6 flex justify-center items-center bg-blue-500 text-white rounded-full mr-4">
                ✓
              </span>
              <span class="text-gray-700">
                Notifikasi dan pembaruan real-time tentang acara Anda.
              </span>
            </li>
            <li class="flex items-center">
              <span class="w-6 h-6 flex justify-center items-center bg-blue-500 text-white rounded-full mr-4">
                ✓
              </span>
              <span class="text-gray-700">
                Layanan pelanggan yang siap membantu Anda kapan saja.
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Our Mission Section -->
  <div class="py-8 px-4 md:px-8 lg:px-12 bg-gray">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-8 text-black">Misi Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="p-4 block w-100 overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
        <h3 class="text-2xl font-semibold mb-2 text-black">Menciptakan Koneksi</h3>
        <p class="text-gray-800">
          Kami percaya bahwa setiap acara adalah kesempatan untuk menciptakan kenangan, mempererat hubungan, dan membuka peluang baru.
        </p>
      </div>
      <div class="p-4 block w-100 overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
        <h3 class="text-2xl font-semibold mb-2 text-black">Pengalaman Mulus</h3>
        <p class="text-gray-800">
          Dengan teknologi terbaik, kami memastikan setiap langkah perjalanan acara Anda menjadi mudah, cepat, dan efisien.
        </p>
      </div>
    </div>
  </div>

  <!-- Values Section -->
  <div class="py-8 px-4 md:px-8 lg:px-12 ">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-8 text-black">Nilai Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <div class="p-4  block w-100 overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center">
        <h3 class="text-xl font-semibold mb-2 text-black">Inovasi</h3>
        <p class="text-gray-800">
          Kami terus mencari cara untuk meningkatkan layanan dan menciptakan solusi baru untuk kebutuhan Anda.
        </p>
      </div>
      <div class="p-4  block w-100 overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center">
        <h3 class="text-xl font-semibold mb-2 text-black">Kepuasan Pelanggan</h3>
        <p class="text-gray-800">
          Kami memastikan setiap pengguna mendapatkan layanan terbaik dengan solusi yang dipersonalisasi.
        </p>
      </div>
      <div class="p-4  block w-100 overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center">
        <h3 class="text-xl font-semibold mb-2 text-black">Kepercayaan</h3>
        <p class="text-gray-800">
          Keamanan dan transparansi adalah prioritas utama kami dalam menjaga kepercayaan Anda.
        </p>
      </div>
    </div>
  </div>

  <!-- Team Section -->
  <div class="py-8 px-4 md:px-8 lg:px-12 ">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-8 text-black">Tim Kami</h2>
    <p class="text-center text-gray-800 max-w-4xl mx-auto mb-8">
      Di balik platform BookRN adalah tim profesional yang berdedikasi, penuh semangat, dan
            berkomitmen untuk memberikan pengalaman terbaik kepada Anda. Kami terus bekerja keras untuk memastikan
            setiap acara yang Anda hadiri menjadi momen yang tak terlupakan.
    </p>
    <div class="flex flex-wrap justify-center gap-4">
      <div class="w-32 text-center">
        <img class="rounded-full mb-2" src="https://via.placeholder.com/150" alt="Team Member">
        <h4 class="text-lg font-semibold text-black">John Doe</h4>
        <p class="text-gray-600">CEO</p>
      </div>
      <div class="w-32 text-center">
        <img class="rounded-full mb-2" src="https://via.placeholder.com/150" alt="Team Member">
        <h4 class="text-lg font-semibold text-black">Jane Smith</h4>
        <p class="text-gray-600">CTO</p>
      </div>
      <div class="w-32 text-center">
        <img class="rounded-full mb-2" src="https://via.placeholder.com/150" alt="Team Member">
        <h4 class="text-lg font-semibold text-black">Sam Wilson</h4>
        <p class="text-gray-600">CMO</p>
      </div>
    </div>
  </div>

  <!-- Call to Action Section -->
  <div class=" py-8 px-4 md:px-8 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Bergabunglah dengan Kami!</h2>
    <p class="text-gray-600 mt-6">Terima kasih telah mempercayai <span class="font-bold text-blue-600">BookRN</span> sebagai
      mitra Anda dalam menghadiri acara. Mari kita ciptakan pengalaman luar biasa bersama!</p>
    <a href="{{ route('register') }}" class="inline-block mt-6 px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
        Daftar Sekarang
    </a>
  </div>
</div>



@endsection