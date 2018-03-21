@extends('mainAdmin')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="col-md-12 content-box">
        <h1>Editar publicação</h1>
        <hr>
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-9">
            {{ Form::label('title', 'Título: ') }}
            {{ Form::text('title', null, ['class' => 'form-control input-lg', 'id' => 'inputTitle']) }}
            <br>

            {{ Form::label('slug', 'Link permanente: ') }}
            {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'inputSlug']) }}

            <br>

            {{ Form::label('category_id', 'Categoria: ') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'inputCats']) }}

            <br>

            {{ Form::label('tags', 'Etiquetas:') }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple', 'id' => 'inputTag']) }}

            <br>
<hr>
            <?php if ($post->image == null): ?>
            <img src="{{ asset('images/Posts/index_imgEdit.png') }}" alt="Post"/><br>
            <?php else: ?>
            {{ Form::image('images/Posts/lastPost_'.$post->image) }} <br>
            <?php endif; ?>


            <div class ="glyphicon glyphicon-upload"></div>
            {{ Form::label('featured_img', 'Upload de nova imagem') }}
            {{ Form::file('featured_img', ['id' => 'image']) }}

            <hr>
            {{ Form::label('body', 'Conteúdo: ') }}
            {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'inputBody']) }}
        </div>
        <div class="col-md-3">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Criado em:</label>
                    <p>{{$post->created_at->format('d M Y, H:i')}}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Atualizado em:</label>
                    <p>{{$post->updated_at->format('d M Y, H:i')}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancelar', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
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
        document.getElementById('inputTitle').onkeyup = function(){
            document.getElementById('btnSave').style.visibility='visible';
            document.getElementById('inputSlug').value = document.getElementById('inputTitle').value;
        }
        document.getElementById('inputSlug').onkeyup = function(){
            document.getElementById('btnSave').style.visibility='visible';
        }
        document.getElementById('inputBody').onkeyup = function(){
            document.getElementById('btnSave').style.visibility='visible';
        }
        document.getElementById('inputCats').onchange = function(){
            document.getElementById('btnSave').style.visibility='visible';

        }

        document.getElementById('image').onchange = function(){
            document.getElementById('btnSave').style.visibility='visible';
        }

        document.getElementById('inputTag').onchange = function(){
            document.getElementById('btnSave').style.visibility='visible';
        }
    </script>

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@stop