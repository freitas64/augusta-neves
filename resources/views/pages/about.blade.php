@extends('mainBlog')

@section('banner')
    <div class="container-fluid no-left-padding no-right-padding page-banner portfolio-banner">
        <!-- Container -->
        <div class="container">
            <h3>Sobre mim</h3>
        </div>
        <!-- Container /- -->
    </div>
@endsection

@section('content')
    <main class="site-main">
        <!-- Content Block -->
        <div class="container-fluid no-left-padding no-right-padding content-block about-section">
            <!-- Container -->
            <div class="container">
                <div class="about-detail">

                    <div class="col-md-5 col-sm-6  about-img">

                        <img src="{{ asset('images/Sobre/about_'.$about->image) }}" alt="Sobre"/>
                    </div>

                    <div class="col-md-7 col-sm-6 about-content">


                        <h3>SOBRE MIM</h3>
                        <h6 class="lead"><?echo "$about->sobre"?></h6>
                        <hr>

                        <blockquote>
                            <p>{!! $about->citacao !!}</p>
                        </blockquote>
                        <hr>
                        <h3>PERCURSO ACADÉMICO</h3>
                        <p class="lead">{!! $about->percursoA !!}</p>
                        <hr>
                        <h3>EXPERIÊNCIA PROFISSIONAL</h3>
                        <p class="lead">{!! $about->experienciaP !!}</p>
                        <hr>

                    </div>
                    <!--
                    <div class="col-md-7 col-sm-6 about-content">
                        <h3>SOBRE MIM</h3>
                        <p class="lead">{{$about->sobre}}</p>
                        <blockquote>
                            <p>{{$about->citacao}}</p>
                        </blockquote>


                        <h3>Percurso académico</h3>
                        <p class="lead">{{$about->percursoA}}</p>
                        <h3>Experiência Profissional</h3>
                        <p class="lead">{{$about->experienciaP}}</p>

                    </div> -->
                </div>

            </div><!-- Container /- -->
        </div><!-- Content Block /- -->
    </main>
@endsection
