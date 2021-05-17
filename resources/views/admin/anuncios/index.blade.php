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
                                <a href="{{ route('admin.anuncios.alterar', $anuncio->id) }}" class="btn orange">Atualizar</a>
                                <button onclick="return remover(this.form, '{{ $anuncio->titulo }}')" class="btn red">Remover</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a href="{{ route('admin.anuncios.cadastrar') }}" class="btn blue">Cadastrar</a>
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