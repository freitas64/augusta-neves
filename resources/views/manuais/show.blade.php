@extends('mainAdmin')


@section('content')
    <div class="col-md-12 content-box">
        <div class="col-md-9">


            <h1>{{$manuais->title}}</h1>
            <hr>
            <img src="{{ asset('images/Manuais/manual_'.$manuais->image) }}" alt="Post"/>
            <hr>
            <i class="glyphicon glyphicon-link" title="Link"></i> <label>Link:</label>
            <p class="lead"><a  target="_blank" href="{{$manuais->linkManual}}"
                    title="Ver mais">{{$manuais->linkManual}}</a></p>

        </div>
        <div class="col-md-3">
            <div class="well">

                <dl class="dl-horizontal">
                    <label>Ensino:</label>
                    <p>{{$manuais->ensino->name }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Criado em:</label>
                    <p>{{$manuais->created_at->format('d M Y, H:i')}}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Atualizado em:</label>
                    <p>{{$manuais->updated_at->format('d M Y, H:i')}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('manuais.edit', 'Editar', array($manuais->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['manuais.destroy', $manuais->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection