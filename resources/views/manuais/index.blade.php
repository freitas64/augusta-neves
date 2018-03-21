@extends('mainAdmin')

@section('content')
    <div class="col-md-12 panel-warning">

        <div class="content-box-header panel-heading">
            <div class="panel-title ">
                <h3>Todos os manuais</h3></div>

            <div class="panel-options">
                <a href="{{ route('manuais.create') }}" title="Novo manual"><i class="glyphicon glyphicon-plus"></i></a>
            </div>

        </div>

        <div class="content-box-large box-with-header">


            <div class="panel-body">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Capa</th>
                        <th>Título</th>
                        <th>Link</th>
                        <th>Ensino</th>
                        <th>Criado em</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($manuais as $manual)

                        <tr>
                            <th>{{ $manual->id }}</th>
                            <td><img src="{{ asset('images/Manuais/manualAdmin_'.$manual->image) }}" alt="{{$manual->title}}"></td>
                            <td>{{ substr($manual->title, 0, 40) }}</td>
                            <td>
                                <?php if ($manual->linkManual == null): ?>
                                Não existe
                                <?php else: ?>
                                    <a  target="_blank" href="{{$manual->linkManual}}"
                                        title="Ver mais">Abrir</a></p>
                                <?php endif; ?>
                            </td>

                            <td>
                                {{$manual->ensino->name}}
                            </td>

                            <td > <span class="badge"> {{ $manual->created_at->format('d M Y') }}</span></td>
                            <td>
                                <a href="{{ route('manuais.show', $manual->id) }}">
                                    <button class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open" title="Ver"></i></button>
                                </a>
                                <a href="{{ route('manuais.edit', $manual->id) }}">
                                    <button class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil" title="Editar"></i></button>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-center">
                    {!! $manuais->links() !!}
                </div>
            </div>
        </div>
    </div>


@endsection




