@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Atualizar Dados de Categoria</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.categorias') }}" class="breadcrumb">Listagem de Categorias</a>
                        <a class="breadcrumb">Atualizar Dados de Categoria</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.categorias.atualizar', $categoria->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.categorias._form')
                <button class="btn blue">Atualizar</button>
            </form>
        </div>
    </div>
@endsection