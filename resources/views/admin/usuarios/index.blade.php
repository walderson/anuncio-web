@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Listagem de Usuários</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="#!" class="breadcrumb">Listagem de Usuários</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <a href="#" class="btn orange">Atualizar</a>
                            <a href="#" class="btn red">Remover</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a href="{{ route('admin.usuarios.cadastrar') }}" class="btn blue">Cadastrar</a>
        </div>
    </div>
@endsection