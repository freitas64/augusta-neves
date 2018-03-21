@extends('mainAdmin')

@section('content')



    <div class="col-md-4">
        <div class="content-box-header">

            <div class="panel-title">{{ $category->name }}</div>


            <div class="panel-options">
                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE', 'id' => 'myForm']) !!}
                <a href="{{ route('categories.destroy', $category->id) }}" title="Eliminar" data-rel="collapse"><i
                            class="glyphicon glyphicon-trash"></i></a>
                {!! Form::close() !!}
            </div>

        </div>
        <div class="content-box-large box-with-header">
            {{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) }}

            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'inputName']) }}
            <br/><br/>
            {{ Form::submit('Guardar alterações', ['class' => 'btn btn-success btn-block', 'id' => 'btnSave', 'style' => 'visibility: hidden;']) }}
        </div>
        {{ Form::close() }}
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        document.getElementById('inputName').onkeyup = function () {
            document.getElementById('btnSave').style.visibility = 'visible';
        }
        $('form#myForm a').click(function(e){
            $('form#myForm').submit();
            e.preventDefault();
            return false;
        });
    </script>
@stop