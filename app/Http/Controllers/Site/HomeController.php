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
        $slides = Slide::where('status', '=', 'Publicado')
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
        $anuncios = Anuncio::where('status', '=', 'Publicado')
                            ->orderBy('id', 'desc')
                            ->paginate(20);

        return view('site.busca', compact('dados', 'categorias', 'municipios', 'anuncios'));
    }
}
