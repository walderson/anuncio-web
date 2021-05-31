<div class="row">
    <form action="{{  route('site.busca') }}">
        <div class="input-field col s6 m3">
            <select id="finalidade" name="finalidade">
                <option value="">Todas</option>
                <option value="Aluguel"{{ $dados['finalidade'] == 'Aluguel' ? " selected" : "" }}>Aluguel</option>
                <option value="Troca"{{ $dados['finalidade'] == 'Troca' ? " selected" : "" }}>Troca</option>
                <option value="Venda"{{ $dados['finalidade'] == 'Venda' ? " selected" : "" }}>Venda</option>
            </select>
            <label for="finalidade">Finalidade</label>
        </div>
        <div class="input-field col s6 m3">
            <select id="categoria" name="categoria_id">
                <option value="">Todas</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"{{ $dados['categoria_id'] == $categoria->id ? " selected" : "" }}>{{ $categoria->titulo }}</option>
                @endforeach
            </select>
            <label for="categoria">Categoria</label>
        </div>
        <div class="input-field col s12 m6">
            <select id="municipio" name="municipio_id">
                <option value="">Todos</option>
                @foreach ($municipios as $municipio)
                <option value="{{ $municipio->id }}"{{ $dados['municipio_id'] == $municipio->id ? " selected" : "" }}>{{ $municipio->nome }} - {{ $municipio->sigla_uf }}</option>
                @endforeach
            </select>
            <label for="municipio">Município</label>
        </div>
        <div class="input-field col s12 m4">
            <select id="valor" name="valor">
                <option value="">Todas</option>
                <option value="1">Até R$ 500,00</option>
                <option value="2">R$ 500,00 a R$ 1.000,00</option>
                <option value="3">R$ 1.000,00 a R$ 5.000,00</option>
                <option value="4">R$ 5.000,00 a R$ 10.000,00</option>
                <option value="5">R$ 10.000,00 a R$ 50.000,00</option>
                <option value="6">R$ 50.000,00 a R$ 100.000,00</option>
                <option value="7">R$ 100.000,00 a R$ 500.000,00</option>
                <option value="8">Maior que R$ 500.000,00</option>
            </select>
            <label for="valor">Faixa de Valor</label>
        </div>
        <div class="input-field col s9 m6">
            <input type="text" id="endereco" name="endereco" class="validate" value="{{ $dados['endereco'] }}">
            <label for="endereco">Endereço</label>
        </div>
        <div class="input-field col s3 m2">
            <button class="btn deep-orange darken-1 right">Filtrar</button>
        </div>
    </form>
</div>