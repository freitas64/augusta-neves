@extends('mainAdmin')

@section('content')

    <!-- ********************************************************************* -->
    <div class="col-md-12 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title "><h3>E-MAILS ENVIADOS NEWSLETTER</h3></div>
        </div>
        <div class="content-box-large box-with-header">
            <div class="col-sm-12 col-md-3">
                <a href="{{ route('emailNewsletter.create') }}" class="btn btn-danger btn-sm btn-block" role="button"><i class="glyphicon glyphicon-edit"></i> Criar novo e-mail newsletter</a>

            </div>

            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">


                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Assunto</th>
                                        <th>Email</th>
                                        <th>Data de envio</th>
                                        <th>Opções</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                @foreach($emails as $email)

                                    <tr>

                                        <td style="width: 20%;">

                                            <i class="glyphicon glyphicon-envelope"> </i>
                                            <span class="text-capitalize text-muted" style="min-width: 120px;
                                                display: inline;font-size: 11px;">{{ substr(strip_tags($email->subject), 0, 30) }}{{ strlen(strip_tags($email->subject))  > 30 ? " ..." : ""}}</span>
                                        </td>
                                        <td >
                                            {{ substr(strip_tags($email->body), 0, 100) }}{{ strlen(strip_tags($email->body))  > 100 ? " ..." : ""}}
                                            <span class="text-muted" style="font-size: 11px;"> <a href="{{ route('emailNewsletter.show', $email->id) }}"> Ver E-Mail</a></span> </td>
                                        <td>

                                            <span class="badge">{{ $email->created_at->format('d M Y') }}</span>

                                        </td>
                                        <td>
                                            <a href="{{ route('emailNewsletter.show', $email->id) }}">
                                                <button class="btn btn-default btn-xs">
                                                    <i class="glyphicon glyphicon-eye-open" title="Ver"></i></button>
                                            </a>

                                            {!! Form::open(['route' => ['emailNewsletter.destroy', $email->id], 'method' => 'DELETE']) !!}
                                            {{ Form::button('<span class="glyphicon glyphicon-remove"></span>',
                                             array('class'=>'btn btn-default btn-xs', 'type'=>'submit')) }}

                                            {!! Form::close() !!}
                                        </td>

                                    </tr>


                                @endforeach
                                </tbody>
                                </table>

                        <nav class="text-center">
                            {!! $emails->links() !!}

                        </nav>
                    </div>

                </div>


            </div>
        </div>

    </div>
@stop



