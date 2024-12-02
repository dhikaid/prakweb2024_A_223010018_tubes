@auth
<div class="total my-5 rounded-lg bg-gray-100 p-3" x-show="getTotal() > 0">
    <div class="mb-3">
        <p class="text-gray-600 text-sm md:text-base">Tiket:</p>
        <!-- Render tiket menggunakan x-for -->
        <template x-for="(ticket, index) in tickets" :key="index">
            <div class="listTicket flex justify-between items-center">
                <p class="text-black text-base md:text-xl" x-text="ticket.name"></p>
                <p class="text-black text-sm md:text-base" x-text="ticket.qty + 'x'"></p>
            </div>
        </template>
    </div>
    <hr class="my-2">
    <div class="price mb-3">
        <p class="text-gray-600 text-sm md:text-base">Total</p>
        <!-- Tampilkan total dinamis -->
        <p class="text-black text-lg md:text-2xl font-bold" x-text="'Rp. ' + getTotal().toLocaleString()"></p>
    </div>

    <a href="/event/{{ $event->slug }}/tickets"        
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-bold rounded-lg w-full inline-block text-lg p-3 text-center me-2 mb-2 dark:bg-blue-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-sm md:text-base">BAYAR
    </a>

</div>
@endauth