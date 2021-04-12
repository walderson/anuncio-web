<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">AnúncioWeb</h5>
                <p class="grey-text text-lighten-3">Módulo administrativo do site de anúncios.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="{{ route('site.home') }}" target="_blank">Site</a></li>
                    @if(Auth::guest())
                    <li><a class="grey-text text-lighten-3" href="{{ route('admin.login') }}">Entrar</a></li>
                    @else
                    <li><a class="grey-text text-lighten-3" href="{{ route('admin.home') }}">Início</a></li>
                    <li><a class="grey-text text-lighten-3" href="{{ route('admin.logout') }}">Sair</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2021 AnúncioWeb
            <a class="grey-text text-lighten-4 right" href="#!">Mais Links</a>
        </div>
    </div>
</footer>