@extends('mainAdmin')


@section('content')

    <div class="col-md-11 panel-warning">

        <div class="content-box-header panel-heading">
            <div class="panel-title "><h3>SLIDESHOW</h3></div>

            <div class="panel-options">
                <a href="{{ route('slideshow.create') }}" title="Inserir nova imagem">  <i class="glyphicon glyphicon-plus"></i>INSERIR IMAGEM</a>
            </div>
        </div>
        <div class="content-box-large box-with-header">

            <label>
            </label>
            <div class="col-md-12 panel-danger">

                <dIV class="content-box-header panel-heading">
                    <H4>NOTAS</H4>
                    <H6>*A ÚLTIMA IMAGEM IRÁ SER SEMPRE A PRIMEIRA A APARECER.
                        <BR> SE QUISER ALGUMA IMAGEM EM ESPECÍFICO A APARECER EM PRIMEIRO TERÁ DE EDITAR SEMPRE A ÚLTIMA,DA LISTAGEM A SEGUIR, OU INSERIR UMA NOVA.</H6>
                    <h6>*AO INSERIR NOVA IMAGEM DEVE TER SEMPRE AS SEGUINTES MEDIDAS, EM PIXEIS,<br> 1171*441 (LARGURA*ALTURA)</h6>
                    <h5>*POR FAVOR NÃO COLOCAR MAIS DO QUE 5 IMAGENS NO SLIDESHOW</h5>
                    </div>
            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>IMAGEM</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($slideshow as $slide)


                        <tr>
                            <th>{{ $slide->id }}</th>
                            <th><img src="{{ asset('images/Slideshow/slideshowAdmin_'.$slide->image) }}" alt="Slide"></th>
                            <th>
                                <a href="{{ route('slideshow.edit', $slide->id) }}">
                                    <button class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-pencil" title="Editar"></i> EDITAR</button>
                                </a>
                                <p></p>
                                {!! Form::open(['route' => ['slideshow.destroy', $slide->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-block ']) !!}
                                {!! Form::close() !!}

                            </th>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-center">
                    {!! $slideshow->links() !!}
                </div>
            </div>
        </div>
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
            }, 2500);

        });
        //-->
    </script>
@endsection



