@extends('cos.layoutcos')
@section('title', 'Tickets')
@section('content')
 <div class="container tickets">
 <div class="row">
 @foreach($tickets as $ticket)
 <div class="col-xs-18 col-sm-6 col-md-3">
 <div class="thumbnail">
 <img src="{{ $ticket->photo }}" width="500"
height="300">
 <div class="caption">
 <h4>{{ $ticket->name }}</h4>
 <p>{{ str_limit(strtolower($ticket->description), 50)
}}</p>
 <p><strong>Pret: </strong> {{ $ticket->price
}}$</p>
 <p class="btn-holder"><a href="{{ url('add-tocart/'.$ticket->id) }}" class="btn btn-warning btn-block text-center"
role="button">Pune in cos</a> </p>
 </div>
 </div>
 </div>
 @endforeach
 </div><!-- End row -->
 </div>
@endsection