@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Listagem de Anúncios</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Listagem de Anúncios</a>
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
                        <th>Finalidade</th>
                        <th>Município</th>
                        <th>Valor</th>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anuncios as $anuncio)
                    <tr>
                        <td>{{ $anuncio->id }}</td>
                        <td>{{ $anuncio->titulo }}</td>
                        <td>{{ $anuncio->finalidade }}</td>
                        <td>{{ $anuncio->municipio->nome }}</td>
                        <td>R$ {{ number_format($anuncio->valor, 2, ",", ".") }}</td>
                        <td><img src="{{ asset($anuncio->imagem) }}" alt="" width="100"></td>
                        <td>{{ $anuncio->status }}</td>
                        <td>
                            <form action="{{ route('admin.anuncios.remover', $anuncio->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                @can('listar-imagens')
                                <a href="{{ route('admin.imagens', $anuncio->id) }}" class="btn green">Imagens</a>
                                @else
                                <a class="btn disabled">Imagens</a>
                                @endcan
                                @can('atualizar-anuncios')
                                <a href="{{ route('admin.anuncios.alterar', $anuncio->id) }}" class="btn orange">Atualizar</a>
                                @else
                                <a class="btn disabled">Atualizar</a>
                                @endcan
                                @can('remover-anuncios')
                                <button onclick="return remover(this.form, '{{ $anuncio->titulo }}')" class="btn red">Remover</button>
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
            @can('cadastrar-anuncios')
            <a href="{{ route('admin.anuncios.cadastrar') }}" class="btn blue">Cadastrar</a>
            @else
            <a class="btn disabled">Cadastrar</a>
            @endcan
        </div>
    </div>
    <script>
        function remover(form, titulo) {
            if(confirm("Confirma a remoção do anúncio '" + titulo + "'?")) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection