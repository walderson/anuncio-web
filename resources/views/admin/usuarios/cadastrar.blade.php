@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Cadastrar Novo Usuário</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Listagem de Usuários</a>
                        <a href="#!" class="breadcrumb">Cadastrar Novo Usuário</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.usuarios') }}" method="post">
                @csrf
                @include('admin.usuarios._form')
                <button class="btn blue">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection