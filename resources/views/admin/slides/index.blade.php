@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Slides do Site</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Slides do Site</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Ordem</th>
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Imagem</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $slide)
                    <tr>
                        <td>{{ $slide->ordem }}</td>
                        <td>{{ $slide->titulo }}</td>
                        <td>{{ $slide->descricao }}</td>
                        <td>{{ $slide->status }}</td>
                        <td><img src="{{ asset($slide->imagem) }}" alt="" width="100"></td>
                        <td>
                            <form action="{{ route('admin.slides.remover', $slide->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <a href="{{ route('admin.slides.alterar', $slide->id) }}" class="btn orange">Atualizar</a>
                                <button onclick="return remover(this.form, '{{ $slide->titulo }}')" class="btn red">Remover</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a href="{{ route('admin.slides.cadastrar') }}" class="btn blue">Cadastrar</a>
        </div>
    </div>
    <script>
        function remover(form, titulo) {
            if(confirm("Confirma a remoção do slide '" + titulo + "'?")) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection