@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare detalii Eveniment</div>
        <div class="panel-body">
            <!-- Exista inregistrari in tabelul evenimente -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Populez campurile formularului cu datele aferente din tabela evenimente -->
            {!! Form::model($evenimente, ['method' => 'PATCH', 'route' => ['evenimente.update', $evenimente->id]]) !!}
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" name="nume" class="form-control" value="{{ $evenimente->nume }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea name="descriere" class="form-control" rows="3">{{ $evenimente->descriere }}</textarea>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="text" name="data" class="form-control" value="{{ $evenimente->data }}">
            </div>
            <div class="form-group">
                <label for="locatie">Locatie</label>
                <input type="text" name="locatie" class="form-control" value="{{ $evenimente->locatie }}">
            </div>
            <div class="form-group">
                <label for="ora_start">Ora Start</label>
                <input type="text" name="ora_start" class="form-control" value="{{ $evenimente->ora_start }}">
            </div>
            <div class="form-group">
                <label for="durata">Durata</label>
                <input type="text" name="durata" class="form-control" value="{{ $evenimente->durata }}">
            </div>
            <div class="form-group">
                <input type="submit" value="Salvare Modificari" class="btn btn-info">
                <a href="{{ route('evenimente.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
