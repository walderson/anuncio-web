@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Listagem de Municípios</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Listagem de Municípios</a>
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
                        <th>Unidade Federativa</th>
                        <th>Sigla UF</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($municipios as $municipio)
                    <tr>
                        <td>{{ $municipio->id }}</td>
                        <td>{{ $municipio->nome }}</td>
                        <td>{{ $municipio->uf }}</td>
                        <td>{{ $municipio->sigla_uf }}</td>
                        <td>
                            <form action="{{ route('admin.municipios.remover', $municipio->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                @can('atualizar-municipios')
                                <a href="{{ route('admin.municipios.alterar', $municipio->id) }}" class="btn orange">Atualizar</a>
                                @else
                                <a class="btn disabled">Atualizar</a>
                                @endcan
                                @can('remover-municipios')
                                <button onclick="return remover(this.form, '{{ $municipio->nome }}')" class="btn red">Remover</button>
                                @else
                                <button class="btn disabled">Remover</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            @can('cadastrar-municipios')
            <a href="{{ route('admin.municipios.cadastrar') }}" class="btn blue">Cadastrar</a>
            @else
            <a class="btn disabled">Cadastrar</a>
            @endcan
        </div>
    </div>
    <script>
        function remover(form, nome) {
            if(confirm("Confirma a remoção do município '" + nome + "'?")) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection