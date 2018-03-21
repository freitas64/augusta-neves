@extends('mainAdmin')

@section('content')
    <div class="col-md-12 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title "><h3>Formação - Galeria</h3></div>

            <div class="panel-options">
                <a href="{{ route('formacaoGaleria.create') }}" title="Adicionar Imagem"><i class="glyphicon glyphicon-plus"></i></a>
            </div>
        </div>
        <div class="content-box-large box-with-header">


            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th>Data Formação</th>
                        <th>Criado em</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($imagens as $imagem)

                        <tr>
                            <th>{{ $imagem->id }}</th>
                            <th><img src="{{ asset('images/Formacoes/formacaoAdmin_'.$imagem->image) }}" alt="Formacao"></th>
                            <td>{{ $imagem->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($imagem->date)->format('d M Y')}}</td>


                            <td><span class="badge">{{ $imagem->created_at->format('d M Y') }}</span></td>
                            <td>
                                <a href="{{ route('formacaoGaleria.show', $imagem->id) }}">
                                    <button class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open" title="Ver"></i></button>
                                </a>
                                <a href="{{ route('formacaoGaleria.edit', $imagem->id) }}">
                                    <button class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil" title="Editar"></i></button>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <nav class="text-center">
                    {!! $imagens->links() !!}

                </nav>
            </div>

        </div>

    </div>


@endsection







