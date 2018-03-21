<!-- Header Section -->
<header class="header_s">

    <!-- SidePanel -->
    <div id="slidepanel">
        <!-- Top Header -->
        <div class="container-fluid no-right-padding no-left-padding top-header">
            <!-- Container -->
            <div class="container">

                @if(Auth::check())
                <div class="top-right">
                    <ul>
                        <li><a href="/admin"><i class="fa fa-home"></i></a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                @endif

            </div><!-- Container /- -->
        </div><!-- Top Header /- -->
    </div><!-- SidePanel /- -->
    <!-- Menu Block -->
    <div class="menu-block">
        <!-- Container -->
        <div class="container">
            <!-- Ownavigation -->
            <nav class="navbar ownavigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="\">Maria Augusta Ferreira Neves</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('home') }}" title="Início">Início</a>
                        </li>
                        <li>
                            <a href="{{ url('galeriaFormacao') }}" title="FormaçãoGaleria">Formação - Galeria</a>
                        </li>
                        <li><a href="{{ url('portfolio') }}" title="Manuais">Manuais</a></li>
                        <li><a href="{{ url('about') }}" title="Sobre">Sobre</a></li>

                        <li><a href="{{ url('contact') }}" title="Contactos">Contactos</a></li>
                    </ul>
                </div>
            </nav><!-- Ownavigation /- -->
        </div><!-- Container /- -->
    </div><!-- Menu Block /- -->
</header><!-- Header Section /- -->