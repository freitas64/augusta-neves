@extends('mainAdmin')

@section('content')



    <div class="col-md-12 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title ">
                <h3>Etiqueta <b>{{ $tag->name }}</b> <small> {{ $tag->posts()->count() }} {{ $tag->posts()->count() == 1 ? ' publicação' : ' publicações' }}</small></h3>
            </div>
            <div class="panel-options">
                <a href="{{ route('tags.edit', $tag->id) }}"><i class="glyphicon glyphicon-pencil" title="Editar etiqueta"></i></a>
            </div>
        </div>
        <div class="content-box-large box-with-header">
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Título da publicação</th>
                        <th>Etiquetas</th>
                    </tr>
                    @foreach($tag->posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tags.show', $tag->id) }}"><span class="label label-default">{{ $tag->name }}</span></a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection


