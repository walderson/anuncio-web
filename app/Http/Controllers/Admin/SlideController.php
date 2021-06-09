<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Slide;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->can('listar-slides')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $slides = Slide::select('id', 'ordem', 'titulo', 'descricao', 'status', 'imagem')
                        ->orderBy('ordem')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function cadastrar(Request $request)
    {
        if (!Auth::user()->can('cadastrar-slides')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        return view('admin.slides.cadastrar');
    }

    public function salvar(Request $request)
    {
        if (!Auth::user()->can('cadastrar-slides')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $dados = $request->all();

        if (Slide::count()) {
            $slide = Slide::select('ordem')->orderBy('ordem', 'desc')->first();
            $ordem = isset($slide->ordem) ? $slide->ordem : 0;
        } else {
            $ordem = 0;
        }

        if ($request->hasFile('imagem')) {
            $arquivos = $request->file('imagem');
            foreach ($arquivos as $arquivo) {
                $slide = new Slide();
                $slide->ordem = ++$ordem;

                $rand = rand(10000, 99999);
                $dir = 'img/slides/';
                $ext = $arquivo->guessClientExtension();
                $nomeArquivo = '_img_' . $rand . '.' . $ext;
                //$arquivo->move($dir, $nomeArquivo);
                $this->upload($arquivo, $slide);
                $slide->imagem = $dir . $nomeArquivo;
    
                $slide->save();
            }
        }

        $request->session()->flash('mensagem',
            ['msg'=>'Slides cadastrados com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.slides');
    }

    public function alterar(Request $request, $id)
    {
        if (!Auth::user()->can('atualizar-slides')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $slide = Slide::find($id, ['id', 'titulo', 'descricao', 'imagem', 'link', 'ordem', 'status']);
        return view('admin.slides.alterar', compact('slide'));
    }

    public function atualizar(Request $request, $id)
    {
        if (!Auth::user()->can('atualizar-slides')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $dados = $request->all();

        $slide = Slide::find($id);
        if (isset($dados['titulo']) && trim($dados['titulo']) != '') {
            $slide->titulo = trim($dados['titulo']);
        } else {
            $slide->titulo = null;
        }
        if (isset($dados['descricao']) && trim($dados['descricao']) != '') {
            $slide->descricao = trim($dados['descricao']);
        } else {
            $slide->descricao = null;
        }
        if (isset($dados['link']) && trim($dados['link']) != '') {
            $slide->link = trim($dados['link']);
        } else {
            $slide->link = null;
        }
        if (isset($dados['ordem']) && trim($dados['ordem']) != '') {
            $slide->ordem = trim($dados['ordem']);
        } else {
            $slide->ordem = null;
        }
        $slide->status = $dados['status'];

        $arquivo = $request->file('imagem');
        if ($arquivo) {
            $rand = rand(10000, 99999);
            $dir = 'img/slides/';
            $ext = $arquivo->guessClientExtension();
            $nomeArquivo = '_img_' . $rand . '.' . $ext;
            //$arquivo->move($dir, $nomeArquivo);
            $this->upload($arquivo, $slide);
            $slide->imagem = $dir . $nomeArquivo;
        }
        $slide->update();

        $request->session()->flash('mensagem',
            ['msg'=>'Slide atualizado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.slides');
    }

    public function remover(Request $request, $id)
    {
        if (!Auth::user()->can('remover-slides')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        Slide::find($id, 'id')->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Slide removido com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.slides');
    }
}
