<div class="sidebar content-box" style="display: block;">
    <ul class="nav">
        <!-- Main menu -->
        <li class="{{ Request::is('admin') ? "current" : "" }}"><a href="{!! URL::to('/admin') !!}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
        <li class="{{ Request::is('slideshow') ? "current" : "" }}"><a href="{{ route('slideshow.index') }}"><i class="glyphicon glyphicon-picture"></i> Slideshow</a></li>
        <li class="{{ Request::is('posts') ? "current" : "" }}"><a href="{{ route('posts.index') }}"><i class="glyphicon glyphicon-duplicate"></i> Publicações</a></li>
        <li class="{{ Request::is('formacaoGaleria') ? "current" : "" }}"><a href="{{ route('formacaoGaleria.index') }}"><i class="glyphicon glyphicon-camera"></i><p>Formação-Galeria</p></a></li>
        <li class="{{ Request::is('categories') ? "current" : "" }}"><a href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-pushpin"></i> Categorias</a></li>
        <li class="{{ Request::is('tags') ? "current" : "" }}"><a href="{{ route('tags.index') }}"><i class="glyphicon glyphicon-tags"></i> Etiquetas</a></li>
        <li class="{{ Request::is('manuais') ? "current" : "" }}"><a href="{{ route('manuais.index') }}"><i class="glyphicon glyphicon-book"></i> Manuais</a></li>
        <li class="{{ Request::is('ensinos') ? "current" : "" }}"><a href="{{ route('ensinos.index') }}"><i class="glyphicon glyphicon-education"></i> Ensinos</a></li>
        <li class="{{ Request::is('newsletter') ? "current" : "" }}"><a href="{{ route('contactsNewsletter.index') }}"><i class="glyphicon glyphicon-envelope"></i> Newsletter</a></li>
        <li class="{{ Request::is('sobre') ? "current" : "" }}"><a href="{{ route('sobre.index') }}"><i class="glyphicon glyphicon-user"></i> Acerca</a></li>

    </ul>
</div>
