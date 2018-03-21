@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')



    <div class="col-md-8 content-box">

        <h1>Inserir nova imagem de Formação</h1>

        <hr>
        {!! Form::open(array('route' => 'formacaoGaleria.store', 'data-parsley-validate' => '', 'files' => true)) !!}

        {{Form::label('title', 'Descrição:')}}
        {{Form::text('title', null, array('class'=> 'form-control','id'=>'chatinput', 'required' => '', 'maxlength' => '150', 'data-parsley-required-message' => 'Este campo é obrigatório'))}}

        <hr>
        <div class ="glyphicon glyphicon-calendar"></div>
        {{ Form::label('date', 'Data da formação') }}
        {{Form::date('date', \Carbon\Carbon::now())}}

        <hr>
        <div class ="glyphicon glyphicon-map-marker"></div>
        {{ Form::label('formacaoLocal', 'Local da formação') }}
        {{Form::text('formacaoLocal',  null, array('class'=> 'form-control','id'=>'chatinput'))}}

        <hr>
        <div class ="glyphicon glyphicon-upload"></div>
        {{ Form::label('featured_img', 'Upload de imagem') }}
        {{ Form::file('featured_img') }}


        {{Form::submit('Adicionar Imagem', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'))}}

        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
@endsection
