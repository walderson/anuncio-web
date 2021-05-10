@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Cadastrar Nova Categoria</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.categorias') }}" class="breadcrumb">Listagem de Categorias</a>
                        <a class="breadcrumb">Cadastrar Nova Categoria</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.categorias') }}" method="post">
                @csrf
                @include('admin.categorias._form')
                <button class="btn blue">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection