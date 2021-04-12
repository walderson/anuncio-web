@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Entrar</h2>
        <form action="{{ route('admin.login') }}" method="post">
            @csrf
            @include('admin.login._form')
            <button class="btn blue">Entrar</button>
        </form>
    </div>
@endsection