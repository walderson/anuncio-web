@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Cadastrar Novo Papel</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.papeis') }}" class="breadcrumb">Listagem de Papéis</a>
                        <a class="breadcrumb">Cadastrar Novo Papel</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.papeis') }}" method="post">
                @csrf
                @include('admin.papeis._form')
                <button class="btn blue">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection