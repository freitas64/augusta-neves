@extends('mainAdmin')


@section('content')
    <div class="col-md-12 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title "><h3>Todas as publicações</h3></div>

            <div class="panel-options">
                <a href="{{ route('posts.create') }}" title="Nova publicação"><i class="glyphicon glyphicon-plus"></i></a>
            </div>
        </div>
        <div class="content-box-large box-with-header">


            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Conteúdo</th>
                        <th>Etiquetas</th>
                        <th>Criado em</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)

                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ substr($post->title, 0, 40) }}{{ strlen($post->body)  > 40 ? " ..." : ""}}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 70) }}{{ strlen(strip_tags($post->body))  > 70 ? " ..." : ""}}</td>

                            <td>
                                @foreach($post->tags as $tag)
                                    <span class="label label-default"><small>{{ $tag->name }}</small></span>
                                @endforeach
                            </td>

                            <td><span class="badge">{{ $post->created_at->format('d M Y') }}</span></td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}">
                                    <button class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open" title="Ver"></i></button>
                                </a>
                                <a href="{{ route('posts.edit', $post->id) }}">
                                    <button class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil" title="Editar"></i></button>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>


@endsection




