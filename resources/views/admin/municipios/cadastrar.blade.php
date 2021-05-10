@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Cadastrar Novo Município</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.municipios') }}" class="breadcrumb">Listagem de Município</a>
                        <a class="breadcrumb">Cadastrar Novo Município</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.municipios') }}" method="post">
                @csrf
                @include('admin.municipios._form')
                <button class="btn blue">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection