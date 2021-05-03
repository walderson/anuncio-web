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
        
    }
}
