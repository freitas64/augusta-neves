@extends('mainAdmin')

@section('content')

    <div class="col-md-6 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title "><h3>Todos os ensinos</h3></div>
        </div>
        <div class="content-box-large box-with-header">


            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Info</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($ensinos as $ensino)

                        <tr>
                            <th>{{ $ensino->id }}</th>
                            <td>{{ $ensino->name }}</td>
                            <td>{{ $ensino->info }}</td>
                            <td>
                                <a href="{{ route('ensinos.show', $ensino->id) }}">
                                    <button class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open" title="Ver"></i>
                                    </button>
                                </a>
                                <a href="{{ route('ensinos.edit', $ensino->id) }}">
                                    <button class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-pencil" title="Editar"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="col-md-4 col-md-offset-2 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title "><h3>Novo ensino</h3></div>
        </div>
        <div class="content-box-large box-with-header">


            <div class="panel-body">


                {!! Form::open(['route' => 'ensinos.store', 'method' => 'POST']) !!}

                {{ Form::label('name', 'Nome: ') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                <hr>

                {{ Form::submit('Criar novo ensino', ['class' => 'btn btn-primary']) }}

                {!! Form::close() !!}
            </div>


            <br/><br/>
        </div>
    </div>



@stop

