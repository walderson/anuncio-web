<div class="row">
    <form action="">
        <div class="input-field col s6 m3">
            <select id="finalidade">
                <option value="aluguel">Aluguel</option>
                <option value="troca">Troca</option>
                <option value="venda">Venda</option>
            </select>
            <label for="finalidade">Finalidade</label>
        </div>
        <div class="input-field col s6 m3">
            <select id="categoria">
                <option value="1">Automóvel</option>
                <option value="2">Casa</option>
                <option value="3">Eletrônico</option>
                <option value="4">Telefonia</option>
            </select>
            <label for="categoria">Categoria</label>
        </div>
        <div class="input-field col s12 m6">
            <select id="cidade">
                <option value="1">Chapada dos Guimarães</option>
                <option value="2">Cuiabá</option>
                <option value="3">Santo Antônio do Leverger</option>
                <option value="4">Várzea Grane</option>
            </select>
            <label for="cidade">Cidade</label>
        </div>
        <div class="input-field col s12 m4">
            <select id="valor">
                <option value="1">Até R$ 500,00<option>
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
            <input type="text" id="endereco" class="validate">
            <label for="endereco">Endereço</label>
        </div>
        <div class="input-field col s3 m2">
            <buttun class="btn deep-orange darken-1 right">Filtrar</buttun>
        </div>
    </form>
</div>