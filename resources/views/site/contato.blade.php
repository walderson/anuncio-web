@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h3 class="center">Contato</h3>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m7">
            @if (isset($pagina->mapa))
            <div class="video-container">{!! $pagina->mapa !!}</div>
            @else
            <img src="{{ asset($pagina->imagem) }}" alt="" class="responsive-img">
            @endif
        </div>
        <div class="col s12 m5">
            <h4>{{ $pagina->titulo }}</h4>
            <blockquote>{{ $pagina->descricao }}</blockquote>
            <form action="{{ route('site.contato') }}" method="post" class="col s12">
                @csrf
                <div class="input-field">
                    <input type="text" id="nome" name="nome" class="validate">
                    <label for="name">Nome</label>
                </div>
                <div class="input-field">
                    <input type="email" id="email" name="email" class="validate">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field">
                    <textarea id="mensagem" name="mensagem" class="materialize-textarea"></textarea>
                    <label for="mensagem">Mensagem</label>
                </div>
                <button class="btn blue">Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection
