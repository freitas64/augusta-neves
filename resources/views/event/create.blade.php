@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')



    <div class="col-md-6 content-box">
        <h1>Adicionar evento</h1>
        <hr>
        {!! Form::open(array('route' => 'event.store', 'data-parsley-validate' => '', 'files' => true)) !!}

        {{Form::label('title', 'Título:')}}
        {{Form::text('title', null, array('class'=> 'form-control','id'=>'chatinput', 'required' => '', 'maxlength' => '255', 'data-parsley-required-message' => 'Este campo é obrigatório'))}}



        <hr>
        <div class ="glyphicon glyphicon-calendar"></div>
        {{ Form::label('start_date', 'Data início') }}
        {{Form::date('start_date', \Carbon\Carbon::now())}}

        <hr>
        <div class ="glyphicon glyphicon-calendar"></div>
        {{ Form::label('end_date', 'Data fim') }}
        {{Form::date('end_date', \Carbon\Carbon::now())}}


        {{Form::submit('Adicionar evento', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'))}}

        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/vendor/tinymce/tinymce.min.js') !!}







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
