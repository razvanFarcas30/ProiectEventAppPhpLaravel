@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista evenimentelor
        </div>
        <div class="panel-body">
            @if (Auth::user()->is_admin)
                <div class="form-group">
                    <div class="pull-right">
                        <a href="{{ route('evenimente.create') }}" class="btn btn-default">Adaugare Eveniment Nou</a>
                    </div>
                </div>
            @endif

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Nume</th>
                    <th>Descriere</th>
                    <th>Data</th>
                    <th>Ora Start</th>
                    <th>Durata</th>
                    <th>Locatie</th>
                    <th width="300">Actiune</th>
                </tr>

                @if (count($evenimente) > 0)
                    @foreach ($evenimente as $key => $task)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $task->nume }}</td>
                            <td>{{ $task->descriere }}</td>
                            <td>{{ $task->data }}</td>
                            <td>{{ $task->ora_start }}</td>
                            <td>{{ $task->durata }}h</td>
                            <td>{{ $task->locatie }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('evenimente.show', $task->id) }}">Vizualizare</a>
                                @if (Auth::user()->is_admin)
                                    <a class="btn btn-primary" href="{{ route('evenimente.edit', $task->id) }}">Modificare</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['evenimente.destroy', $task->id], 'style' => 'display:inline']) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                @endif
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">Nu exista evenimente planificate!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina-->
            {{ $evenimente->render() }}
        </div>
    </div>
@endsection
