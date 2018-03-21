@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

    <div class="col-md-10 content-box">
        <h1>Criar E-Mail Newsletter</h1>
        <hr>
        {!! Form::open(array('route' => 'contactsNewsletter.store', 'data-parsley-validate' => '', 'files' => true)) !!}

        {{Form::label('sendTo', 'Enviar Para')}}
         <select class="form-control select2-multi" name="emails[]" multiple="multiple">
            @foreach($emails as $email)
                <option value="{{ $email->id}}">{{ $email->name." (".$email->email}})</option>
            @endforeach
        </select>
        {{ Form::label('subject', 'Assunto') }}
        {{ Form::text('subject', null, ['class' => 'form-control','id' => 'printchatbox', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}
        <br>


        {{ Form::label('featured_file', 'Upload de ficheiro') }}
        {{ Form::file('featured_file') }}

        <hr>
        {{Form::label('message', 'Mensagem E-mail:')}}
        {{Form::textarea('message', null, array('class' => 'form-control'))}}
        {{Form::submit('Enviar Newsletter', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'))}}

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
@endsection