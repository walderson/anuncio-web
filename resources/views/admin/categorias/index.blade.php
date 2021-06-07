@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Listagem de Categorias</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Listagem de Categorias</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->titulo }}</td>
                        <td>
                            <form action="{{ route('admin.categorias.remover', $categoria->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                @can('atualizar-categorias')
                                <a href="{{ route('admin.categorias.alterar', $categoria->id) }}" class="btn orange">Atualizar</a>
                                @else
                                <a class="btn disabled">Atualizar</a>
                                @endcan
                                @can('remover-categorias')
                                <button onclick="return remover(this.form, '{{ $categoria->titulo }}')" class="btn red">Remover</button>
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
            @can('cadastrar-categorias')
            <a href="{{ route('admin.categorias.cadastrar') }}" class="btn blue">Cadastrar</a>
            @else
            <a class="btn disabled">Cadastrar</a>
            @endcan
        </div>
    </div>
    <script>
        function remover(form, titulo) {
            if(confirm("Confirma a remoção da categoria '" + titulo + "'?")) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection