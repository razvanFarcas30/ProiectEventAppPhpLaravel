@extends('layouts.app')

@section('title', 'Processing')

@section('content')
    <div class="text-center">
        <h2>Processing Your Order</h2>
        <img src="{{ asset('images/loading.gif') }}" alt="Loading GIF">
        <p>Please wait while we process your order...</p>
    </div>
@endsection
