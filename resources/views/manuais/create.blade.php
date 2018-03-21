@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')



    <div class="col-md-10 content-box">
        <h1>Criar novo manual</h1>
        <hr>
        {!! Form::open(array('route' => 'manuais.store', 'data-parsley-validate' => '', 'files' => true)) !!}

        {{Form::label('title', 'Título:')}}
        {{Form::text('title', null, array('class'=> 'form-control','id'=>'chatinput', 'required' => '', 'maxlength' => '255', 'data-parsley-required-message' => 'Este campo é obrigatório'))}}
        <br>
        <br>
        {{Form::label('ensino', 'Ensino/Categoria do manual:')}}
        <select class="form-control" name="ensino_id" required="" data-parsley-required-message="É obrigatório selecionar um ensino">
            <option selected disabled>Escolha uma opção</option>
            @foreach($ensinos as $ensino)
                <option value="{{ $ensino->id }}">{{ $ensino->name }}</option>
            @endforeach
        </select>
        <br>


        {{Form::label('linkManual', 'Link:')}}
        {{Form::text('linkManual', null, array('class'=> 'form-control','id'=>'chatinput'))}}
        <br>
        <div class ="glyphicon glyphicon-upload"></div>
        {{ Form::label('featured_img', 'Upload de imagem') }}
        {{ Form::file('featured_img') }}



        {{Form::submit('Criar Livro', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'))}}

        {!! Form::close() !!}
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



    <script type="text/javascript">
        <!--

        $(document).ready(function () {

            window.setTimeout(function() {
                $(".alert").fadeTo(1500, 0).slideUp(300, function(){
                    $(this).remove();
                });
            }, 5000);

        });
        //-->
    </script>

@endsection
