<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anuncio;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index() {
        $slides = Slide::where('status', '=', 'Publicado')
                        ->orderBy('ordem')->get();
        $anuncios = Anuncio::where('status', '=', 'Publicado')
                            ->orderBy('id', 'desc')
                            ->paginate(20);
        $alinhamentos = ['center-align', 'left-align','right-align'];
        return view('site.home', compact('slides', 'anuncios', 'alinhamentos'));
    }
}
