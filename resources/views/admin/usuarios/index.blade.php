@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Listagem de Usuários</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Listagem de Usuários</a>
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
                            <form action="{{ route('admin.usuarios.remover', $usuario->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <a href="{{ route('admin.usuarios.papeis', $usuario->id) }}" class="btn green">Papéis</a>
                                @can('atualizar-usuarios')
                                <a href="{{ route('admin.usuarios.alterar', $usuario->id) }}" class="btn orange">Atualizar</a>
                                @else
                                <a href="#!" class="btn disabled">Atualizar</a>
                                @endcan
                                @can('remover-usuarios')
                                <button onclick="return remover(this.form, '{{ $usuario->name }}')" class="btn red">Remover</button>
                                @else
                                <button class="btn disabled">Remover</button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            @can('cadastrar-usuarios')
            <a href="{{ route('admin.usuarios.cadastrar') }}" class="btn blue">Cadastrar</a>
            @else
            <a href="#!" class="btn disabled">Cadastrar</a>
            @endcan
        </div>
    </div>
    <script>
        function remover(form, name) {
            if(confirm("Confirma a remoção do usuário '" + name + "'?")) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection