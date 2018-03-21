@extends('main')

@section('content')

        <!-- Content Area -->
<div class="col-md-8 col-sm-7 col-xs-12 content-area content-area-space">
    <article class="type-post">
        <!-- Entry Cover -->
        <div class="entry-cover">
            <a href="#">
                <?php if ($post->image == null): ?>
                    <img src="{{ asset('images/Posts/single_img.png') }}" alt="Post"/>
                <?php else: ?>
                <img src="{{ asset('images/Posts/single_'.$post->image) }}" alt="Post"/>
                <?php endif; ?>
            </a>
            <div class="entry-meta"><a href="{{ route('blog.category', $post->category_id) }}" title="{{ $post->category->name }}">{{ $post->category->name }}</a></div>
        </div>
        <!-- Entry Cover /- -->
        <div class="entry-content">
            <h3 class="entry-title"><a href="#" title="{{ $post->title }}">{{ $post->title }}</a></h3>

            <div class="post-meta">
                <span><a href="#"><i class="fa fa-user"></i> Maria Augusta Neves</a></span>
                <span><a href="#"><i class="fa fa-clock-o"></i> {{ $post->created_at->format('d M Y') }}</a></span>

            </div>
            <p>{!! $post->body !!}</p>

            <div class="entry-footer">
                <div class="tags">
                    <span class="fa fa-tags"></span>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('blog.tag', $tag->id) }}" title="{{ $tag->name }}">{{ $tag->name }}</a>
                    @endforeach
                    <a href="#" title=""></a>
                </div>
                <ul>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="http://www.twitter.com/share?url={{ url()->current() }}" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>

    </article>


</div><!-- Content Area /- -->

@endsection