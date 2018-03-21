@extends('mainBlog')

@section('banner')
    <div class="container-fluid no-left-padding no-right-padding page-banner portfolio-banner">
        <!-- Container -->
        <div class="container">
            <h3>Manuais</h3>
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
            <div class="gallery-category">
                <ul id="filters">
                    <li><a class="active" data-filter="*" href="#" title="All">TODOS</a></li>
                    @foreach($ensinos as $ensino)

                        <li><a data-filter=".{{$ensino->id}}" href="#" title="{{$ensino->name}}">{{$ensino->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Gallery Filter /- -->
            <div class="type-post">
                <!-- Row -->
                <div class="entry-cover">
                    <div class="row gallery-list">
                        @foreach($manuais as $manual)

                            <div class="col-sm-3 col-xs-6 gallery-box {{$manual->ensino_id}}">

                                <a href="{{asset('images/Manuais/manual_'.$manual->image)}}">
                                    <img src="{{asset('images/Manuais/manual_'.$manual->image)}}" alt="Gallery"/>
                                    <div class="gallery-detail">
                                        <h4>{{$manual->title}}</h4>

                                    </div>
                                </a>
                                <?php if ($manual->linkManual == null): ?>
                                <div class="entry-cover">

                                </div>
                                <?php else: ?>


                                <div class="entry-cover">
                                    <div class="entry-read"><a target="_blank" href="{{$manual->linkManual}}"
                                                               title="Ver mais">Ver mais</a></div>
                                </div>
                                <?php endif; ?>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
