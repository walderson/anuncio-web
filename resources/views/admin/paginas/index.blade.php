@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Listagem de Páginas</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Listagem de Páginas</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paginas as $pagina)
                    <tr>
                        <td>{{ $pagina->id }}</td>
                        <td>{{ $pagina->tipo }}</td>
                        <td>{{ $pagina->titulo }}</td>
                        <td>{{ $pagina->descricao }}</td>
                        <td>
                            <a href="{{ route('admin.paginas.alterar', $pagina->id) }}" class="btn orange">Atualizar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection