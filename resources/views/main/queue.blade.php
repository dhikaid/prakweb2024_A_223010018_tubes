@extends('main.layouts.main')

@section('main')
<!-- Back Button -->
<div class="mb-8 transform hover:-translate-x-2 transition-transform duration-300 inline-block">
    <a href="/event/{{ $event->slug }}" class="flex items-center text-gray-700 hover:text-blue-600 group">
        <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none">
            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            <path d="M9 12H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span class="font-semibold">Kembali ke Event</span>
    </a>
</div>

<!-- Main Content Grid -->
<div class="grid lg:grid-cols-2 gap-8">
    <!-- Left Column - Event Info -->
    <div>
        <!-- Event Header Card -->
        <div class="bg-white rounded-3xl p-8 shadow-xl animate-fadeIn border border-blue-100">
            <div class="flex justify-between items-start mb-8">
                <a href="/" class="group">
                    <img src="{{ asset('assets/'.env('PATH_LOGO', 'newlogo.png')) }}"
                        class="w-20 h-auto transform group-hover:scale-105 transition-all duration-300"
                        alt="Logo BookRN">
                </a>
                <div class="flex items-center px-4 py-2 bg-blue-50 rounded-full animate-pulse">
                    <svg class="w-5 h-5 text-blue-600 mr-2" viewBox="0 0 24 24" fill="none">
                        <path d="M12 8V12L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                    </svg>
                    <p class="text-blue-600 font-semibold">War Ticket Berlangsung</p>
                </div>
            </div>

            <div class="space-y-6">
                <!-- Event Name & Date -->
                <div class="space-y-3">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $event->name }}</h1>
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2" />
                            <path d="M3 10H21" stroke="currentColor" stroke-width="2" />
                            <path d="M8 2V6M16 2V6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <p>{{ $event->duration }}</p>
                    </div>
                </div>

                <!-- Event Details Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Time -->
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                        <div class="flex-none w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                                <path d="M12 7V12L15 15" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Waktu Event</p>
                            <p class="font-semibold text-gray-900">{{ $event->range_duration }} WIB</p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                        <div class="flex-none w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12 14C13.6569 14 15 12.6569 15 11C15 9.34315 13.6569 8 12 8C10.3431 8 9 9.34315 9 11C9 12.6569 10.3431 14 12 14Z"
                                    stroke="currentColor" stroke-width="2" />
                                <path
                                    d="M12 22C16 18 20 14.4183 20 11C20 6.58172 16.4183 3 12 3C7.58172 3 4 6.58172 4 11C4 14.4183 8 18 12 22Z"
                                    stroke="currentColor" stroke-width="2" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Lokasi</p>
                            <p class="font-semibold text-gray-900">{{ $event->locations->venue }}</p>
                        </div>
                    </div>
                </div>

                <!-- Organizer -->
                <div class="border-t border-gray-100 pt-6">
                    <p class="text-sm text-gray-500 mb-3">Diselenggarakan oleh:</p>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                        <img src="{{ $event->creator->image }}" alt="{{ $event->creator->fullname }}"
                            class="w-12 h-12 rounded-xl border-2 border-blue-100">
                        <div>
                            <div class="flex items-center gap-2">
                                <p class="font-bold text-gray-900">{{ $event->creator->fullname }}</p>
                                @if ($event->creator->isVerified)
                                @include('layouts.partials.verified')
                                @endif
                            </div>
                            <p class="text-sm text-gray-500">Penyelenggara Event</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column - Available Tickets -->
    <div>
        <div class="bg-white rounded-3xl p-8 shadow-xl animate-slideUp border border-blue-100">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-bold text-gray-900">Tiket Tersedia</h3>
                <svg class="w-8 h-8 text-blue-500" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="8" width="18" height="12" rx="2" stroke="currentColor" stroke-width="2" />
                    <path d="M7 8V6C7 4.34315 8.34315 3 10 3H14C15.6569 3 17 4.34315 17 6V8" stroke="currentColor"
                        stroke-width="2" />
                    <circle cx="12" cy="14" r="2" stroke="currentColor" stroke-width="2" />
                </svg>
            </div>

            <!-- Tickets List -->
            <div class="space-y-4 mb-8">
                @foreach ($tickets as $ticket)
                <div class="group p-6 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300"
                    id="ticket-{{ $ticket->uuid }}">
                    <div class="flex justify-between items-center">
                        <div class="space-y-2">
                            <h4 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">
                                {{ $ticket->ticket }}
                            </h4>
                            <p class="text-base text-gray-600">Rp {{ number_format($ticket->price, 0, ',', '.')
                                }}</p>
                        </div>
                        <div>
                            @if (!$ticket->is_empty)
                            <div class="text-right space-y-2">
                                <div
                                    class="inline-flex items-center px-4 py-2 bg-emerald-50 text-emerald-600 rounded-full">
                                    <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none">
                                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span class="font-semibold">Tersedia</span>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Sisa {{ $ticket->qty_available }} tiket
                                </p>
                            </div>
                            @else
                            <div class="inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-full">
                                <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none">
                                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="font-semibold">Habis</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Queue Status Cards -->
            <div class="border-t border-gray-100 pt-8">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Status Antrian</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Position Card -->
                    <div class="bg-gray-50 rounded-3xl p-6 hover:bg-gray-100 transition-all duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Posisi Antrian</h3>
                            <svg class="w-6 h-6 text-blue-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8Z"
                                    stroke="currentColor" stroke-width="2" />
                                <path d="M3 21C3 17.134 7.02944 14 12 14C16.9706 14 21 17.134 21 21"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl flex items-center justify-center shadow-inner">
                                <span class="text-2xl font-bold text-blue-600" id="position">{{ $queue }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-500">Dari Total Antrian</span>
                                <span class="text-xl font-bold text-gray-900" id="queue">{{ $total_queue ??
                                    '---' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Time Card -->
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl p-6">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="text-lg font-bold text-white">Estimasi Waktu</h3>
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                                <path d="M12 7V12L15 15" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur rounded-2xl flex items-center justify-center">
                                <span class="text-2xl font-bold text-white" id="estimate">{{ $time }}</span>
                            </div>
                            <span class="text-xl font-semibold text-white">menit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.8s ease-out;
    }

    .animate-slideUp {
        animation: slideUp 1s ease-out;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function(e){
        const userUuid = "{{ auth()->user()->uuid }}";

        Echo.private(`queue.${userUuid}`)
            .listen("QueueUpdated", (data) => {
                const positionElement = document.getElementById("position");
                const estimateElement = document.getElementById("estimate");
                const queueElement = document.getElementById("queue");

                if (positionElement) {
                    positionElement.classList.add('animate-pulse');
                    positionElement.innerText = data.position;
                    setTimeout(() => positionElement.classList.remove('animate-pulse'), 1000);
                }

                if (estimateElement) {
                    estimateElement.classList.add('animate-pulse');
                    estimateElement.innerText = data.estimate;
                    setTimeout(() => estimateElement.classList.remove('animate-pulse'), 1000);
                }

                if(queueElement){
                    queueElement.classList.add('animate-pulse');
                    queueElement.innerText = data.total_queue;
                    setTimeout(() => queueElement.classList.remove('animate-pulse'), 1000);
                }

                if (data.status === 'in_progress') {
                    window.location.href = "{{ route('ticket', ['event'=> $event->slug]) }}";
                }
            });

        Echo.channel('tickets.{{ $event->uuid }}')
            .listen('TicketUpdated', (event) => {
                const ticket = event;
                const ticketElement = document.querySelector(`#ticket-${ticket.ticket_id}`);
                if (ticketElement) {
                    ticketElement.classList.add('animate-pulse');
                    setTimeout(() => ticketElement.classList.remove('animate-pulse'), 1000);

                    updateTicketStatus(ticketElement, ticket);
                }
            });

        // window.addEventListener('beforeunload', function (event) {
        //     const queueUuid = "{{ $qid }}";
        //     fetch(`/api/complete-queue-on-close/${queueUuid}`, {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': "{{ csrf_token() }}"
        //         },
        //         body: JSON.stringify({ queueUuid: queueUuid })
        //     });
        // });
    });

    function updateTicketStatus(element, ticket) {
        const statusContainer = element.querySelector('[class*="inline-flex"]');
        const quantityElement = element.querySelector('p.text-sm.text-gray-500');

        if (ticket.is_empty) {
            statusContainer.className = 'inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-full';
            statusContainer.innerHTML = `
                <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="font-semibold">Habis</span>
            `;
            if (quantityElement) quantityElement.remove();
        } else {
            statusContainer.className = 'inline-flex items-center px-4 py-2 bg-emerald-50 text-emerald-600 rounded-full';
            statusContainer.innerHTML = `
                <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none">
                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="font-semibold">Tersedia</span>
            `;
            if (quantityElement) {
                quantityElement.textContent = `Sisa ${ticket.qty_available} tiket`;
            }
        }
    }
</script>
@endsection
