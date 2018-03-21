<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="maria augusta neves website" content="">
<meta name="Henrique Cunha & Rui Freitas" content="">

<title>Início - Maria Augusta Neves</title>

<!-- Standard Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('images//favicon.ico') }}" />

<!-- For iPhone 4 Retina display: -->
<link rel="apple-touch-icon-precomposed" href="{{ asset('images//apple-touch-icon-114x114-precomposed.png') }}">

<!-- For iPad: -->
<link rel="apple-touch-icon-precomposed" href="{{ asset('images//apple-touch-icon-72x72-precomposed.png') }}">

<!-- For iPhone: -->
<link rel="apple-touch-icon-precomposed" href="{{ asset('images//apple-touch-icon-57x57-precomposed.png') }}">

<!-- Library - Google Font Familys -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<!-- Library -->
<link href="{{ asset('css/lib.css') }}" rel="stylesheet">

<!-- Custom - Common CSS -->
<link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
<link href="{{ asset('css/elements.css') }}" rel="stylesheet">
<link href="{{ asset('css/rtl.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@yield('stylesheets')

<!--[if lt IE 9]>
<script src="{{asset('js/html5/respond.min.js')}}"></script>
<![endif]-->

