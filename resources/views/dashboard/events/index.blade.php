@extends('dashboard.layouts.main')
@section('main')

<section class="events">
    <div class="flex flex-col">
        <div class="info my-4">
            @include('dashboard.layouts.partials.breadcumb', [$datas = ['Events']])
            <div class="flex items-center gap-3 my-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                    <path fill-rule="evenodd"
                        d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 0 1-.375.65 2.249 2.249 0 0 0 0 3.898.75.75 0 0 1 .375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 17.625v-3.026a.75.75 0 0 1 .374-.65 2.249 2.249 0 0 0 0-3.898.75.75 0 0 1-.374-.65V6.375Zm15-1.125a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0V6a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0v.75a.75.75 0 0 0 1.5 0v-.75Zm-.75 3a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0v-.75a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75ZM6 12a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 12Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z"
                        clip-rule="evenodd" />
                </svg>
                <h1 class="text-2xl md:text-3xl uppercase font-bold">Events</h1>
            </div>
        </div>
        <div class="md:flex justify-start items-center mb-4 gap-2">
            <a href="events/create"
                class="mb-3 md:m-0 w-full md:w-auto text-center h-full px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-80 text-sm inline-block rounded-lg">
                <div class="flex items-center gap-1 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <p>Create</p>
                </div>
            </a>

            <form method="GET" action='/dashboard/events' class="relative flex items-center">
                <input type="text" placeholder="Cari Event" name="query"
                    class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-3 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                    required>
                <button type="submit" class="bg-blue-500 p-2 rounded-lg me-2 absolute right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-5 text-white">
                        <path fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

        </div>

        <div class="overflow-x-auto -mx-4 -my-2 sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                @if(session()->has('success'))
                <div class="flex w-full overflow-hidden bg-white rounded-lg shadow-sm mb-3">
                    <div class="flex items-center justify-center w-5 bg-green-500"></div>
                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-green-500">Success</span>
                            <p class="text-sm text-gray-600">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="myTable">
                        <thead class="bg-slate-100 dark:bg-gray-800">
                            <tr>
                                <th
                                    class="px-4 py-3.5 text-sm uppercase text-left text-black font-bold dark:text-gray-400">
                                    Name
                                </th>
                                <th
                                    class="px-4 py-3.5 text-sm uppercase text-left text-black font-bold dark:text-gray-400">
                                    Event Date
                                </th>
                                <th
                                    class="px-4 py-3.5 text-sm uppercase text-left text-black font-bold dark:text-gray-400">
                                    Capacity
                                </th>
                                <th
                                    class="px-4 py-3.5 text-sm uppercase text-left text-black font-bold dark:text-gray-400">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($events as $event)
                            <tr>
                                <td class="px-4 py-4 text-sm whitespace-nowrap flex items-center gap-1">
                                    {{ $event->name }}
                                    @if ($event->is_tiket_war)
                                    <span class="bg-red-500 px-1 text-sm text-white rounded-lg">WAR</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    {{ $event->durationwithtime }}
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    {{ $event->capacity }}
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-5">
                                        <a href="events/{{ $event->uuid }}"
                                            class="text-gray-500 transition-colors duration-200 text-lime-400 dark:hover:text-lime-500 dark:text-gray-300 hover:text-lime-500 focus:outline-none inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5 text-blue-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                            </svg>
                                        </a>
                                        <a href="events/{{ $event->uuid }}/edit"
                                            class="text-gray-500 transition-colors duration-200 text-lime-400 dark:hover:text-lime-500 dark:text-gray-300 hover:text-lime-500 focus:outline-none inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>

                                        <form action="events/{{ $event->uuid }}" method="post"
                                            class=" flex items-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-gray-500 transition-colors duration-200 text-red-400 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="my-4 flex justify-center items-center w-full">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection