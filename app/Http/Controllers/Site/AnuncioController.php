<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Anuncio;

class AnuncioController extends Controller
{
    public function index($id) {
        $anuncio = Anuncio::find($id);
        $imagens = $anuncio->imagens()->orderBy('ordem')->get();
        $alinhamentos = ['center-align', 'left-align','right-align'];
        $seo = [
            'titulo'=>$anuncio->titulo,
            'descricao'=>$anuncio->descricao,
            'imagem'=>asset($anuncio->imagem),
            'url'=>route('site.anuncio', [$anuncio->id, Str::slug($anuncio->titulo, '_')]),
        ];
        return view('site.anuncio', compact('anuncio', 'imagens', 'alinhamentos', 'seo'));
    }
}
