@extends('main.layouts.main')
@section('main')


<p>{{ $user->image }}</p>
<p>{{ $user->username }}</p>

{{-- verified --}}
@if ($user->isVerified)
@include('layouts.partials.verified')
@endif
<br>


@foreach ($events as $event)
<p>{{ $event->image }}</p>
<p>{{ $event->duration }}</p>
<p>{{ $event->name }}</p>
<p>{{ $event->price_range }}</p>
<br>
@endforeach


@endsection