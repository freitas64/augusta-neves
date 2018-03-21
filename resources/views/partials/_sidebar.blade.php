<!-- Widget Area -->
<div class="col-md-4 col-sm-5 col-xs-12 widget-area widget-space">
    <!-- Widget : About Me -->
    <aside class="widget widget_aboutme">
        <div class="aboutme-box">
            <h3 class="widget-title">SOBRE</h3>
            @foreach($about as $ab)
                <img src="{{ asset('images/Sobre/homeAbout_'.$ab->image) }}" alt="Sobre"/>
            <div class="aboutme-content">
                <p>{{ substr(strip_tags($ab->sobre), 0, 110) }}{{ strlen(strip_tags($ab->sobre))  > 110 ? " ..." : ""}}                </p>

                <a href="{{ url('about') }}" title="About Me">Sobre mim</a>
            </div>
                @endforeach
        </div>
    </aside><!-- Widget : About Me /- -->

    <!-- Widget : Categories -->
    <aside class="widget widget_categories">
        <h3 class="widget-title">CATEGORIAS</h3>
        <ul>
            @foreach($categories as $categorie)
                <li><a href="{{ route('blog.category', $categorie->id) }}" title="{{$categorie->name}}">{{$categorie->name}} </a></li>
            @endforeach
        </ul>
    </aside><!-- Widget : Categories /- -->

    <!-- Widget : Recent Posts -->
    <aside class="widget widget_latestposts">
        <h3 class="widget-title">Últimas publicações</h3>
        @foreach($last as $la)
            <p></p>
        <div class="recent-post">
            <div class="latest-content">

                <a href="{{url('blog/'.$la->slug)}}" title="{{$la->title}}"><i>
                        <?php if ($la->image == null): ?>
                        <img src="{{ asset('images/Posts/last_post_predefined.png') }}" alt="Post"/>
                        <?php else: ?>
                        <img src="{{ asset('images/Posts/lastPost_'.$la->image) }}" alt="{{$la->title}}">
                        <?php endif; ?></i></a>




                <span><a href="{{url('blog/'.$la->slug)}}"><i class="fa fa-clock-o"></i>{{ $la->created_at->format('d M, Y') }}</a></span>

                <h5><a title="{{$la->title}}" href="{{url('blog/'.$la->slug)}}">{{ substr(strip_tags($la->body), 0, 20) }}{{ strlen(strip_tags($la->body))  > 30 ? " ..." : ""}} </a></h5>
            </div>
        </div>
        @endforeach
    </aside><!-- Widget : Recent Posts /- -->

    <!-- Widget : Newsletter -->
    <aside class="widget widget_subscribe">
        <h3 class="widget-title">newslletter</h3>
        <div class="subscribe-box">
            <div class="input-group">
                {!! Form::open(array('route' => 'contactsNewsletter.store', 'data-parsley-validate' => '', 'files' => true),['url' => 'contact']) !!}

                {{Form::text('name', null, array('class'=> 'form-control','id'=>'nomeinput','placeholder'=>"Insira o seu nome", 'type'=>'text', 'required' => '', 'maxlength' => '255', 'data-parsley-required-message' => 'Nome é obrigatório'))}}
                <br>

                {{Form::email('email', null, array('class'=> 'form-control','id'=>'emailinput','placeholder'=>"Insira o seu email", 'type'=>'text', 'required' => '', 'maxlength' => '255', 'data-parsley-required-message' => 'E-mail é obrigatório'))}}
                <br>

                <hr>

                {{Form::submit('SUBSCREVER', array('class' => 'input-group-btn btn btn-default', 'style'=>'margin-top:20px;','id'=>'contactbtn'))}}
                @if (Session::has('success_message'))
                    <p></p>
                    <div class="alert alert-success {{Session::has('success_message')?'success_message':''}}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
                        {{ Session::get('success_message') }}</div>
                @elseif(Session::has('error_message'))
                    <p></p>
                    <div class="alert alert-danger {{Session::has('error_message')?'error_message':''}}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
                        {{Session::get('error_message')}}
                    </div>
                @endif

                {!! Form::close() !!}
            </div><!-- /input-group -->
        </div>
    </aside><!-- Widget : Newsletter -->

</div><!-- Widget Area /- -->

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/vendor/tinymce/tinymce.min.js') !!}

@endsection