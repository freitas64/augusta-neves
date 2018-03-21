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
    @include('partials.admin._head')
</head>

<body style="display: flex; min-height: 100vh; flex-direction: column;">
@include('partials.admin._nav')
<div class="page-content" style="flex: 1;">
    <div class="row">
        <div class="col-md-2">
            @include('partials.admin._menuLateral')
        </div>
        <div class="col-md-10">
            @include('partials._messages')
            @yield('content')
        </div>
    </div>
</div>
@include('partials.admin._footer')
@include('partials.admin._javascripts')
@yield('scripts')
</body>
</html>
