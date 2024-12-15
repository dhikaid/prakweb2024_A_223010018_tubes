@auth
<div class="total my-5 rounded-2xl bg-white border border-gray-100 shadow-sm p-6" x-show="getTotal() > 0">
    <!-- Header -->
    <div class="mb-6">
        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Detail Pemesanan
        </h3>
    </div>

    <!-- Ticket List -->
    <div class="space-y-4">
        <p class="text-sm font-medium text-gray-600">Tiket yang dipilih:</p>
        
        <!-- Render tiket menggunakan x-for -->
        <template x-for="(ticket, index) in tickets" :key="index">
            <div class="bg-gray-50 rounded-xl p-4 group">
                <div class="flex justify-between items-center">
                    <!-- Ticket Info -->
                    <div>
                        <p class="font-bold text-gray-900" x-text="ticket.name"></p>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-3">
                        <!-- Decrease Button -->
                        <button @click="decreaseTicket(ticket.name)" 
                                class="p-1.5 rounded-lg hover:bg-gray-200 text-gray-500 hover:text-gray-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </button>

                        <!-- Quantity -->
                        <div class="bg-white px-4 py-1.5 rounded-lg border border-gray-200 min-w-[48px] text-center">
                            <span class="font-medium text-gray-900" x-text="ticket.qty + 'x'"></span>
                        </div>

                        <!-- Increase Button -->
                        <button @click="increaseTicket(ticket.name)" 
                                class="p-1.5 rounded-lg hover:bg-gray-200 text-gray-500 hover:text-gray-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>

                        <!-- Delete Button -->
                        <button @click="deleteTicket(ticket.name)" 
                                class="p-1.5 rounded-lg hover:bg-red-100 text-gray-400 hover:text-red-500 transition-colors ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Total Section -->
    <div class="mt-6 pt-6 border-t border-gray-100">
        <div class="flex justify-between items-center mb-6">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Pembayaran</p>
                <p class="text-2xl font-bold text-slate-700" x-text="'Rp. ' + getTotal().toLocaleString()"></p>
            </div>
            <div class="bg-blue-50 p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
        </div>

        <!-- Payment Button -->
        <div x-data="startTransaction('{{ csrf_token() }}', '{{ $event->slug }}')">
            <button id="pay-button"
                    x-on:click="start"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl py-4 px-6 
                        transition-all duration-300 transform hover:scale-[1.02] active:scale-98
                        focus:outline-none focus:ring-4 focus:ring-blue-200
                        shadow-lg shadow-blue-500/20 hover:shadow-blue-500/30
                        flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>BAYAR SEKARANG</span>
            </button>
        </div>
    </div>
</div>
@endauth