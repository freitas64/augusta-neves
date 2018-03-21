@extends('mainBlog')

@section('banner')
    <div class="container-fluid no-left-padding no-right-padding page-banner portfolio-banner">
        <!-- Container -->
        <div class="container">
            <h3>Formação - Galeria</h3>
        </div>
        <!-- Container /- -->
    </div>
@endsection

@section('content')

        <!-- Content Block -->
        <div class="container-fluid no-left-padding no-right-padding portfolio-section portfolio-3-col">
            <!-- Container -->
            <div class="container">
                <!-- Gallery Filter -->

                <div class="row gallery-list">
                    @foreach($formacaoImagens as $imagem)
                        <div class="col-xs-6 gallery-box formacaoGaleria {{$imagem->id}}">
                            <kbd>{{$imagem->title}}</kbd><br>

                             <?php if ($imagem->formacaoLocal== null): ?>


                           <h6 class="text-muted"> <i class="glyphicon glyphicon-time"></i>  {{\Carbon\Carbon::parse($imagem->date)->format('d M Y')}}</h6>


                            <a href="{{asset('images/Formacoes/formacao_'.$imagem->image)}}">

                                <img src="{{asset('images/Formacoes/formacao_'.$imagem->image)}}" alt="Gallery"/>
                            </a>
                            <?php else: ?>
                            <h6 class="text-muted"> <i class="glyphicon glyphicon-time"></i>  {{\Carbon\Carbon::parse($imagem->date)->format('d M Y')}}  &nbsp;&nbsp; &nbsp;&nbsp;
                                <i class="glyphicon glyphicon-map-marker"></i>  {{$imagem->formacaoLocal}}</h6>


                            <a href="{{asset('images/Formacoes/formacao_'.$imagem->image)}}">

                                <img src="{{asset('images/Formacoes/formacao_'.$imagem->image)}}" alt="Gallery"/>


                            </a>



                            <?php endif; ?>


                        </div>


                    @endforeach
                </div>


    @endsection

                @section('pagination')

                    <nav class="text-center">
                        {!! $formacaoImagens->links() !!}

                    </nav>


@endsection
