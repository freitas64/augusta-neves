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
    <!-- Page Slider quando existir -->
    @yield('slider')
    <!-- Page Banner -->
    @yield('banner')
    <!-- Para deixar qualquer tipo de mensagens -->
    @include('partials._messages')

    <!-- Site Main -->
    <main class="site-main">
        @yield('content')
        @yield('pagination')
    </main>
</div>
<!-- Footer -->
@include('partials._footer')
@include('partials._javascripts')
@yield('scripts')
</body>
</html>