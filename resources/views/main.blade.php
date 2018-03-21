<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie6"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie7"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="pt"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    @include('partials._head')
</head>

<body>
@include('partials._nav')

<div class="main-container">
    @include('partials._messages')
    @yield('slider')
    @yield('banner')
    <main class="site-main">
        <!-- Content Block -->
        <div class="container-fluid no-left-padding no-right-padding content-block">
            <!-- Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    @yield('content')
                    @include('partials._sidebar')
                </div><!-- Row /- -->
                <div class="clearfix"></div>
                @yield('pagination')
            </div>
            <!-- Container /- -->
        </div>
        <!-- Content Block /- -->
    </main>
</div>

@include('partials._footer')
@include('partials._javascripts')
@yield('scripts')
</body>
</html>