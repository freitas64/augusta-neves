@extends('mainAdmin')

@section('content')

    <div class="col-md-9 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title "><h3>CONTACTOS NEWSLETTER</h3></div>
        </div>
        <div class="content-box-large box-with-header">


            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de subscrição</th>
                        <th>Opções</th>


                    </tr>
                    </thead>
                    <tbody>

                    @foreach($contacts as $cont)

                        <tr>
                            <th>{{ $cont->name }}</th>
                            <th><a href="mailto:{{ $cont->email}}"</a>{{ $cont->email}}</th>
                            <td><span class="badge">{{ $cont->created_at->format('d M Y') }}</span></td>
                            <td>


                            {!! Form::open(['route' => ['contactsNewsletter.destroy', $cont->id], 'method' => 'DELETE']) !!}
                            {{ Form::button('<span class="glyphicon glyphicon-remove"></span>', array('class'=>'btn btn-default btn-xs', 'type'=>'submit')) }}

                            {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <nav class="text-center">
                    {!! $contacts->links() !!}

                </nav>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="well">
        <label>Opções</label>

            <div class="row">
                <div class="col-sm-6">


                        <a href="{{ route('emailNewsletter.create') }}" class="btn btn-danger btn-sm " role="button"><i class="glyphicon glyphicon-edit"></i> Criar e-mail newsletter</a>

                    <hr>
                    <a class="btn btn-primary" href="{{ route('emailNewsletter.index') }}">Ver Emails enviados</a>

                </div>

            </div>
        </div>
    </div>



@stop

