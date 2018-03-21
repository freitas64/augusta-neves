@extends('main')

@section('slider')
<!-- Slider Section -->
<div class="container-fluid no-left-padding no-right-padding slider-section">
    <!-- Container -->
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">


                    <div class="item active">
                        <!--<img src="http://placehold.it/1170x441" alt="Slide"> -->
                        <img src="{{ asset('images/Slideshow/slideshow_'.$slideshow[0]->image) }}" alt="Slide">

                    </div>
                <?php
                    $max =sizeof($slideshow);
                ?>
                @for($i = 1 ; $i<$max; $i++)
                    <div class="item">
                        <!--<img src="http://placehold.it/1170x441" alt="Slide"> -->
                        <img src="{{ asset('images/Slideshow/slideshow_'.$slideshow[$i]->image) }}" alt="Slide">

                    </div>
                @endfor

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Container /- -->
</div><!-- Slider Section /- -->
@endsection

@section('content')


        <!-- Content Area -->
<div class="col-md-8 col-sm-7 col-xs-12 content-area content-area-space no-left-padding no-right-padding">
    @foreach($posts as $post)
        <div class="blog-twocolumn col-md-6 col-sm-12 col-xs-6">


            <!-- Type Post -->
            <div class="type-post">
                <!-- Entry Cover -->
                <div class="entry-cover">
                    <a href="#">
                        <?php if ($post->image == null): ?>
                        <img src="{{ asset('images/Posts/index_img.png') }}" alt="Post"/>
                        <?php else: ?>
                        <img src="{{ asset('images/Posts/index_'.$post->image) }}" alt="Post"/>
                        <?php endif; ?>
                    </a>

                    <div class="entry-meta">
                        @empty($post->category_id)
                            <a href="#" title="Categoria">Sem Categoria</a>
                        @endempty

                        @isset($post->category_id)
                            <a href="{{ route('blog.category', $post->category_id) }}" title="Categoria">{{ $post->category->name }}</a>
                        @endisset
                    </div>
                </div>
                <!-- Entry Cover /- -->
                <div class="entry-content" style="height: 300px;">
                    <h3 class="entry-title"><a href="#"
                                               title="{{ $post->title }}">{{ substr($post->title, 0, 22) }}{{ strlen($post->title)  > 22 ? " ..." : ""}}</a>
                    </h3>

                    <div class="post-meta">
                        <span><a href="#"><i class="fa fa-user"></i> Maria Augusta Ferreira Neves</a></span>
                        <span><a href="#"><i class="fa fa-clock-o"></i> {{ $post->created_at->format('d M, Y') }}
                            </a></span>
                    </div>
                    <p>{{ substr(strip_tags($post->body), 0, 110) }}{{ strlen(strip_tags($post->body))  > 110 ? " ..." : ""}}</p>

                </div>
                <div class="entry-cover">
                    <div class="entry-read"><a href="{{url('blog/'.$post->slug)}}" title="Ler mais">Ler</a></div>
                </div>
                <!-- Entry Cover /- -->
            </div>
            <!-- Type Post /- -->


        </div>
    @endforeach
</div><!-- Content Area /- -->
@endsection




@section('pagination')

    <nav class="text-center">
        {!! $posts->links() !!}

    </nav>


@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/vendor/tinymce/tinymce.min.js') !!}

    <script type="text/javascript">
        <!--

        $(document).ready(function () {

            window.setTimeout(function() {
                $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 5000);

        });
        //-->
    </script>
@endsection
