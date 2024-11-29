@extends('main.layouts.main')
@section('main')

<div class="main">
    <!--HTML CODE-->
    <div class="w-full relative">
        <div class="swiper progress-slide-carousel swiper-container relative">
            <div class="swiper-wrapper mb-6">
                <div class="swiper-slide">
                    <img src="https://assets.loket.com/images/ss/1730425780_fGx3mu.jpg" class="rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="https://staticassets.kiostix.com/banner/1727060869672_Artboard%201-2.png" class="rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="https://assets.loket.com/images/ss/1730425780_fGx3mu.jpg" class="rounded-xl">
                </div>
            </div>
            <div class="swiper-pagination !bottom-2 !top-auto !w-80 right-0 mx-auto bg-gray-100"></div>
        </div>
    </div>


    <div class="my-10">
        <div class="flex justify-between">
            <h1 class="font-bold text-xl mb-7">Creator Event</h1>
            <a class="text-sm mb-7 text-gray-600">Lihat semua</a>
        </div>
        <div class="flex items-center justify-center gap-14">
            <a class="text-center"> <img
                    src="https://assets.loket.com/neo/production/images/organization/20240404153109_660e654d3c31b.png"
                    class="rounded-full w-28 mb-3 " alt="">
                <p class="flex justify-center items-center gap-1"> DEAL INDONESIA
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </p>
            </a>
            <a class="text-center"> <img
                    src="https://assets.loket.com/neo/production/images/organization/20220509153707_6278d2b381650.png"
                    class="rounded-full w-28 mb-3 " alt="">
                <p class="flex justify-center items-center gap-1"> BENGKEL SPACE
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </p>
            </a>
            <a class="text-center"> <img
                    src="https://assets.loket.com/neo/production/images/organization/ZnRxl_1730200988592819.jpeg"
                    class="rounded-full w-28 mb-3 " alt="">
                <p class="flex justify-center items-center gap-1"> ISMAYA LIVE
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </p>
            </a>
            <a class="text-center"> <img
                    src="https://assets.loket.com/neo/production/images/organization/20241023013604_6717f094607f7.png"
                    class="rounded-full w-28 mb-3 " alt="">
                <p class="flex justify-center items-center gap-1"> BEM UNG
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </p>
            </a>
            <a class="text-center"> <img
                    src="https://assets.loket.com/neo/production/images/organization/20220914154833_6321956146ea8.jpg"
                    class="rounded-full w-28 mb-3 " alt="">
                <p class="flex justify-center items-center gap-1"> Marketeers
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </p>
            </a>
            <a class="text-center"> <img
                    src="https://assets.loket.com/neo/production/images/organization/20231205105421_656e9eed64612.png"
                    class="rounded-full w-28 mb-3 " alt="">
                <p class="flex justify-center items-center gap-1"> PPC PRODUCTION
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </p>
            </a>
            <a class="text-center"> <img
                    src="https://assets.loket.com/neo/production/images/organization/20220304170257_6221e3d1169c9.png"
                    class="rounded-full w-28 mb-3 " alt="">
                <p class="flex justify-center items-center gap-1"> COMIKA EVENT
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </p>
            </a>
        </div>
    </div>

    <div class="my-10">
        <div class="flex justify-between">
            <h1 class="font-bold text-xl mb-7">Event Terbaru</h1>
            <a class="text-sm mb-7 text-gray-600">Lihat semua</a>
        </div>
        <div class="flex justify-center items-center gap-5">
            <a href=""
                class="uppercase w-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                <img src="https://assets.loket.com/neo/production/images/banner/20241019183718_671399eea31a2.jpg"
                    class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                <div class="px-3 pb-3">
                    <p class="font-bold text-lg">HOLIMOON 2024</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">23 D 2024</p>
                    <p class="text-m font-semibold">Rp. 125.000</p>
                    <div class="img mt-3 flex items-center  gap-3">
                        <img src="https://assets.loket.com/neo/production/images/organization/20240404153109_660e654d3c31b.png"
                            class="w-7 rounded-full" alt="">
                        <p class="flex justify-center items-center gap-1">Deal Indonesia <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </p>
                    </div>
                </div>
            </a>
            <a href=""
                class="uppercase w-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                <img src="https://assets.loket.com/neo/production/images/banner/20241029131528_67207d8061df8.jpg"
                    class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                <div class="px-3 pb-3">
                    <p class="font-bold text-lg">CINTA KALA SENJA</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">18 Dec 2024</p>
                    <p class="text-m font-semibold">Rp. 299.000</p>
                    <div class="img mt-3 flex items-center  gap-3">
                        <img src="https://assets.loket.com/neo/production/images/organization/20220509153707_6278d2b381650.png"
                            class="w-7 rounded-full" alt="">
                        <p class="flex justify-center items-center gap-1">Bengkel Space <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </p>
                    </div>
                </div>
            </a>
            <a href=""
                class="uppercase w-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                <img src="https://assets.loket.com/neo/production/images/banner/K7TEz_1724747212487826.png"
                    class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                <div class="px-3 pb-3">
                    <p class="font-bold text-lg">DWP 2024</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">13 Dec - 16 Dec 2024</p>
                    <p class="text-m font-semibold">Rp. 1.750.000</p>
                    <div class="img mt-3 flex items-center  gap-3">
                        <img src="https://assets.loket.com/neo/production/images/organization/ZnRxl_1730200988592819.jpeg"
                            class="w-7 rounded-full" alt="">
                        <p class="flex justify-center items-center gap-1">Ismaya Live <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </p>
                    </div>
                </div>
            </a>
            <a href=""
                class="uppercase w-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                <img src="https://assets.loket.com/neo/production/images/banner/20241023011431_6717eb87c5104.jpg"
                    class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                <div class="px-3 pb-3">
                    <p class="font-bold text-lg">CREATIVE FEST 2024</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">23 DEC 2024</p>
                    <p class="text-m font-semibold">Rp. 150.000</p>
                    <div class="img mt-3 flex items-center  gap-3">
                        <img src="https://assets.loket.com/neo/production/images/organization/20241023013604_6717f094607f7.png"
                            class="w-7 rounded-full" alt="">
                        <p class="flex justify-center items-center gap-1">BEM UNG 2024 <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </p>
                    </div>
                </div>
            </a>

        </div>
    </div>
    <div class="my-10">
        <div class="flex justify-between">
            <h1 class="font-bold text-xl mb-7">Event di <span class="text-violet-600">Bandung</span></h1>
            <a class="text-sm mb-7 text-gray-600">Lihat semua</a>
        </div>
        <div class="flex justify-center items-center gap-5">
            <a href=""
                class="uppercase w-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                <img src="https://assets.loket.com/neo/production/images/banner/20241009092643_6705e9e3f0342.jpg"
                    class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                <div class="px-3 pb-3">
                    <p class="font-bold text-lg">WOW Night 2024</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">05 Dec 2024</p>
                    <p class="text-m font-semibold">Rp. 250.000</p>
                    <div class="img mt-3 flex items-center  gap-3">
                        <img src="https://assets.loket.com/neo/production/images/organization/20220914154833_6321956146ea8.jpg"
                            class="w-7 rounded-full" alt="">
                        <p class="flex justify-center items-center gap-1">Marketeers <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </p>
                    </div>
                </div>
            </a>
            <a href=""
                class="uppercase w-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                <img src="https://assets.loket.com/neo/production/images/banner/20241122202704_674086a8cfadb.jpg"
                    class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                <div class="px-3 pb-3">
                    <p class="font-bold text-lg">COMBO TOUR 2024</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">06 Dec 2024</p>
                    <p class="text-m font-semibold">Rp. 60.000</p>
                    <div class="img mt-3 flex items-center  gap-3">
                        <img src="https://assets.loket.com/neo/production/images/organization/20240312230625_65f07d8140de2.png"
                            class="w-7 rounded-full" alt="">
                        <p class="flex justify-center items-center gap-1">AMERTA PLAYGROUND <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </p>
                    </div>
                </div>
            </a>
            <a href=""
                class="uppercase w-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                <img src="https://assets.loket.com/neo/production/images/banner/20241115173029_673722c5bf7ba.jpg"
                    class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                <div class="px-3 pb-3">
                    <p class="font-bold text-lg">BARASUARA</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">11 Dec 2024</p>
                    <p class="text-m font-semibold">Rp. 175.000</p>
                    <div class="img mt-3 flex items-center  gap-3">
                        <img src="https://assets.loket.com/neo/production/images/organization/20231205105421_656e9eed64612.png"
                            class="w-7 rounded-full" alt="">
                        <p class="flex justify-center items-center gap-1">PPC PRODUCTION <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </p>
                    </div>
                </div>
            </a>
            <a href=""
                class="uppercase w-80 overflow-hidden border border-gray-300 inline-block rounded-xl rounded-tl-3xl">
                <img src="https://assets.loket.com/neo/production/images/banner/20240701194020_6682a3b4c2565.jpg"
                    class="rounded-tl-3xl rounded-br-3xl w-80  mb-3">
                <div class="px-3 pb-3">
                    <p class="font-bold text-lg">KONTRAS</p>
                    <p class="font-regular text-sm text-gray-500 mb-2">21 Dec 2024</p>
                    <p class="text-m font-semibold">Rp. 235.000</p>
                    <div class="img mt-3 flex items-center  gap-3">
                        <img src="https://assets.loket.com/neo/production/images/organization/20220304170257_6221e3d1169c9.png"
                            class="w-7 rounded-full" alt="">
                        <p class="flex justify-center items-center gap-1">COMIKA EVENT <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-4">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </p>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>
@endsection