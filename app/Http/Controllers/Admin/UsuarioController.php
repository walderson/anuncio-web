<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login(Request $req) {
        $dados = $req->all();
        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['password']])) {
            $req->session()->flash('mensagem',
                ['msg'=>'Login efetuado com sucesso!', 'class'=>'green white-text']);
            return redirect()->route('admin.home');
        }

        $req->session()->flash('mensagem',
            ['msg'=>'Erro: dados de login incorretos!', 'class'=>'red white-text']);
        return redirect()->route('admin.login');
    }
}
