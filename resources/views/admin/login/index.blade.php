@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Entrar</h2>
        <form action="{{ route('admin.login') }}" method="post">
            @csrf
            @include('admin.login._form')
            <div class="row">
                <div class="col s12 m12">
                    <button class="btn blue">Entrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection