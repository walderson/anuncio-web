@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Permissões de {{ $papel->nome }}</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.papeis') }}" class="breadcrumb">Listagem de Papéis</a>
                        <a class="breadcrumb">Listagem de Permissões</a>
                    </div>
                </div>
            </nav>
        </div>
        @can('cadastrar-permissoes-papeis')
        <div class="row">
            <form action="{{ route('admin.papeis.permissoes', $papel->id) }}" method="post">
                @csrf
                <div class="input-field col m8 s12">
                    <select name="permissao_id" id="permissao_id">
                        @foreach ($permissoes as $permissao)
                        <option value="{{ $permissao->id }}">{{ $permissao->descricao }}</option>
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
                    @foreach($papel->permissoes as $permissao)
                    <tr>
                        <td>{{ $permissao->nome }}</td>
                        <td>{{ $permissao->descricao }}</td>
                        <td>
                            <form action="{{ route('admin.papeis.permissoes.remover', [$papel->id, $permissao->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                @can('remover-permissoes-papeis')
                                <button onclick="return remover(this.form, '{{ $permissao->nome }}')" class="btn red">Remover</button>
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
            if(confirm("Confirma a remoção da permissão '" + nome + "'?")) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection