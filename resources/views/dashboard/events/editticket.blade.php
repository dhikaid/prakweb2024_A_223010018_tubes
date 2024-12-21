@extends('dashboard.layouts.main')
@section('main')

{{-- TULIS CODE DISINI --}}

<section class="roles">
    <div class="flex flex-col">
        <div class="info my-4">
            @include('dashboard.layouts.partials.breadcumb', [$datas = ['Events', $event->name, 'Tickets',
            $ticket->ticket, 'Edit']])
            <div class="flex items-center gap-3 my-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                    <path fill-rule="evenodd"
                        d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 0 1-.375.65 2.249 2.249 0 0 0 0 3.898.75.75 0 0 1 .375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 17.625v-3.026a.75.75 0 0 1 .374-.65 2.249 2.249 0 0 0 0-3.898.75.75 0 0 1-.374-.65V6.375Zm15-1.125a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0V6a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0v.75a.75.75 0 0 0 1.5 0v-.75Zm-.75 3a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0v-.75a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75ZM6 12a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 12Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z"
                        clip-rule="evenodd" />
                </svg>
                <h1 class="text-2xl md:text-3xl uppercase font-bold">Edit Ticket : {{ $ticket->ticket }} - {{
                    $event->name }}</h1>
            </div>
        </div>
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden md:rounded-lg">
                    <div class=" rounded-lg flex items-start justify-between">
                        <div class="w-full">
                            <form class="space-y-5" method="POST"
                                action="/dashboard/events/{{ $event->uuid }}/tickets/{{ $ticket->uuid }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="ticket"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Ticket</label>

                                    <div class="relative flex items-center mt-2">
                                        <input id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="ticket" value="{{ old('ticket', $ticket->ticket) }}" required>
                                        </input>

                                    </div>
                                    @error('ticket') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="qty"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Qty</label>
                                    <div class="relative flex items-center mt-2">
                                        <input type="number" min="1"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="qty" value="{{ old('ticket', $ticket->qty) }}" required>
                                        </input>
                                    </div>
                                    @error('qty') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="price"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Price</label>
                                    <div class="relative flex items-center mt-2">
                                        <input type="number" min="1"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="price" value="{{ old('ticket', $ticket->priceNumber) }}" required>
                                        </input>
                                    </div>
                                    @error('price') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button
                                    class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                    <span class="mx-1">Update</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

{{-- END TULIS CODE --}}

@endsection