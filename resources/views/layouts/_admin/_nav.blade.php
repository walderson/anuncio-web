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
                <li><a href="#">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('admin.logout') }}">Sair</a></li>
                @endif
            </ul>
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
