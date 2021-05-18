@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Atualizar Dados de Anúncio</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.anuncios') }}" class="breadcrumb">Listagem de Anúncios</a>
                        <a class="breadcrumb">Atualizar Dados de Anúncio</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.anuncios.atualizar', $anuncio->id) }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.anuncios._form')
                <button class="btn blue">Atualizar</button>
            </form>
        </div>
    </div>
@endsection