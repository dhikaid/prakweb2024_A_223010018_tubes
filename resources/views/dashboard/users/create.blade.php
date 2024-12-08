@extends('dashboard.layouts.main')
@section('main')

{{-- TULIS CODE DISINI --}}

<section class="users">
    <div class="flex flex-col mt-10">

        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 shadow-lg">
                        <body class="bg-gray-100 flex items-center justify-center min-h-screen">
                            <div class="bg-white rounded-lg  p-8 w-full">
                                <div class="flex items-center mb-4">
                                    <h1 class="text-2xl font-bold text-gray-700">
                                        Tambah Akun
                                    </h1>
                                </div>
                                <div class="bg-gradient-to-r from-blue-100 to-violet-200 rounded-lg p-8 flex items-center justify-between">
                                    <div class="w-full">
                                        <form>
                                            <div class="mb-4">
                                                <img class="rounded-full w-20 h-20 bg-gray-300" src="/docs/images/examples/image-4@2x.jpg" alt="image">
                                                <label for="image" class="block text-gray-700 font-bold mb-2">Image :</label>
                                                <input type="file" class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-full file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-lg dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300"/>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 font-bold mb-2" for="username">
                                                    Nama Pengguna :
                                                </label>
                                                <input class="shadow appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200" id="username" placeholder="Nama Pengguna" type="text"/>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 font-bold mb-2" for="fullname">
                                                    Nama Lengkap :
                                                </label>
                                                <input class="shadow appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200" id="fullname" placeholder="Nama Lengkap" type="text"/>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 font-bold mb-2" for="email">
                                                    Email :
                                                </label>
                                                <input class="shadow appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200" id="email" placeholder="Email" type="email"/>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 font-bold mb-2" for="password">
                                                    Password :
                                                </label>
                                                <input class="shadow appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200" id="email" placeholder="Password" type="password"/>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 font-bold mb-2" for="password">
                                                    Konfirmasi Password :
                                                </label>
                                                <input class="shadow appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-300 hover:border-blue-400 transition duration-200" id="email" placeholder="Konfirmasi Password" type="password"/>
                                            </div>

                                            <div class="flex items-center justify-center">
                                                <button class="bg-violet-300 hover:bg-violet-200 text-gray-700 font-medium py-2 px-6 rounded-lg focus:outline-none focus:shadow-outline" type="button">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </body>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- END TULIS CODE --}}

@endsection