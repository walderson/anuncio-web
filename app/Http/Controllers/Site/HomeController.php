<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Municipio;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index() {
        $slides = Slide::select('titulo', 'descricao', 'imagem', 'link')
                        ->where('status', '=', 'Publicado')
                        ->orderBy('ordem')->get();
        $categorias = Categoria::orderBy('titulo')->get();
        $municipios = Municipio::orderBy('nome')->get();
        $anuncios = Anuncio::where('status', '=', 'Publicado')
                            ->orderBy('id', 'desc')
                            ->paginate(20);
        $alinhamentos = ['center-align', 'left-align','right-align'];
        return view('site.home', compact('slides', 'categorias', 'municipios', 'anuncios', 'alinhamentos'));
    }

    public function busca(Request $request) {
        $dados = $request->all();

        $categorias = Categoria::orderBy('titulo')->get();
        $municipios = Municipio::orderBy('nome')->get();
        $query = Anuncio::where('status', '=', 'Publicado');
        if (isset($dados['finalidade']) && $dados['finalidade'] != '')
            $query = $query->where('finalidade', '=', $dados['finalidade']);
        if (isset($dados['categoria_id']) && $dados['categoria_id'] != '')
            $query = $query->where('categoria_id', '=', $dados['categoria_id']);
        if (isset($dados['municipio_id']) && $dados['municipio_id'] != '')
            $query = $query->where('municipio_id', '=', $dados['municipio_id']);
        if (isset($dados['valor']) && $dados['valor'] != '') {
            switch ($dados['valor']) {
                case 1:
                    $query = $query->where('valor', '<=', 500.0);
                    break;
                case 2:
                    $query = $query->where([['valor', '>', 500.0], ['valor', '<=', 1000.0]]);
                    break;
                case 3:
                    $query = $query->where([['valor', '>', 1000.0], ['valor', '<=', 5000.0]]);
                    break;
                case 4:
                    $query = $query->where([['valor', '>', 5000.0], ['valor', '<=', 10000.0]]);
                    break;
                case 5:
                    $query = $query->where([['valor', '>', 10000.0], ['valor', '<=', 50000.0]]);
                    break;
                case 6:
                    $query = $query->where([['valor', '>', 50000.0], ['valor', '<=', 100000.0]]);
                    break;
                case 7:
                    $query = $query->where([['valor', '>', 100000.0], ['valor', '<=', 500000.0]]);
                    break;
                default:
                    $query = $query->where('valor', '>', 500000.0);
            }
        }
        if (isset($dados['endereco']) && $dados['endereco'] != '')
            $query = $query->where('endereco', 'LIKE', '%' . $dados['endereco'] . '%');
        $anuncios = $query->orderBy('id', 'desc')
                          ->paginate(20);

        return view('site.busca', compact('dados', 'categorias', 'municipios', 'anuncios'));
    }
}
