<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anuncio;

class HomeController extends Controller
{
    public function index() {
        $anuncios = Anuncio::where('status', '=', 'Publicado')
                            ->orderBy('id', 'desc')
                            ->paginate(20);
        return view('site.home', compact('anuncios'));
    }
}
