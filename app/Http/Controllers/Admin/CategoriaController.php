<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anuncio;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all()->sortBy('titulo');
        return view('admin.categorias.index', compact('categorias'));
    }

    public function cadastrar()
    {
        return view('admin.categorias.cadastrar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $categoria = new Categoria();
        $categoria->titulo = $dados['titulo'];
        $categoria->save();

        $request->session()->flash('mensagem',
            ['msg'=>'Categoria cadastrada com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.categorias');
    }

    public function alterar($id)
    {
        $categoria = Categoria::find($id);
        return view('admin.categorias.alterar', compact('categoria'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();

        $categoria = Categoria::find($id);
        $categoria->titulo = $dados['titulo'];
        $categoria->update();

        $request->session()->flash('mensagem',
            ['msg'=>'Categoria atualizada com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.categorias');
    }

    public function remover(Request $request, $id)
    {
        if (Anuncio::where('categoria_id', '=', $id)->count() > 0) {
            $msg = "Não é possível remover uma categoria que possua anúncios vinculados:";
            $anuncios = Anuncio::where('categoria_id', '=', $id)->get();
            foreach ($anuncios as $anuncio) {
                $msg .= " id:" . $anuncio->id;
            }
            $request->session()->flash('mensagem',
                ['msg'=>$msg, 'class'=>'red white-text']);
            return redirect()->route('admin.categorias');
        }

        Categoria::find($id)->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Categoria removida com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.categorias');
    }
}
