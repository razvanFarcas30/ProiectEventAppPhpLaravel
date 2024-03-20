@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Detalii evenimente
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('evenimente.index') }}">Inapoi</a>
            </div>
            
            <div class="form-group">
                <strong>Nume: </strong> {{ $evenimente->nume }}
            </div>

            <div class="form-group">
                <strong>Descriere: </strong> {{ $evenimente->descriere }}
            </div>

            <div class="form-group">
                <strong>Data: </strong> {{ $evenimente->data }}
            </div>

            <div class="form-group">
                <strong>Locatie: </strong> {{ $evenimente->locatie }}
            </div>

            <div class="form-group">
                <strong>Ora Start: </strong> {{ $evenimente->ora_start }}
            </div>

            <div class="form-group">
                <strong>Durata: </strong> {{ $evenimente->durata }}
            </div>
             <div class="form-group">
                <strong>Speakeri: </strong><br>
                @foreach ($speakers as $key => $s)           
                    <ul>
                        <li>{{ $s->nume}}</l1>
                        
                    </ul>
                @endforeach
            </div>
            <strong>Bilete: </strong><br>
            @if (count($tickets) > 0)
                @foreach ($tickets as $key => $t)           
                    <div>
                        <br>
                        {{ $t->tip_bilet }}
                        <a class="btn btn-success" href="{{ url('add-to-cart/'.$t->id) }}">Buy</a><br>
                    </div>
                @endforeach
            @else
                <div>
                    <p>Nu exista bilete disponibile!</p>
                </div>
            @endif
        </div>
    </div>
@endsection
