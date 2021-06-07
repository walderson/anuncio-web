@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col m12 s12">
                <h2>Administração - Página Inicial</h2>
            </div>
        </div>
        <div class="row">
            @can('listar-anuncios')
            <div class="col s12 m4">
                <div class="card green darken-1">
                    <div class="card-content white-text">
                        <span class="card-title home">Anúncios</span>
                        <p>Listagem de Anúncios</p>
                    </div>
                    <div class="card-action">
                        <a class="white-text" href="{{ route('admin.anuncios') }}">Acessar</a>
                    </div>
                </div>
            </div>
            @endcan
            @can('listar-categorias')
            <div class="col s12 m4">
                <div class="card blue darken-1">
                    <div class="card-content white-text">
                        <span class="card-title home">Categorias</span>
                        <p>Listagem de Categorias</p>
                    </div>
                    <div class="card-action">
                        <a class="white-text" href="{{ route('admin.categorias') }}">Acessar</a>
                    </div>
                </div>
            </div>
            @endcan
            @can('listar-municipios')
            <div class="col s12 m4">
                <div class="card orange darken-1">
                    <div class="card-content white-text">
                        <span class="card-title home">Municípios</span>
                        <p>Listagem de Municípios</p>
                    </div>
                    <div class="card-action">
                        <a class="white-text" href="{{ route('admin.municipios') }}">Acessar</a>
                    </div>
                </div>
            </div>
            @endcan
            @can('listar-slides')
            <div class="col s12 m4">
                <div class="card deep-purple">
                    <div class="card-content white-text">
                        <span class="card-title home">Slides</span>
                        <p>Listagem de Slides</p>
                    </div>
                    <div class="card-action">
                        <a class="white-text" href="{{ route('admin.slides') }}">Acessar</a>
                    </div>
                </div>
            </div>
            @endcan
            @can('listar-usuarios')
            <div class="col s12 m4">
                <div class="card deep-orange">
                    <div class="card-content white-text">
                        <span class="card-title home">Usuários</span>
                        <p>Listagem de Usuários</p>
                    </div>
                    <div class="card-action">
                        <a class="white-text" href="{{ route('admin.usuarios') }}">Acessar</a>
                    </div>
                </div>
            </div>
            @endcan
            @can('listar-papeis')
            <div class="col s12 m4">
                <div class="card red darken-3">
                    <div class="card-content white-text">
                        <span class="card-title home">Papéis</span>
                        <p>Listagem de Papéis</p>
                    </div>
                    <div class="card-action">
                        <a class="white-text" href="{{ route('admin.papeis') }}">Acessar</a>
                    </div>
                </div>
            </div>
            @endcan
            @can('listar-paginas')
            <div class="col s12 m4">
                <div class="card purple darken-3">
                    <div class="card-content white-text">
                        <span class="card-title home">Páginas</span>
                        <p>Listagem de Páginas</p>
                    </div>
                    <div class="card-action">
                        <a class="white-text" href="{{ route('admin.paginas') }}">Acessar</a>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
@endsection