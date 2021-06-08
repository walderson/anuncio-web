@if (!$slides->isempty())
<div class="slider">
    <ul class="slides">
        @foreach ($slides as $slide)
        <li>
            <img src="{{ asset($slide->imagem) }}">
            <div class="caption {{ $alinhamentos[rand(0, 2)] }}">
                <h3>{{ $slide->titulo }}</h3>
                <h5 class="light grey-text text-lighten-3">{{ $slide->descricao }}</h5>
                @if ($slide->link != null)
                <a href="{{ $slide->link }}" class="btn btn-large blue">Mais...</a>
                @endif
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif