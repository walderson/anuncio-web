<nav>
    <div class="nav-wrapper blue">
        <div class="container">
            <a href="{{ route('site.home') }}" class="brand-logo" target="_blank">AnúncioWeb</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                @if(Auth::guest())
                <li><a href="{{ route('admin.login') }}">Entrar</a></li>
                @else
                <li><a href="{{ route('admin.home') }}">Início</a></li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdown1">{{ Auth::user()->name }}
                        <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="{{ route('admin.logout') }}">Sair</a></li>
                @endif
            </ul>
            @if(!Auth::guest())
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
                <li><a href="{{ route('admin.paginas') }}">Páginas</a></li>
            </ul>
            @endif
        </div>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    @if(Auth::guest())
    <li><a href="{{ route('admin.login') }}">Entrar</a></li>
    @else
    <li><a href="{{ route('admin.home') }}">Início</a></li>
    <li><a href="#">{{ Auth::user()->name }}</a></li>
    <li><a href="{{ route('admin.logout') }}">Sair</a></li>
    @endif
</ul>
