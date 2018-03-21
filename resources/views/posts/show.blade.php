@extends('mainAdmin')


@section('content')
    <div class="col-md-12 content-box">
        <div class="col-md-9">
            <?php if ($post->image == null): ?>
            <img src="{{ asset('images/Posts/index_img.png') }}" />
            <?php else: ?>
            <img src="{{ asset('images/Posts/blog_'.$post->image) }}" alt="Post"/>
            <?php endif; ?>
                <br>
            <h1>{{$post->title}}</h1>
            <hr>
            <p class="lead">{!! $post->body !!}</p>
            <hr>

            <div class="tags">
            @foreach($post->tags as $tag)
                <span class="label label-default">{{$tag->name}}</span>

            @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <div class="well">

                <dl class="dl-horizontal">
                    <label>Link permanente:</label>
                    <p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Categoria:</label>
                    <p>{{$post->category->name }}</p>
                </dl>

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
                        {!! Html::linkRoute('posts.edit', 'Editar', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection