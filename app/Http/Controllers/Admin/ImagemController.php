<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Anuncio;
use App\Models\Imagem;

class ImagemController extends Controller
{
    public function index($id)
    {
        $anuncio = Anuncio::find($id);
        $imagens = $anuncio->imagens()->orderBy('ordem')->get();
        return view('admin.imagens.index', compact('anuncio', 'imagens'));
    }

    public function cadastrar($id)
    {
        $anuncio = Anuncio::find($id);
        return view('admin.imagens.cadastrar', compact('anuncio'));
    }

    public function salvar(Request $request, $id)
    {
        $dados = $request->all();

        $anuncio = Anuncio::find($id);
        if ($anuncio->imagens()->count()) {
            $imagem = $anuncio->imagens()->orderBy('ordem', 'desc')->first();
            $ordem = isset($imagem->ordem) ? $imagem->ordem : 0;
        } else {
            $ordem = 0;
        }

        if ($request->hasFile('imagem')) {
            $arquivos = $request->file('imagem');
            foreach ($arquivos as $arquivo) {
                $imagem = new Imagem();
                $imagem->anuncio_id = $anuncio->id;
                $imagem->ordem = ++$ordem;

                $rand = rand(10000, 99999);
                $dir = 'img/anuncios/' . Str::slug($anuncio->titulo, '_') . '/';
                $ext = $arquivo->guessClientExtension();
                $nomeArquivo = '_img_' . $rand . '.' . $ext;
                $arquivo->move($dir, $nomeArquivo);
                $imagem->imagem = $dir . $nomeArquivo;
    
                $imagem->save();
            }
        }

        $request->session()->flash('mensagem',
            ['msg'=>'Imagens cadastradas com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.imagens', $anuncio->id);
    }

    public function alterar($id)
    {
        $imagem = Imagem::find($id);
        $anuncio = $imagem->anuncio;
        return view('admin.imagens.alterar', compact('imagem', 'anuncio'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();

        $imagem = Imagem::find($id);
        $anuncio = $imagem->anuncio;
        if (isset($dados['titulo']) && trim($dados['titulo']) != '') {
            $imagem->titulo = trim($dados['titulo']);
        } else {
            $imagem->titulo = null;
        }
        if (isset($dados['descricao']) && trim($dados['descricao']) != '') {
            $imagem->descricao = trim($dados['descricao']);
        } else {
            $imagem->descricao = null;
        }
        if (isset($dados['ordem']) && trim($dados['ordem']) != '') {
            $imagem->ordem = trim($dados['ordem']);
        } else {
            $imagem->ordem = null;
        }

        $arquivo = $request->file('imagem');
        if ($arquivo) {
            $rand = rand(10000, 99999);
            $dir = 'img/anuncios/' . Str::slug($anuncio->titulo, '_') . '/';
            $ext = $arquivo->guessClientExtension();
            $nomeArquivo = '_img_' . $rand . '.' . $ext;
            $arquivo->move($dir, $nomeArquivo);
            $imagem->imagem = $dir . $nomeArquivo;
        }
        $imagem->update();

        $request->session()->flash('mensagem',
            ['msg'=>'Imagem atualizada com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.imagens', $anuncio->id);
    }

    public function remover(Request $request, $id)
    {
        $imagem = Imagem::find($id);
        $anuncio = $imagem->anuncio;
        $imagem->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Imagem removida com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.imagens', $anuncio->id);
    }
}
