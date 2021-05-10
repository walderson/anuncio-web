<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pagina;

class PaginaController extends Controller
{
    public function sobre() {
        $pagina = Pagina::where('tipo', '=', 'Sobre')->first();
        return view('site.sobre', compact('pagina'));
    }

    public function contato() {
        $pagina = Pagina::where('tipo', '=', 'Contato')->first();
        return view('site.contato', compact('pagina'));
    }

    public function enviarContato(Request $request) {
        $dados = $request->all();
        dd($dados);
    }
}
