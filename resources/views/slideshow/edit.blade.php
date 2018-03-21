@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="col-md-12 content-box">
        <h1>Editar Slideshow</h1>
        <hr>
        {!! Form::model($slideshow, ['route' => ['slideshow.update', $slideshow->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-9">

            {{ Form::image('images/slideshowAdmin_'.$slideshow->image) }}
            <hr>
            <div class ="glyphicon glyphicon-upload"></div>
            {{ Form::label('featured_img', 'Upload de nova imagem') }}
            {{ Form::file('featured_img', ['id' => 'imagem']) }}


        </div>
        <div class="col-md-3">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Criado em:</label>
                    <p>{{$slideshow->created_at->format('d M Y, H:i')}}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Atualizado em:</label>
                    <p>{{$slideshow->updated_at->format('d M Y, H:i')}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('slideshow.index', 'Cancelar', array($slideshow->id), array('class'=>'btn btn-danger btn-block')) !!}
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

        document.getElementById('imagem').onchange = function(){
            document.getElementById('btnSave').style.visibility='visible';
        }

    </script>

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@stop