@extends('dashboard.layouts.main')
@section('main')

{{-- TULIS CODE DISINI --}}

<section class="users">
    <div class="flex flex-col">
        <div class="info my-4">
            @include('dashboard.layouts.partials.breadcumb',[$datas = ['Users', strtolower($user->username) , 'Edit']])
            <div class="flex items-center gap-3 my-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                    <path
                        d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                </svg>

                <div class="flex items-center gap-1">
                    <h1 class="text-2xl md:text-3xl uppercase font-bold">Edit User: {{ $user->username }}</h1>
                    @include('layouts.partials.verified')
                </div>
            </div>
        </div>
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden md:rounded-lg">
                    <div class=" rounded-lg flex items-start justify-between">
                        <div class="w-full">
                            <form class="space-y-5" method="POST" action="/dashboard/users"
                                enctype="multipart/form-data"
                                x-data="{verified:{{ $user->isVerified ? 'true' : 'false' }}}">
                                @csrf
                                {{-- START FILE FORM --}}
                                <div>
                                    <label for="file"
                                        class="block text-sm text-black font-semibold dark:text-gray-300 mb-2">
                                        Image</label>
                                    <img src="{{ $user->image }}" class="w-full object-cover h-72 rounded-lg" alt="">
                                </div>
                                {{-- ENDFORM --}}
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
                                {{-- START FULL NAME --}}
                                <div>
                                    <label for="fullname"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Fullname</label>

                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                            </svg>
                                        </span>
                                        <input type="text" placeholder="Rafli Ramdhani"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="fullname" required value="{{ old('fullname', $user->fullname) }}">
                                    </div>
                                    @error('fullname') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>
                                {{-- ENDFORM --}}
                                {{-- START USERNAME --}}
                                <div>
                                    <label for="username"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Username</label>

                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </span>
                                        <input type="text" placeholder="rafliramdhani1"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="username" required value="{{ old('username', $user->username) }}">
                                    </div>
                                    @error('username') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- ENDFORM --}}
                                {{-- START ROLE --}}
                                <div>
                                    <label for="roles"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Roles</label>

                                    <div class="relative flex items-center mt-2">
                                        <select id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="role"
                                            x-on:change="verified = $event.target.options[$event.target.selectedIndex].text === 'EO'"
                                            required>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->uuid }}" {{ old('role', $user->
                                                role->uuid)===$role->uuid ? 'selected'
                                                : '' }}>
                                                {{ $role->role }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('role') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- ENDFORM --}}
                                {{-- START ROLE --}}
                                <div x-show="verified">
                                    <label for="roles"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Verified</label>
                                    <div class="relative flex items-center mt-2">
                                        <select id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="isVerified">
                                            <option value="false">Tidak</option>
                                            <option value="true" {{ $user->isVerified ? 'selected' :'' }}>Verified
                                            </option>
                                        </select>
                                    </div>
                                    @error('isVerified') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- ENDFORM --}}
                                {{-- START EMAIL --}}
                                <div>
                                    <label for="email"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Email</label>
                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />

                                            </svg>
                                        </span>
                                        <input type="email" placeholder="rafliramdhani1@gmail.com"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="email" required value="{{ old('email', $user->email) }}">
                                    </div>
                                    @error('email') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- ENDFORM --}}
                                {{-- START PASSWORD --}}
                                <div>
                                    <label for="password"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Password</label>
                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                            </svg>
                                        </span>
                                        <input type="password" placeholder="***"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="password" required>
                                    </div>
                                    @error('password') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- ENDFORM --}}
                                {{-- START PASSWORD --}}
                                <div>
                                    <label for="password2"
                                        class="block text-sm text-black font-semibold dark:text-gray-300">Konfirmasi
                                        Password</label>
                                    <div class="relative flex items-center mt-2">
                                        <span class="absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 mx-3 text-gray-400 dark:text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                            </svg>
                                        </span>
                                        <input type="password" placeholder="***"
                                            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                            name="password2" required>
                                    </div>
                                </div>
                                {{-- ENDFORM --}}

                                <button
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