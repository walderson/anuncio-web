@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Atualizar Dados de Papel</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.papeis') }}" class="breadcrumb">Listagem de Papéis</a>
                        <a class="breadcrumb">Atualizar Dados de Papel</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.papeis.atualizar', $papel->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.papeis._form')
                <button class="btn blue">Atualizar</button>
            </form>
        </div>
    </div>
@endsection