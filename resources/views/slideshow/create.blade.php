@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

    <div class="col-md-12 content-box">
        <h1>Inserir nova imagem no slideshow</h1>

        <div class="col-md-12 panel-danger">
            <div class="content-box-header panel-heading">
                <H4>NOTAS</H4>

                <h4>*A NOVA IMAGEM DEVE TER SEMPRE AS SEGUINTES MEDIDAS, EM PIXEIS, 1171*441 (LARGURA*ALTURA)</h4>

            </div>


            <hr>




            {!! Form::open(array('route' => 'slideshow.store', 'data-parsley-validate' => '', 'files' => true)) !!}



            <div class ="glyphicon glyphicon-upload"></div>

            {{ Form::label('imagem', 'Upload de imagem') }}
            {{ Form::file('imagem') }}

            <hr>

            {{Form::submit('Adicionar Imagem', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'))}}

            {!! Form::close() !!}
        </div>

    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/vendor/tinymce/tinymce.min.js') !!}

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code jbimages',
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | jbimages",
            menubar: false,
            relative_urls: false
        });
    </script>

    <script type="text/javascript">
        var inputBox = document.getElementById('chatinput');
        inputBox.onkeyup = function(){
            document.getElementById('printchatbox').value = inputBox.value;
        }
    </script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection