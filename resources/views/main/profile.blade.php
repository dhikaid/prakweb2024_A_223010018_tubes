@extends('main.layouts.main')
@section('main')

<div class="container">
    <div class="bg-blue-500 rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center space-x-4">
            <div>
                <div class="relative">
                    <img src="{{ $user->image }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
                    <span class="absolute bottom-0 right-0 block rounded-full ring-2  bg-green-400">
                        @if ($user->isVerified)
                        <div class="absolute -bottom-1 -right-1 bg-white rounded-full p-1 shadow-md">
                            @include('layouts.partials.verified')
                        </div>
                        @endif
                    </span>

                </div>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-white">{{ $user->fullname }}</h2>
                <p class="text-gray-100 text-sm">{{ $user->role->role }}</p>
            </div>
        </div>
    </div>

    @if ($user->role->role !== 'Admin')
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Ganti Role</h2>
        <form action="{{ route('profile.update.role') }}" method="POST">
            @csrf
            @method('PUT')

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline w-full">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.535 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                    </path>
                </svg>
                Ganti Role ke {{ $user->role->role == 'User' ? 'EO' : 'User' }}
            </button>
        </form>
    </div>
    @endif
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Edit Profile</h2>
        @if(session()->has('success_profile'))
        <div class="flex w-full overflow-hidden bg-green-100 rounded-md mb-4">
            <div class="px-4 py-3">
                <div class="flex items-center">
                    <span class="font-semibold text-green-700">Success!</span>
                    <p class="ml-2 text-sm text-gray-600">{{ session('success_profile') }}</p>
                </div>
            </div>
        </div>
        @endif

        <form action="{{ route('profile.update.general') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="file" class="block text-sm text-black font-semibold dark:text-gray-300">Image
                    Upload</label>
                <label for="dropzone-file"
                    class="flex flex-col items-center w-full  p-5 mx-auto mt-2 text-center bg-white border-2 border-gray-300 border-dashed cursor-pointer dark:bg-gray-900 dark:border-gray-700 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-black dark:text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>

                    <h2 class="mt-1 font-medium tracking-wide text-gray-700 dark:text-gray-200">
                        Payment File</h2>

                    <p class="mt-2 text-xs tracking-wide text-black dark:text-gray-400">Upload or
                        darg & drop your file SVG, PNG, JPG or GIF. </p>

                    <input id="dropzone-file" type="file" class="hidden" name="image" />
                </label>
                @error('image') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    value="{{ old('username', $user->username) }}" required>
                @error('username') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="fullname" id="fullname"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    value="{{ old('fullname', $user->fullname) }}" required>
                @error('fullname') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    value="{{ old('email', $user->email) }}" required>
                @error('email') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.535 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                    </path>
                </svg>
                Update Profile
            </button>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4">Update Password</h2>
        @if(session()->has('success_password'))
        <div class="flex w-full overflow-hidden bg-green-100 rounded-md mb-4">
            <div class="px-4 py-3">
                <div class="flex items-center">
                    <span class="font-semibold text-green-700">Success!</span>
                    <p class="ml-2 text-sm text-gray-600">{{ session('success_password') }}</p>
                </div>
            </div>
        </div>
        @endif
        @if(session()->has('failed_password'))
        <div class="flex w-full overflow-hidden bg-red-100 rounded-md mb-4">
            <div class="px-4 py-3">
                <div class="flex items-center">
                    <span class="font-semibold text-red-700">Failed!</span>
                    <p class="ml-2 text-sm text-gray-600">{{ session('failed_password') }}</p>
                </div>
            </div>
        </div>
        @endif
        <form action="{{ route('profile.update.password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="prevpassword" class="block text-sm font-medium text-gray-700">Current Password</label>
                <input type="password" name="prevpassword" id="prevpassword"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required>
                @error('prevpassword') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required>
                @error('password') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password2" class="block text-sm font-medium text-gray-700">Confirm New
                    Password</label>
                <input type="password" name="password2" id="password2"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required>
                @error('password2') <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.535 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                    </path>
                </svg>
                Update Password
            </button>
        </form>
    </div>
</div>
@endsection