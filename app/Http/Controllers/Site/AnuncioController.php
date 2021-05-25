<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anuncio;

class AnuncioController extends Controller
{
    public function index($id) {
        $anuncio = Anuncio::find($id);
        $imagens = $anuncio->imagens()->orderBy('ordem')->get();
        $alinhamentos = ['center-align', 'left-align','right-align'];
        return view('site.anuncio', compact('anuncio', 'imagens', 'alinhamentos'));
    }
}
