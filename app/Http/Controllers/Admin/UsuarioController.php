<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Papel;
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
        /*if (Auth::user()->can('listar-usuarios', false)) {
            dd('Sucesso!');
        } else {
            dd('Fracasso!');
        }*/

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

    public function alterar($id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.alterar', compact('usuario'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        if (isset($dados['password']) && strlen($dados['password']) > 5)
            $dados['password'] = Hash::make($dados['password']);
        else
            unset($dados['password']);

        $usuario = User::find($id);
        $usuario->update($dados);

        $request->session()->flash('mensagem',
            ['msg'=>'Usuário atualizado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }

    public function remover(Request $request, $id)
    {
        User::find($id)->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Usuário removido com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }

    public function papeis($id) {
        $usuario = User::find($id);
        $papeis = Papel::orderBy('nome')->get();
        return view('admin.usuarios.papeis', compact('usuario', 'papeis'));
    }

    public function salvarPapel(Request $request, $id) {
        $dados = $request->all();
        $usuario = User::find($id);
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionarPapel($papel);
        return redirect()->back();
    }

    public function removerPapel($id, $idPapel) {
        $usuario = User::find($id);
        $papel = Papel::find($idPapel);
        $usuario->removerPapel($papel);
        return redirect()->back();
    }
}
