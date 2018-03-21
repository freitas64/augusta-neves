@extends('mainBlog')

@section('banner')
    <div class="container-fluid no-left-padding no-right-padding page-banner portfolio-banner">
        <!-- Container -->
        <div class="container">
            <h3>Categoria | {{ $info['name'] }}
                <span class="badge"> {{ $info['total'] }}</span>
            </h3>
        </div>
        <!-- Container /- -->
    </div>
    @endsection

    @section('content')


            <!-- Content Block -->
    <div class="container-fluid no-left-padding no-right-padding content-block blog-category">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Content Area -->
                <div class="col-md-8 col-sm-7 col-xs-12 content-area content-area-space no-left-padding no-right-padding">

                    @foreach($posts as $post)

                        <div class="blog-parts col-xs-12 col-md-offset-2">
                            <div class="type-post">
                                <div class="entry-cover col-md-5">
                                    <a href="{{ route('blog.single', $post->slug) }}">
                                        <?php if ($post->image == null): ?>
                                            <img src="{{ asset('images/Posts/blog_index_img.png') }}" alt="Post"/>
                                        <?php else: ?>
                                        <img src="{{ asset('images/Posts/blog_'.$post->image) }}" alt="Post"/>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="entry-content col-md-7">
                                    <h3 class="entry-title"><a href="#"
                                                               title="{{ $post->title }}">{{ $post->title }}</a></h3>

                                    <div class="post-meta">
                                        <span><a href="#"><i class="fa fa-user"></i> By Maria Augusta Neves</a></span>
                                        <span><a href="#"><i
                                                        class="fa fa-clock-o"></i> {{ $post->created_at->format('d M Y') }}
                                            </a></span>
                                    </div>
                                    <p>{{ substr(strip_tags($post->body), 0, 200) }}{{ strlen(strip_tags($post->body))  > 200 ? " ..." : ""}}</p>

                                    <div class="read-more">
                                        <a href="{{ route('blog.single', $post->slug) }}" title="Ler mais">Ler</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

@section('pagination')

    <nav class="text-center">
        {!! $posts->links() !!}
    </nav>

@endsection