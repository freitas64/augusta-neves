@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="col-md-12 content-box">
        <h1>Editar Página SOBRE MIM</h1>
        <hr>
        {!! Form::model($about, ['route' => ['sobre.update', $about->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-9">

            <label>IMAGEM</label>
            <br>
            <img src="{{ asset('images/Sobre/indexAbout_').$about->image }}" alt="Post"/><br>
            <div class ="glyphicon glyphicon-upload"></div>
            <br>

            {{ Form::label('featured_img', 'Upload de nova imagem') }}
            {{ Form::file('featured_img', ['id' => 'image']) }}
            <hr>
            {{ Form::label('sobre', 'Sobre ') }}
            {{ Form::textarea('sobre', null, ['class' => 'form-control', 'id' => 'inputS']) }}
            <br>
            <hr>
            {{ Form::label('citacao', 'Citação ') }}
            {{ Form::text('citacao', null, ['class' => 'form-control input-lg', 'id' => 'inputC']) }}

            <br>
            <hr>

            {{ Form::label('percursoA', 'Percurso académico ') }}
            {{ Form::textarea('percursoA', null, ['class' => 'form-control', 'id' => 'inputP'])}}
            <br>
            <hr>
            {{ Form::label('experienciaP', 'Experiência profissional ') }}
            {{ Form::textarea('experienciaP', null, ['class' => 'form-control', 'id' => 'inputE'])}}




        </div>
        <div class="col-md-3">
            <div class="well">

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('sobre.index', 'Cancelar', array($about->id), array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-success btn-block', 'id' => 'btnGuardar', 'style' => 'visibility: hidden;']) }}
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div> <!-- end of content-box -->
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/vendor/tinymce/tinymce.min.js') !!}

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code jbimages',
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
            menubar: false,
            relative_urls: false
        });
    </script>


    <script type="text/javascript">
        document.getElementById('inputS').onkeyup = function(){
            document.getElementById('btnGuardar').style.visibility='visible';

        }
        document.getElementById('inputC').onkeyup = function(){
            document.getElementById('btnGuardar').style.visibility='visible';
        }

        document.getElementById('inputP').onchange = function(){
            document.getElementById('btnGuardar').style.visibility='visible';
        }

        document.getElementById('inputE').onchange = function(){
            document.getElementById('btnGuardar').style.visibility='visible';
        }

        document.getElementById('image').onchange = function(){
            document.getElementById('btnGuardar').style.visibility='visible';
        }

    </script>

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@stop