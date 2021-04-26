<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsuarioController extends Controller
{
    public function login(Request $request) {
        $dados = $request->all();
        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['password']])) {
            $request->session()->flash('mensagem',
                ['msg'=>'Login efetuado com sucesso!', 'class'=>'green white-text']);
            return redirect()->route('admin.home');
        }

        $request->session()->flash('mensagem',
            ['msg'=>'Erro: dados de login incorretos!', 'class'=>'red white-text']);
        return redirect()->route('admin.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        $request->session()->flash('mensagem',
            ['msg'=>'Sessão encerrada com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.login');
    }

    public function index()
    {
        $usuarios = User::all()->sortBy('name');
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function cadastrar()
    {
        return view('admin.usuarios.cadastrar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $usuario = new User();
        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = Hash::make($dados['password']);
        $usuario->save();

        $request->session()->flash('mensagem',
            ['msg'=>'Usuário cadastrado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }
}
