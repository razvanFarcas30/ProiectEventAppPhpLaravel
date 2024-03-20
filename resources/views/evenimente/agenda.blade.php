
<!-- resources/views/evenimente/agenda.blade.php -->

@extends('layouts.app')  

@section('content')
    <h1>Event Agenda</h1>

    @foreach($events as $event)
        <div>
            <h2>{{ $event->nume }}</h2>
            <p>Date: {{ $event->data }}</p>
            <p>Location: {{ $event->locatie }}</p>
            {{-- Add other event details as needed --}}
        </div>
        <hr>
    @endforeach
@endsection
