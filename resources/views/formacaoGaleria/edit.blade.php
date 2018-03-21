@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="col-md-12 content-box">
        <h1>Editar Imagem - {{$formacaoImagem->title}}</h1>
        <hr>
        {!! Form::model($formacaoImagem, ['route' => ['formacaoGaleria.update', $formacaoImagem->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-9">
            {{ Form::label('title', 'Título: ') }}
            {{ Form::text('title', null, ['class' => 'form-control input-lg', 'id' => 'inputTitle']) }}

            <hr>

            <div class ="glyphicon glyphicon-calendar"></div>
            {{ Form::label('date', 'Data da formação') }}
            {{Form::date('date',  null, ['class' => 'input-group date', 'id' => 'inputDate'])}}

            <hr>
            <div class ="glyphicon glyphicon-map-marker"></div>
            {{ Form::label('formacaoLocal', 'Local da formação') }}
            {{Form::text('formacaoLocal',  null, array('class'=> 'form-control','id'=>'inputLocal'))}}

            <hr>
            {{ Form::image('images/Formacoes/formacao_'.$formacaoImagem->image) }} <br>


            <div class ="glyphicon glyphicon-upload"></div>
            {{ Form::label('featured_img', 'Upload de nova imagem') }}
            {{ Form::file('featured_img', ['id' => 'image']) }}


        </div>
        <div class="col-md-3">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Criado em:</label>
                    <p>{{$formacaoImagem->created_at->format('d M Y, H:i')}}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Atualizado em:</label>
                    <p>{{$formacaoImagem->updated_at->format('d M Y, H:i')}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('formacaoGaleria.show', 'Cancelar', array($formacaoImagem->id), array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                       
                        {{ Form::submit('Guardar', ['class' => 'btn btn-success btn-block', 'id' => 'btnSave', 'style' => 'visibility: hidden;']) }}

                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div> <!-- end of content-box -->
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}


    <script type="text/javascript">
        document.getElementById('inputTitle').onkeyup = function(){
            document.getElementById('btnSave').style.visibility='visible';

        }
        document.getElementById('inputDate').onchange = function(){
            document.getElementById('btnSave').style.visibility='visible';

        }

        document.getElementById('inputLocal').onkeyup = function(){
            document.getElementById('btnSave').style.visibility='visible';

        }

        document.getElementById('image').onchange = function(){
            document.getElementById('btnSave').style.visibility='visible';
        }

    </script>

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@stop