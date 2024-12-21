@extends('main.layouts.main')
@section('main')

<div class="container">
    <h1>Profile</h1>

    @if(session()->has('success'))
                <div class="flex w-full overflow-hidden bg-white rounded-lg shadow-sm mb-3">
                    <div class="flex items-center justify-center w-5 bg-green-500">
                    </div>
                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-green-500 ">Success</span>
                            <p class="text-sm text-gray-600 ">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
    @endif

    <!-- Update General Information -->
    <form action="{{ route('profile.update.general') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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

                <input id="dropzone-file" type="file" class="hidden" name="image" />
            </label>
            @error('image') <p class="mt-3 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>
        {{-- ENDFORM --}}
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
        </div>

        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" value="{{ old('fullname', $user->fullname) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        
        <button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
            <span class="mx-1">Update Profile</span>
        </button>
    </form>

    <hr>

    <!-- Update Password -->
    <form action="{{ route('profile.update.password') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
            <span class="mx-1">Update Password</span>
        </button>
    </form>
</div>
@endsection
