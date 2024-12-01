@extends('main.layouts.main')
@section('main')

<div class="w-full p-6 flex flex-col md:flex-row bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-white-800 dark:border-white-700">
    <div class="md:w-2/3">
        <div class="border rounded-lg p-4 mb-4">        
            <img class="h-auto max-w-full rounded-lg shadow-xl dark:shadow-gray-200" src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg" alt="image description">
        </div>

        <div class="text-xl text-center text-gray-500 border-b border-gray-600 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex flex-wrap">
                <li class="me-2">
                    <a href="#" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500" aria-current="page">Detail</a>
                </li>
                <li class="me-2">
                    <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Tiket</a>
                </li>
            </ul>
        </div>

        <div class="text-sm text-gray-700">
            <p class="mb-2">SYARAT DAN KETENTUAN PEMBELIAN DI WWW.ISMAYALIVE.COM TELAH SAYA BACA DAN PAHAMI SEPENUHNYA. SAYA MENGERTI DAN SETUJU UNTUK TERIKAT SECARA HUKUM DENGAN SYARAT &amp; KETENTUAN YANG BERLAKU.</p>
            <p class="mb-2">THE TERMS AND CONDITIONS OF PURCHASE AT WWW.ISMAYALIVE.COM HAVE BEEN FULLY READ AND UNDERSTOOD BY ME. I UNDERSTAND AND AGREE TO BE LEGALLY BOUND BY THE TERMS &amp; CONDITIONS.</p>
            <p class="font-bold mb-2">WAJIB / DIPERLUKAN!!!</p>
            <ol>
                <li>
                    <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                    <li>Jika tiket atas nama Anda sendiri, Anda hanya perlu menunjukkan BARCODE pada e-voucher saat memasuki area pertunjukan.
                        If the ticket is in your own name, you only need to show the BARCODE on the e-voucher when entering the performance area.
                    </li>
                    <li>Harap membawa dan menunjukkan kartu identitas yang masih berlaku(Paspor/SIM/Kartu Pelajar/Akta Kelahiran (nama harus sesuai dengan yang tertera di e-voucher).
                        Please bring and show a valid ID card/Passport/SIM/Student Card/Birth Certificate (name must be according to the one on the E-voucher).
                    </li>
                    <li>Bagi pembeli yang menggunakan kartu kredit untuk membeli tiket, pastikan untuk membawa kartu kredit yang digunakan untuk membeli tiket anda dan juga kartu identitas Anda. (nama yang tertera didalamnya harus sama dengan nama pada E-voucher).
                        For buyers who use a credit card to purchase tickets, be sure to bring the credit card used to purchase your tickets and also your identity card. (The name on both must match the name on the E-voucher).
                    </li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>

    <div class="md:w-1/3 md:pl-6 mt-6 md:mt-0">
        <h2 class="text-xl font-bold mb-2">
            INTRODUCTION GDGOC UNPAS
        </h2>
        <div class="text-gray-600 mb-4">
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path d="M12 11.993a.75.75 0 0 0-.75.75v.006c0 .414.336.75.75.75h.006a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75H12ZM12 16.494a.75.75 0 0 0-.75.75v.005c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H12ZM8.999 17.244a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.006ZM7.499 16.494a.75.75 0 0 0-.75.75v.005c0 .414.336.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H7.5ZM13.499 14.997a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.005a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.005ZM14.25 16.494a.75.75 0 0 0-.75.75v.006c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75h-.005ZM15.75 14.995a.75.75 0 0 1 .75-.75h.005a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75H16.5a.75.75 0 0 1-.75-.75v-.006ZM13.498 12.743a.75.75 0 0 1 .75-.75h2.25a.75.75 0 1 1 0 1.5h-2.25a.75.75 0 0 1-.75-.75ZM6.748 14.993a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" />
                    <path fill-rule="evenodd" d="M18 2.993a.75.75 0 0 0-1.5 0v1.5h-9V2.994a.75.75 0 1 0-1.5 0v1.497h-.752a3 3 0 0 0-3 3v11.252a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3V7.492a3 3 0 0 0-3-3H18V2.993ZM3.748 18.743v-7.5a1.5 1.5 0 0 1 1.5-1.5h13.5a1.5 1.5 0 0 1 1.5 1.5v7.5a1.5 1.5 0 0 1-1.5 1.5h-13.5a1.5 1.5 0 0 1-1.5-1.5Z" clip-rule="evenodd" />
                </svg>
                <p> 5 DEC 2024</p>
            </div>
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                </svg>
                <p class="flex">09:00 - 15:00 WIB</p>
            </div>
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                </svg> 
                <p>Aula Mandala Saba Otto Iskandardinata Universitas Pasundan Setiabudhi</p>
            </div>
        </div>
        <div class="mb-4">
            <div class="text-gray-600">
                <p>Diselenggarakan oleh</p>
            </div>
            <div class="text-black font-bold flex">                  
                <p>@GDGOCUNPAS</p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-6">
                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                </svg> 
            </div>
        </div>
        <div class="mb-4">
            <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 0 1-.375.65 2.249 2.249 0 0 0 0 3.898.75.75 0 0 1 .375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 17.625v-3.026a.75.75 0 0 1 .374-.65 2.249 2.249 0 0 0 0-3.898.75.75 0 0 1-.374-.65V6.375Zm15-1.125a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0V6a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0v.75a.75.75 0 0 0 1.5 0v-.75Zm-.75 3a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0v-.75a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75ZM6 12a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 12Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
              </svg>
            <p class="text-gray-600">Mulai dari</p>
            </div>
            <div class="text-lg font-bold text-black">
                <p>Rp. 50.000</p>
            </div>
        </div>

        <button type="button" class="text-white bg-purple-600 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-bold rounded-full w-full text-sm px-4 py-2 text-center me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">BELI TIKET</button>
    </div>
</div>

@endsection
