@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Cadastrar Novas Imagens</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.anuncios') }}" class="breadcrumb">Listagem de Anúncios</a>
                        <a href="{{ route('admin.imagens', $anuncio->id) }}" class="breadcrumb">Imagens do Anúncio</a>
                        <a class="breadcrumb">Cadastrar Novas Imagens</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.imagens', $anuncio->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @include('admin.imagens._form')
                <button class="btn blue">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection