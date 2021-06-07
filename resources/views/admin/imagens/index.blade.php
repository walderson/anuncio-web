@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Imagens do Anúncio</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.anuncios') }}" class="breadcrumb">Listagem de Anúncios</a>
                        <a class="breadcrumb">Imagens do Anúncio</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Ordem</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imagens as $imagem)
                    <tr>
                        <td>{{ $imagem->id }}</td>
                        <td>{{ $imagem->titulo }}</td>
                        <td>{{ $imagem->descricao }}</td>
                        <td><img src="{{ asset($imagem->imagem) }}" alt="" width="100"></td>
                        <td>{{ $imagem->ordem }}</td>
                        <td>
                            <form action="{{ route('admin.imagens.remover', $imagem->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                @can('atualizar-imagens')
                                <a href="{{ route('admin.imagens.alterar', $imagem->id) }}" class="btn orange">Atualizar</a>
                                @else
                                <a class="btn disabled">Atualizar</a>
                                @endcan
                                @can('remover-imagens')
                                <button onclick="return remover(this.form, '{{ $imagem->titulo }}')" class="btn red">Remover</button>
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
            @can('cadastrar-imagens')
            <a href="{{ route('admin.imagens.cadastrar', $anuncio->id) }}" class="btn blue">Cadastrar</a>
            @else
            <a class="btn disabled">Cadastrar</a>
            @endcan
        </div>
    </div>
    <script>
        function remover(form, titulo) {
            if(confirm("Confirma a remoção da imagem '" + titulo + "'?")) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection