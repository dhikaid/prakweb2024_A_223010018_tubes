@extends('main.layouts.main')
@section('main')


<div class="main">
    <h1 class="text-xl font-bold mb-4">SEMUA <span class="text-purple-600 uppercase">"{{ $query }}"</span>
    </h1>
    <section class="bg-white flex items-center">
        <div class="grid gap-x-20 gap-y-4  mt-4 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($datas as $event)

            @endforeach
        </div>
    </section>
    <div class="m-8 flex justify-center">
        {{ $events->links() }}
    </div>
</div>

@endsection