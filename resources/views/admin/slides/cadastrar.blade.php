@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="center">Cadastrar Novos Slides</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                        <a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.slides') }}" class="breadcrumb">Slides do Site</a>
                        <a class="breadcrumb">Cadastrar Novos Slides</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.slides') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @include('admin.slides._form')
                <button class="btn blue">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection