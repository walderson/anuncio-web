<div class="row section">
    <h3 class="center">Anúncios</h3>
    <div class="divider"></div>
    @include('layouts._site._filtro')
</div>

<div class="row section">
    @foreach ($anuncios as $anuncio)
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <a href="{{ route('site.anuncio', [$anuncio->id, Illuminate\Support\Str::slug($anuncio->titulo, '_')]) }}"><img src="{{ asset($anuncio->imagem) }}"></a>
                <span class="card-title">{{ $anuncio->titulo }}</span>
            </div>
            <div class="card-content">
                <p><b class="deep-orange-text darken-1">{{ $anuncio->finalidade }}</b></p>
                <p>{{ $anuncio->descricao }}</p>
                <p>R$ {{ number_format($anuncio->valor, 2, ',', '.') }}</p>
            </div>
            <div class="card-action">
                <a href="{{ route('site.anuncio', [$anuncio->id, Illuminate\Support\Str::slug($anuncio->titulo, '_')]) }}">Mais detalhes...</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row center">
    {{ $anuncios->withQueryString()->links() }}
</div>