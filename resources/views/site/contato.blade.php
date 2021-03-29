@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h3 class="center">Contato</h3>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m7">
            <img src="{{ asset('img/mapa.jpg') }}" alt="" class="responsive-img">
        </div>
        <div class="col s12 m5">
            <form action="" class="col s12">
                <div class="input-field">
                    <input type="text" id="nome" class="validate">
                    <label for="name">Nome</label>
                </div>
                <div class="input-field">
                    <input type="email" id="email" class="validate">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field">
                    <textarea id="mensagem" class="materialize-textarea"></textarea>
                    <label for="mensagem">Mensagem</label>
                </div>
                <button class="btn blue">Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection
