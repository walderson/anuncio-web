@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Atualizar Dados de Usuário</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Listagem de Usuários</a>
                        <a class="breadcrumb">Atualizar Dados de Usuário</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.usuarios.atualizar', $usuario->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.usuarios._form')
                <button class="btn blue">Atualizar</button>
            </form>
        </div>
    </div>
@endsection