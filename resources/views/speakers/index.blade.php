<!-- resources/views/speakers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Speakers</h1>
        <div class="row">
            @foreach($speakers as $speaker)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('/images/p.png') }}" class="card-img-top" alt="Speaker Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $speaker->nume }}</h5>
                            <p class="card-text">{{ $speaker->profesie }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
