@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Cadastrar Novo Anúncio</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.anuncios') }}" class="breadcrumb">Listagem de Anúncios</a>
                        <a class="breadcrumb">Cadastrar Novo Anúncio</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.anuncios') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @include('admin.anuncios._form')
                <button class="btn blue">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection