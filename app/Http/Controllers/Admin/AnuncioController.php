<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anuncio;

class AnuncioController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::all();
        return view('admin.anuncios.index', compact('anuncios'));
    }
}
