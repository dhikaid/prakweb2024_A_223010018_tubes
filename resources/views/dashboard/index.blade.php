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
        </div>
    </div>
</div>

{{-- END TULIS CODE --}}

@endsection