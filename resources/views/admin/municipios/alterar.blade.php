@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Atualizar Dados de Município</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.municipios') }}" class="breadcrumb">Listagem de Municípios</a>
                        <a class="breadcrumb">Atualizar Dados de Município</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.municipios.atualizar', $municipio->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.municipios._form')
                <button class="btn blue">Atualizar</button>
            </form>
        </div>
    </div>
@endsection