@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Sarcina noua</div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(array('route' => 'evenimente.store', 'method' => 'POST')) }}
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" name="nume" class="form-control" value="{{ old('nume') }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea name="descriere" class="form-control">{{ old('descriere') }}</textarea>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="text" name="data" class="form-control" value="{{ old('data') }}">
            </div>
            <div class="form-group">
                <label for="locatie">Locatie</label>
                <input type="text" name="locatie" class="form-control" value="{{ old('locatie') }}">
            </div>
            <div class="form-group">
                <label for="ora_start">Ora Start</label>
                <input type="time" name="ora_start" class="form-control" value="{{ old('ora_start') }}">
            </div>
            <div class="form-group">
                <label for="durata">Durata</label>
                <input type="number" name="durata" class="form-control" value="{{ old('durata') }}">
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga Sarcina" class="btn btn-info">
                <a href="{{ route('evenimente.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
