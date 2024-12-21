@extends('layouts.layouts')

@section('content')


<div class="main flex h-screen">
    <div class="hidden md:flex flex-col justify-center items-center  w-1/2 bg-indigo-500">
        <img src="{{ asset('assets/undraw_notify_re_65on.svg') }}" alt="">
    </div>
    <div class="p-5 md:p-10 flex flex-col justify-between h-full w-full">
        <div class="main">
            <div class="event space-y-3">
                <p class="">Anda akan memulai WAR Ticket: </p>
                <h1 class="text-3xl md:text-4xl font-bold">{{ $event->name }}</h1>
                <div class="text-gray-800 text-base mb-10 space-y-2 ">
                    <div class="flex gap-2 items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path
                                d="M12 11.993a.75.75 0 0 0-.75.75v.006c0 .414.336.75.75.75h.006a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75H12ZM12 16.494a.75.75 0 0 0-.75.75v.005c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H12ZM8.999 17.244a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.006ZM7.499 16.494a.75.75 0 0 0-.75.75v.005c0 .414.336.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H7.5ZM13.499 14.997a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.005a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.005ZM14.25 16.494a.75.75 0 0 0-.75.75v.006c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75h-.005ZM15.75 14.995a.75.75 0 0 1 .75-.75h.005a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75H16.5a.75.75 0 0 1-.75-.75v-.006ZM13.498 12.743a.75.75 0 0 1 .75-.75h2.25a.75.75 0 1 1 0 1.5h-2.25a.75.75 0 0 1-.75-.75ZM6.748 14.993a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" />
                            <path fill-rule="evenodd"
                                d="M18 2.993a.75.75 0 0 0-1.5 0v1.5h-9V2.994a.75.75 0 1 0-1.5 0v1.497h-.752a3 3 0 0 0-3 3v11.252a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3V7.492a3 3 0 0 0-3-3H18V2.993ZM3.748 18.743v-7.5a1.5 1.5 0 0 1 1.5-1.5h13.5a1.5 1.5 0 0 1 1.5 1.5v7.5a1.5 1.5 0 0 1-1.5 1.5h-13.5a1.5 1.5 0 0 1-1.5-1.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="uppercase">{{ $event->duration }}</p>
                    </div>
                    <div class="flex gap-2 items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p>09:00 - 15:00 WIB</p>
                    </div>
                    <div class="flex gap-2 items-start ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p>{{ $event->locations->venue }}</p>
                    </div>
                </div>
                <p class="mt-3">Diselenggarakan oleh:
                <div class="text-black font-bold text-xl flex  items-center gap-1">
                    <img src="https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1" class="rounded-full w-10 h-10"
                        alt="">
                    <p class="uppercase">{{ $event->creator->fullname }}</p>
                    @if ($event->creator->isVerified)
                    @include('layouts.partials.verified')
                    @endif
                </div>
                </p>
            </div>
            <div class="rules mt-7">
                <p class="font-bold text-xl">Tata Cara Penggunaan</p>
                <div
                    class="overflow-y-scroll h-[calc(100vh-25rem)] md:h-[calc(100vh-30rem)] space-y-4 text-sm md:text-base">
                    <div class="mt-3 ">
                        <ol class="list-decimal list-inside space-y-2 text-gray-800">
                            <li><span class="font-medium">Buat Akun:</span> Pastikan kamu sudah memiliki akun BookRN
                                yang
                                aktif.
                                Jika belum, daftarkan diri terlebih dahulu.</li>
                            <li><span class="font-medium">Masuk ke Acara:</span> Cari acara yang tiketnya ingin kamu
                                beli
                                dan
                                masuk ke halaman detail acara tersebut.</li>
                            <li><span class="font-medium">Gabung ke Waiting Room:</span> Jika tiket acara tersebut
                                sedang
                                menggunakan sistem Waiting Room, kamu akan diarahkan untuk bergabung ke antrian.</li>
                            <li><span class="font-medium">Tunggu Giliran:</span> Setelah bergabung, kamu akan diberikan
                                nomor
                                antrian. Sabarlah menunggu giliranmu untuk masuk ke halaman pembelian tiket.</li>
                            <li><span class="font-medium">Siapkan Data:</span> Siapkan semua data yang diperlukan untuk
                                proses
                                pembelian, seperti data kartu kredit atau debit, alamat email, dan nomor telepon.</li>
                            <li><span class="font-medium">Lakukan Pembayaran:</span> Ketika giliranmu tiba, kamu akan
                                diarahkan
                                ke halaman pembayaran. Segera lakukan pembayaran untuk mengamankan tiketmu.</li>
                            <li><span class="font-medium">Konfirmasi Pembelian:</span> Setelah pembayaran berhasil, kamu
                                akan
                                menerima konfirmasi pembelian melalui email atau aplikasi BookRN.</li>
                        </ol>
                    </div>

                    <div class=" mt-6">
                        <h2 class="text-lg md:text-xl font-semibold  mb-4">Tips Tambahan:</h2>
                        <ul class="list-disc list-inside space-y-2 text-gray-800">
                            <li><span class="font-medium">Jaringan Stabil:</span> Pastikan koneksi internetmu stabil
                                agar
                                tidak
                                kehilangan antrian.</li>
                            <li><span class="font-medium">Browser/Aplikasi Terbaru:</span> Gunakan browser atau aplikasi
                                BookRN
                                versi terbaru untuk menghindari masalah teknis.</li>
                            <li><span class="font-medium">Perangkat Cukup:</span> Pastikan perangkat yang kamu gunakan
                                memiliki
                                spesifikasi yang memadai.</li>
                            <li><span class="font-medium">Baca Syarat dan Ketentuan:</span> Pahami dengan baik syarat
                                dan
                                ketentuan yang berlaku.</li>
                        </ul>
                    </div>

                    <div class=" mt-6">
                        <h2 class="text-lg md:text-xl font-semibold  mb-4">Hal-hal yang Perlu Diperhatikan:</h2>
                        <ul class="list-disc list-inside space-y-2 text-gray-800">
                            <li><span class="font-medium">Waktu Tunggu:</span> Waktu tunggu di Waiting Room bisa sangat
                                bervariasi tergantung popularitas acara dan jumlah orang yang antri.</li>
                            <li><span class="font-medium">Batasan Waktu:</span> Terkadang ada batasan waktu untuk
                                menyelesaikan
                                pembayaran setelah giliran tiba.</li>
                            <li><span class="font-medium">Kegagalan Pembayaran:</span> Jika pembayaran gagal,
                                kemungkinan
                                besar
                                tiket akan kembali ke sistem dan kamu harus mengantre lagi.</li>
                        </ul>
                    </div>

                    <div class=" mt-6">
                        <h2 class="text-lg md:text-xl font-semibold  mb-4">Penting:</h2>
                        <p class="text-gray-800">Detail di atas adalah panduan umum. Tata cara penggunaan Waiting Room
                            bisa
                            sedikit berbeda untuk setiap acara. Selalu perhatikan petunjuk yang diberikan oleh BookRN
                            untuk
                            acara yang ingin kamu ikuti.</p>
                        <p class="text-gray-800 mt-2">Jika mengalami kendala atau memiliki pertanyaan, jangan ragu untuk
                            menghubungi customer service BookRN.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <form action="{{ route('war', ['event' => $event->slug]) }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-indigo-500 px-4 py-2 inline-block rounded-lg w-full text-white font-bold">
                    Oke, saya sudah siap WAR!
                </button>
            </form>
        </div>
    </div>

</div>

@endsection