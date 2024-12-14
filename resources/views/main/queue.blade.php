@extends('layouts.layouts')

@section('content')


<div class="main flex h-screen">
    <div class="hidden md:flex flex-col justify-center items-center  w-1/2 bg-indigo-500">
        <img src="{{ asset('assets/undraw_notify_re_65on.svg') }}" alt="">
    </div>
    <div class="p-5 md:p-10 flex flex-col justify-between h-full w-full">
        <div class="main">
            <div class="event space-y-3">
                <a href="/"> <img src="{{ asset('assets/bookrn.png') }}" class="w-16" alt=""></a>
                <div class="rules mb-7">
                    <p class="font-bold text-2xl md:text-4xl">Renggangkan jarimu dan amankan tiketmu!</p>
                </div>
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
        </div>
        <div class="w-full space-y-3 my-4">
            <p class="text-md md:text-xl">Anda sekarang berada di posisi antrian: </p>
            <div class="flex items-center gap-2 text-black">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                    <path
                        d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                </svg>
                <p class="text-4xl md:text-5xl font-bold" id="position">{{ $queue }}</p>
            </div>
        </div>
        <div class="w-full space-y-3 ">
            <p class="text-md md:text-xl">Perkiraan giliran anda tiba: </p>
            <div class="flex items-center gap-3  bg-indigo-500 text-white px-4 py-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                        clip-rule="evenodd" />
                </svg>

                <p class="text-4xl md:text-5xl font-bold" id="estimate">
                    {{$time}}
                    menit
                </p>
            </div>
        </div>
        <div class="w-full space-y-3 mt-10">
            <p class="text-xl">Informasi Tiket Sekarang: </p>
            <div class="md:flex gap-1">
                @foreach ($tickets as $ticket)
                <div class="bg-gray-200 w-full p-5 mb-4 rounded-tl-3xl rounded-br-3xl flex justify-between items-center"
                    id="ticket-{{ $ticket->uuid }}">
                    <p class="font-bold text-xl">{{ $ticket->ticket }}</p>
                    <div class="">
                        @if (!$ticket->is_empty)
                        <div class="masihAda">
                            <p class="bg-emerald-600 text-white p-2 rounded-lg status">Masih tersedia</p>
                            <p class="available">Sisa {{ $ticket->qty_available }}</p>
                        </div>
                        @else

                        <p class="bg-red-600 text-white p-2 rounded-lg status">Sudah Habis</p>

                        @endif

                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function(e){
        const userUuid = "{{ auth()->user()->uuid }}";

        Echo.private(`queue.${userUuid}`)
            .listen("QueueUpdated", (data) => {
                console.log("Pembaruan antrian diterima:", data);
                document.getElementById("position").innerText = `${data.position}`;
                document.getElementById("estimate").innerText = `${data.estimate} menit`;
                console.log(data.status);
                if (data.status === 'in_progress') {
                        window.location.href = "{{ route('ticket', ['event'=> $event->slug]) }}";
                }
            });

            Echo.channel('tickets.{{ $event->uuid }}')
                .listen('TicketUpdated', (event) => {
                    // Ambil data tiket dari event
                    const ticket = event;
                    console.log(event);
                    // Update tampilan tiket
                    const ticketElement = document.querySelector(`#ticket-${ticket.ticket_id}`);
                    if (ticketElement) {

                        const availableElement = ticketElement.querySelector('.available');
                        const statusElement = ticketElement.querySelector('.status');

                        if (ticket.is_empty) {
                            statusElement.textContent = 'Sudah Habis';
                            statusElement.classList.add('bg-red-600');
                            statusElement.classList.remove('bg-emerald-600');
                            availableElement.textContent = ``;
                        } else {
                            availableElement.textContent = `Sisa ${ticket.qty_available}`;
                            statusElement.textContent = 'Masih tersedia';
                            statusElement.classList.add('bg-emerald-600');
                            statusElement.classList.remove('bg-red-600');
                        }
                    }
                });

            window.addEventListener('beforeunload', function (event) {
                // Ambil UUID antrian dari data yang ada di halaman
                const queueUuid = "{{ $qid }}";

                // Kirim request untuk mengubah status antrian menjadi 'completed'
                fetch(`/api/complete-queue-on-close/${queueUuid}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ queueUuid: queueUuid })
                }).then(response => {
                    if (response.ok) {
                        console.log('Status antrian berhasil diperbarui menjadi completed');
                    }
                }).catch(error => {
                    console.error('Terjadi kesalahan saat memperbarui status:', error);
                });
            });
    });
</script>
@endsection