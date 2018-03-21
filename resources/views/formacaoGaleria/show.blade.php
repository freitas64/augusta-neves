@extends('mainAdmin')


@section('content')
    <div class="col-md-12 content-box">
        <div class="col-md-9">
            <h3 class="text">Formação:  {{$formacao_imagem->title}}</h3>
            <hr>
            <h5>{{Form::label('title', 'Data da formação:  ')}}
                <data class="text-muted">{{"  ". \Carbon\Carbon::parse($formacao_imagem->date)->format('d M Y')}}</data></h5>

            <hr>

            <h5><i class ="glyphicon glyphicon-map-marker"></i>{{ Form::label('formacaoLocal', 'Local da formação:') }}
            <data class="text-muted">{{$formacao_imagem->formacaoLocal}}</data></h5>

            <hr>
            <h5>{{Form::label('image', 'Imagem:  ')}}</h5><br>
            <img src="{{asset('images/Formacoes/formacao_'.$formacao_imagem->image) }}" alt="Formacao"/>



        </div>
        <div class="col-md-3">
            <div class="well">


                <dl class="dl-horizontal">
                    <label>Criado em:</label>
                    <p>{{$formacao_imagem->created_at->format('d M Y, H:i')}}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Atualizado em:</label>
                    <p>{{$formacao_imagem->updated_at->format('d M Y, H:i')}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('formacaoGaleria.edit', 'Editar', array($formacao_imagem->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['formacaoGaleria.destroy', $formacao_imagem->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection