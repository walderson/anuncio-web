@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Papéis de {{ $usuario->name }}</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Listagem de Usuários</a>
                        <a class="breadcrumb">Listagem de Papéis</a>
                    </div>
                </div>
            </nav>
        </div>
        @can('cadastrar-papeis-usuarios')
        <div class="row">
            <form action="{{ route('admin.usuarios.papeis', $usuario->id) }}" method="post">
                @csrf
                <div class="input-field col m8 s12">
                    <select name="papel_id" id="papel_id">
                        @foreach ($papeis as $papel)
                        <option value="{{ $papel->id }}">{{ $papel->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field col m4 s12">
                    <button class="btn blue">Adicionar</button>
                </div>
            </form>
        </div>
        @endcan
        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuario->papeis->sortBy('nome') as $papel)
                    <tr>
                        <td>{{ $papel->nome }}</td>
                        <td>{{ $papel->descricao }}</td>
                        <td>
                            <form action="{{ route('admin.usuarios.papeis.remover', [$usuario->id, $papel->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                @can('remover-papeis-usuarios')
                                <button onclick="return remover(this.form, '{{ $papel->nome }}')" class="btn red">Remover</button>
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
    </div>
    <script>
        function remover(form, nome) {
            if(confirm("Confirma a remoção do papel '" + nome + "'?")) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection