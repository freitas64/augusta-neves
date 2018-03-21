@extends('mainAdmin')

@section('content')

    <div class="col-md-6 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title "><h3>Todas as Categorias</h3></div>
        </div>
        <div class="content-box-large box-with-header">


            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)

                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}">
                                    <button class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open" title="Ver"></i>
                                    </button>
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}">
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
            <div class="panel-title "><h3>Nova categoria</h3></div>
        </div>
        <div class="content-box-large box-with-header">


            <div class="panel-body">


                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

                {{ Form::label('name', 'Nome: ') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                <hr>
                {{ Form::submit('Criar nova categoria', ['class' => 'btn btn-primary']) }}

                {!! Form::close() !!}
            </div>


            <br/><br/>
        </div>
    </div>



@stop

