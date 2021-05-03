<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pagina;

class PaginaController extends Controller
{
    public function index() {
        $paginas = Pagina::all();
        return view('admin.paginas.index', compact('paginas'));
    }

    public function alterar($id) {
        $pagina = Pagina::find($id);
        return view('admin.paginas.alterar', compact('pagina'));
    }

    public function atualizar(Request $request, $id) {
        $dados = $request->all();

        $pagina = Pagina::find($id);
        $pagina->titulo = trim($dados['titulo']);
        $pagina->descricao = trim($dados['descricao']);
        $pagina->texto = trim($dados['texto']);
        if (isset($dados['email'])) {
            $pagina->email = trim($dados['email']);
        }
        if (isset($dados['mapa']) && trim($dados['mapa']) != '') {
            $pagina->mapa = trim($dados['mapa']);
        } else {
            $pagina->mapa = null;
        }

        $arquivo = $request->file('imagem');
        if ($arquivo) {
            $rand = rand(10000, 99999);
            $dir = 'img/paginas/' . $id . '/';
            $ext = $arquivo->guessClientExtension();
            $nomeArquivo = '_img_' . $rand . '.' . $ext;
            $arquivo->move($dir, $nomeArquivo);
            $pagina->imagem = $dir . $nomeArquivo;
        }

        $pagina->update();

        $request->session()->flash('mensagem',
            ['msg'=>'Página atualizada com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.paginas');
    }
}
