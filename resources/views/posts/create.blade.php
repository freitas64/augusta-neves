@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

    <div class="col-md-10 content-box">
        <h1>Criar nova publicação</h1>
        <hr>
        {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}

        {{Form::label('title', 'Título:')}}
        {{Form::text('title', null, array('class'=> 'form-control','id'=>'chatinput', 'required' => '', 'maxlength' => '255', 'data-parsley-required-message' => 'Este campo é obrigatório'))}}
        <br>
        {{ Form::label('slug', 'Link permanente:') }}
        {{ Form::text('slug', null, ['class' => 'form-control','id' => 'printchatbox', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}
        <br>
        {{ Form::label('category_id', 'Categoria:') }}
        <select class="form-control" name="category_id" required="" data-parsley-required-message="É obrigatório selecionar uma categoria">
            <option selected disabled>Escolha uma opção</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        {{ Form::label('tags', 'Etiquetas:') }}
        <select class="form-control select2-multi" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <hr>
        <hr>
        <div class ="glyphicon glyphicon-upload"></div>
        {{ Form::label('featured_img', 'Upload de imagem') }}
        {{ Form::file('featured_img') }}

        <hr>
        {{Form::label('body', 'Corpo do Post:')}}
        {{Form::textarea('body', null, array('class' => 'form-control'))}}
        {{Form::submit('Criar Post', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'))}}

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
            toolbar:[
                'undo redo | styleselect | bold italic | link image | jbimages|formatselect, fontselect, fontsizeselect',
                'alignleft aligncenter alignright |bullist numlist outdent indent |jbimages'
            ],
            menubar: true,
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