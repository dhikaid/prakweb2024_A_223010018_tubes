@extends('main.layouts.main')
@section('main')


{{ $user->username }}
{{-- verified --}}
@if ($user->isVerified)
@include('layouts.partials.verified')
@endif

@foreach ($events as $event)
<p>{{ $event->image }}</p>
<p>{{ $event->duration }}</p>
<p>{{ $event->name }}</p>
<p>{{ $event->price_range }}</p>
<br>
@endforeach


@endsection