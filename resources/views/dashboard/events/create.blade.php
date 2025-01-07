@extends('dashboard.layouts.main')
@section('main')

{{-- TULIS CODE DISINI --}}

<section class="events">
    <div class="flex flex-col">
        <div class="info my-4">
            @include('dashboard.layouts.partials.breadcumb',[$datas = ['Events', 'Create']])
            <div class="flex items-center gap-3 my-2">
                <svg class="size-8 text-black" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <h1 class="text-2xl md:text-3xl uppercase font-bold">Create Event</h1>
            </div>
        </div>
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class=" py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden md:rounded-lg">
                    <div class=" rounded-lg flex items-start justify-between">
                        <div class="w-full">
                            <form class="space-y-5" method="POST" action="/dashboard/events"
                                enctype="multipart/form-data" x-data="{ verified: {{ old('war_ticket', 'false') }} }">
                                @csrf
                                {{-- START FILE FORM --}}
                                <div>
                                    <label for="file"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Image
                                        Upload</label>

                                    <label for="dropzone-file"
                                        class="flex flex-col items-center w-full  p-5 mx-auto mt-2 text-center bg-white border-2 border-gray-300 border-dashed cursor-pointer dark:bg-gray-900 dark:border-gray-700 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-8 h-8 text-black dark:text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                        </svg>

                                        <h2 class="mt-1 font-medium tracking-wide text-gray-700 dark:text-gray-200">
                                            Payment File</h2>

                                        <p class="mt-2 text-xs tracking-wide text-black dark:text-gray-400">Upload or
                                            darg & drop your file SVG, PNG, JPG or GIF. </p>

                                        <input id="dropzone-file" type="file" class="hidden" name="image" required />
                                    </label>
                                    @error('image') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>
                                {{-- ENDFORM --}}
                                {{-- LAYOUT --}}

                                <div class="md:flex justify-between w-full gap-5">
                                    <div class="layout-1 w-full">
                                        {{-- START Event NAME --}}
                                        <div>
                                            <label for="name"
                                                class="block text-sm text-black font-semibold dark:text-gray-300">Event
                                                Name</label>
                                            <div class="relative flex items-center mt-2">
                                                <span class="absolute">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">

                                                        <path
                                                            d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                                <input type="text" placeholder="Music Festival"
                                                    class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                                    id="name" name="name" required value="{{ old('name') }}">
                                            </div>
                                            @error('name') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- ENDFORM --}}
                                        {{-- START DESCRIPTION --}}
                                        <div class="mt-4 w-full" x-data="{
                                            isLoading: false,
                                            async fetchAIContent() {
                                                const name = document.getElementById('name').value;
                                                const category = document.getElementById('category');
                                                const categoryName = category.options[category.selectedIndex].text;
                                                const startDate = document.getElementById('start_date').value;
                                                const endDate = document.getElementById('end_date').value;
                                                const city = document.getElementById('city').value;
                                                const country = document.getElementById('country').value;
                                                const venue = document.getElementById('venue').value;

                                                if (name && category && startDate && endDate && city && country && venue) {
                                                    this.isLoading = true; // Mulai loading
                                                    try {
                                                        const response = await fetch('/service/api/descai', {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/json',
                                                                'Accept': 'application/json',
                                                            },
                                                            body: JSON.stringify({
                                                                prompt: `Acara ${name} dengan category ${categoryName} pada tanggal ${startDate} dan berakhir pada tanggal ${endDate} yang berlokasi di venue ${venue} di kota ${city} yang terletak di negara ${country}`
                                                            })
                                                        });

                                                        if (!response.ok) {
                                                            throw new Error('Error fetching AI content');
                                                        }

                                                        const data = await response.json();
                                                        const text = data.response || '';

                                                        // Masukkan teks ke dalam Trix Editor
                                                        const editorElement = document.querySelector('trix-editor');
                                                        const inputElement = document.getElementById('x');

                                                        inputElement.value = text; // Set nilai input tersembunyi
                                                        editorElement.editor.loadHTML(text); // Update konten editor Trix
                                                    } catch (error) {
                                                        console.error('Failed to fetch AI content:', error);
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Oops...',
                                                            text: 'Gagal mendapatkan data dari AI.',
                                                        });
                                                    } finally {
                                                        this.isLoading = false; // Akhiri loading
                                                    }
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Oops...',
                                                        text: 'Tolong masukan terlebih dahulu detail acara!',
                                                    });
                                                }
                                            }
                                        }">
                                            <div class="flex justify-between mb-3 w-full">
                                                <label for="description"
                                                    class="block text-sm text-black font-semibold dark:text-gray-300 w-full">
                                                    Description
                                                </label>
                                                <button x-on:click="fetchAIContent" :disabled="isLoading" type="button"
                                                    class="flex items-center gap-2 text-sm w-full justify-end">
                                                    <template x-if="!isLoading">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                                        </svg>
                                                    </template>
                                                    <template x-if="isLoading">
                                                        <div class="flex items-center justify-center">
                                                            <div
                                                                class="animate-spin rounded-full h-5 w-5 border-t-2 border-b-2 border-gray-300">
                                                            </div>
                                                        </div>
                                                    </template>
                                                    <p x-text="isLoading ? 'Loading...' : 'AI AutoFill'"></p>
                                                </button>
                                            </div>
                                            <input id="x" value="{!! old('description') !!}" type="hidden"
                                                name="description" required>
                                            <trix-editor input="x" required></trix-editor>
                                            @error('description')
                                            <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        {{-- END Description --}}
                                        {{-- START END DATE --}}
                                        <div class="mt-4">
                                            <label for="category"
                                                class="block text-sm text-black font-semibold dark:text-gray-300 mb-2">Category</label>
                                            <select
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                name="category" id="category" required>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <p class="mt-3 text-xs text-red-400">{{ $message }} </p>
                                            @enderror
                                        </div>
                                        {{-- END END DATE --}}
                                    </div>
                                    <div class="layout-2 w-full">
                                        <div class="md:flex gap-2 w-full mb-4">
                                            {{-- Start START DATE --}}
                                            <div class="w-full">
                                                <label for="start_date"
                                                    class="block text-sm text-black font-semibold dark:text-gray-300">Start
                                                    Date</label>

                                                <div class="relative flex items-center mt-2">
                                                    <span class="absolute">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                                        </svg>
                                                    </span>
                                                    <input type="datetime-local"
                                                        class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                                        name="start_date" id="start_date" required
                                                        value="{{ old('start_date') }}">
                                                </div>
                                                @error('start_date') <p class="mt-3 text-xs text-red-400">{{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            {{-- END START DATE --}}
                                            {{-- START END DATE --}}
                                            <div class="w-full">
                                                <label for="end_date"
                                                    class="block text-sm text-black font-semibold dark:text-gray-300">End
                                                    Date</label>

                                                <div class="relative flex items-center mt-2">
                                                    <span class="absolute">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                                        </svg>

                                                    </span>
                                                    <input type="datetime-local"
                                                        class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                                        name="end_date" id="end_date" required
                                                        value="{{ old('end_date') }}">
                                                </div>
                                                @error('end_date') <p class="mt-3 text-xs text-red-400">{{ $message }}
                                                </p> @enderror
                                            </div>
                                            {{-- END END DATE --}}


                                        </div>
                                        {{-- START QUEUE LIMIT --}}
                                        <div class="mb-3">
                                            <label for="is_tiket_war"
                                                class="block text-sm text-black font-semibold dark:text-gray-300">War
                                                Ticket Mode</label>
                                            <select
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                name="is_tiket_war"
                                                x-on:change="verified = $event.target.options[$event.target.selectedIndex].text === 'Yes'"
                                                required>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            </select>
                                            @error('is_tiket_war')
                                            <p class="mt-3 text-xs text-red-400">{{ $message }} </p>
                                            @enderror
                                        </div>
                                        {{-- END QUEUE LIMIT --}}
                                        <div x-show="verified">
                                            <div class="mb-3">
                                                <label for="queue_limit"
                                                    class="block text-sm text-black font-semibold dark:text-gray-300">Queue
                                                    Limit</label>

                                                <div class="relative flex items-center mt-2">
                                                    <span class="absolute">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                        </svg>
                                                    </span>
                                                    <input type="number" min="1" max="200"
                                                        class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                                        name="queue_limit" value="{{ old('queue_limit') }}">
                                                </div>
                                                @error('queue_limit') <p class="mt-3 text-xs text-red-400">{{ $message
                                                    }}
                                                </p> @enderror
                                            </div>


                                            <div class="w-full">
                                                <label for="queue_open"
                                                    class="block text-sm text-black font-semibold dark:text-gray-300">Start
                                                    War</label>

                                                <div class="relative flex items-center mt-2">
                                                    <span class="absolute">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                                        </svg>
                                                    </span>
                                                    <input type="datetime-local"
                                                        class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                                        name="queue_open" value="{{ old('queue_open') }}">
                                                </div>
                                                @error('queue_open') <p class="mt-3 text-xs text-red-400">{{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- ENDLAYOUT --}}

                                {{-- START LOCATION --}}
                                <div>
                                    <label for="country"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Country</label>

                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                            </svg>
                                        </span>
                                        <input type="text" id="country"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="country" required value="{{ old('country') }}">
                                    </div>
                                    @error('country') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="province"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Province</label>

                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                            </svg>
                                        </span>
                                        <input type="text" id="province"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="province" required value="{{ old('province') }}">
                                    </div>
                                    @error('province') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="city"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">City</label>

                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                            </svg>
                                        </span>
                                        <input type="text" id="city"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="city" required value="{{ old('city') }}">
                                    </div>
                                    @error('city') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="venue"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Venue</label>

                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                            </svg>
                                        </span>
                                        <input type="text" id="venue"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="venue" required value="{{ old('venue') }}">
                                    </div>
                                    @error('venue') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>

                                {{-- START CAPACITY --}}
                                <div>
                                    <label for="capacity"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Capacity</label>

                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </span>
                                        <input type="number"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="capacity" required value="{{ old('capacity') }}" min="1">
                                    </div>
                                    @error('capacity') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>
                                {{-- END CAPACITY --}}





                                <button type="submit"
                                    class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span class="mx-1">Create</span>
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
