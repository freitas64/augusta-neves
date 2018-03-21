@extends('mainAdmin')

@section('content')
    <div class="col-md-12 content-box">
        <div class="col-md-7">
            @foreach ($about as $ab)

                <label>SOBRE MIM</label>
                <p class="lead">{!! $ab->sobre !!}</p>
                <hr>
                <label>CITAÇÃO</label>
                    <blockquote>
                        <p>{!! $ab->citacao !!}</p>
                    </blockquote>
                <hr>
                <label>PERCURSO ACADÉMICO</label>
                <p class="lead">{!! $ab->percursoA !!}</p>
                <hr>
                <label>EXPERIÊNCIA PROFISSIONAL</label>
                <p class="lead">{!! $ab->experienciaP !!}</p>
                <hr>
        </div>
        <div class="col-md-5">
            <div class="well">

                <dl class="dl-horizontal">
                    <label>IMAGEM</label>
                    <br>
                    <img src="{{ asset('images/Sobre/indexAbout_').$ab->image }}" alt="Post"/>
                </dl>


                <div class="row">
                    <div class="col-sm-12">
                        {!! Html::linkRoute('sobre.edit', 'Editar', array($ab->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection




