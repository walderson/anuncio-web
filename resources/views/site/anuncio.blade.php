@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h3 class="center">Detalhes do Anúncio</h3>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m8">
            @if ($anuncio->imagens()->count())
            <div class="row">
                <div class="slider">
                    <ul class="slides">
                        @foreach ($imagens as $imagem)
                        <li>
                            <img src="{{ asset($imagem->imagem) }}">
                            <div class="caption {{ $alinhamentos[rand(0, 2)] }}">
                                <h3>{{ $imagem->titulo }}</h3>
                                <h5 class="light grey-text text-lighten-3">{{ $imagem->descricao }}</h5>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row center">
                <button class="btn blue" onclick="sliderPrev()">Anterior</button>
                <button class="btn blue" onclick="sliderNext()">Próximo</button>
            </div>
            @else
            <img src="{{ asset($anuncio->imagem) }}" class="responsive-img">
            @endif
        </div>
        <div class="col s12 m4">
            <h4>{{ $anuncio->titulo }}</h4>
            <blockquote>{{ $anuncio->descricao }}</blockquote>
            <p><b>Código:</b> {{ $anuncio->id }}</p>
            <p><b>Finalidade:</b> {{ $anuncio->finalidade }}</p>
            <p><b>Categoria:</b> {{ $anuncio->categoria->titulo }}</p>
            <p><b>Endereço:</b> {{ $anuncio->endereco }}</p>
            <p><b>CEP:</b> {{ $anuncio->cep }}</p>
            <p><b>Município:</b> {{ $anuncio->municipio->nome }} - {{ $anuncio->municipio->sigla_uf }}</p>
            <p><b>Valor:</b> R$ {{ number_format($anuncio->valor, 2, ',', '.') }}</p>
            <a href="{{ route('site.contato') }}" class="btn deep-orange darken-1">Entrar em contato</a>
        </div>
    </div>
    <div class="row section">
        <div class="col s12 m8">
            <div class="video-container">{!! $anuncio->mapa !!}</div>
        </div>
        <div class="col s12 m4">
            {{ $anuncio->detalhes }}
        </div>
    </div>
</div>
@endsection
