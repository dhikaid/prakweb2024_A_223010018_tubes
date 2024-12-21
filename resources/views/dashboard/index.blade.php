@extends('dashboard.layouts.main')
@section('main')

{{-- TULIS CODE DISINI --}}

<div class="space-y-1">

    <div class="info my-4">
        @include('dashboard.layouts.partials.breadcumb',[$datas = ['Dashboard']])
        <div class="my-2 space-y-2">
            <h1 class="text-lg md:text-3xl">Hai, <span class="uppercase font-bold"> {{ auth()->user()->fullname
                    }}</span></h1>
            <p class="text-xl">Apa yang anda ingin lakukan sekarang?</p>


            <div class="flex flex-col md:flex-row gap-2 md:space-y-0 space-y-3 items-center justify-center w-full">
                <a href="/dashboard/events"
                    class=" bg-slate-100 px-4 py-3 rounded-lg text-black w-full flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-10 mb-3">
                        <path fill-rule="evenodd"
                            d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 0 1-.375.65 2.249 2.249 0 0 0 0 3.898.75.75 0 0 1 .375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 17.625v-3.026a.75.75 0 0 1 .374-.65 2.249 2.249 0 0 0 0-3.898.75.75 0 0 1-.374-.65V6.375Zm15-1.125a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0V6a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0v.75a.75.75 0 0 0 1.5 0v-.75Zm-.75 3a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0v-.75a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75ZM6 12a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 12Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="text-lg">Buat Event</p>
                </a>
                <a href="profile"
                    class=" bg-slate-100 px-4 py-3 rounded-lg text-black w-full flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-10 mb-3">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="text-lg">Edit Profile</p>
                </a>
                @can('isAdmin')
                <a href="/dashboard/users"
                    class=" bg-slate-100 px-4 py-3 rounded-lg text-black w-full flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-10 mb-3">
                        <path
                            d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                    </svg>

                    <p class="text-lg">Buat Users</p>
                </a>
                <a href="/dashboard/roles"
                    class=" bg-slate-100 px-4 py-3 rounded-lg text-black w-full flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-10 mb-3">
                        <path fill-rule="evenodd"
                            d="M19.5 21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3h-5.379a.75.75 0 0 1-.53-.22L11.47 3.66A2.25 2.25 0 0 0 9.879 3H4.5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h15Zm-6.75-10.5a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V10.5Z"
                            clip-rule="evenodd" />
                    </svg>

                    <p class="text-lg">Buat Roles</p>
                </a>

                @endcan
            </div>

            @can('isAdmin')
            <hr>
            <h1 class="text-2xl font-bold">Statistik</h1>

            <div class="flex flex-col md:flex-row gap-2 md:space-y-0 space-y-3 items-center justify-center w-full">
                <div
                    class="bg-blue-500 px-4 py-3 rounded-lg text-white w-full flex flex-col justify-center items-center h-full space-y-2">
                    <p class="text-3xl font-bold">{{ $event }}</p>
                    <p class="text-lg">Event Aktif</p>
                </div>
                <div
                    class="bg-slate-500 px-4 py-3 rounded-lg text-white w-full flex flex-col justify-center items-center h-full space-y-2">
                    <p class="text-3xl font-bold">{{ $user }}</p>
                    <p class="text-lg">User Aktif</p>
                </div>
            </div>

            @endcan
        </div>
    </div>
</div>

{{-- END TULIS CODE --}}

@endsection