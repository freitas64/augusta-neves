@extends('mainAdmin')

@section('content')



    <div class="col-md-12 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title ">
                <h3>Ensino: <b>{{ $ensino->name }}</b></h3>
            </div>
            <div class="panel-options">
                <a href="{{ route('ensinos.edit', $ensino->id) }}"><i class="glyphicon glyphicon-pencil" title="Editar ensino"></i></a>
            </div>
        </div>
        <div class="content-box-large box-with-header">
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Nome do livro</th>
                        <th>Info</th>
                        <th>Ver Manual</th>
                    </tr>
                    @foreach($manuais as $manual)
                        <tr>
                            <td>{{ $manual->id }}</td>
                            <td><a href="{{ route('manuais.show', $manual->id) }}"></a>{{ $manual->title }}</td>
                            <td>{{ $manual->info }}</td>
                            <td><a href="{{ route('manuais.show', $manual->id) }}">
                                <button class="btn btn-default btn-xs">
                                    <i class="glyphicon glyphicon-pencil" title="Editar"></i>
                                </button>
                            </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection


