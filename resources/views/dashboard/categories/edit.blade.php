@extends('dashboard.layouts.main')
@section('main')

{{-- TULIS CODE DISINI --}}

<section class="roles">
    <div class="flex flex-col">
        <div class="info my-4">
            @include('dashboard.layouts.partials.breadcumb',[$datas = ['Categories', $category->name, 'Edit']])
            <div class="flex items-center gap-3 my-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                    <path fill-rule="evenodd"
                        d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                        clip-rule="evenodd" />
                </svg>

                <h1 class="text-2xl md:text-3xl uppercase font-bold">Create Categories</h1>
            </div>
        </div>
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden md:rounded-lg">
                    <div class=" rounded-lg flex items-start justify-between">
                        <div class="w-full">
                            <form class="space-y-5" method="POST" action="/dashboard/categories/{{ $category->uuid }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                {{-- START ROLE --}}
                                <div>
                                    <label for="name"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Category</label>

                                    <div class="relative flex items-center mt-2">
                                        <input id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="name" value="{{ old('name', $category->name) }}" required>
                                        </input>

                                    </div>
                                    @error('name') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- ENDFORM --}}
                                {{-- START ROLE --}}
                                <div>
                                    <label for="description"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Description</label>

                                    <div class="relative flex items-center mt-2">
                                        <input id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="description" value="{{ old('description', $category->description) }}"
                                            required>
                                        </input>

                                    </div>
                                    @error('description') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- ENDFORM --}}

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