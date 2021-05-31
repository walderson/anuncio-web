<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Papel;

class PapelController extends Controller
{
    public function index() {
        $papeis = Papel::orderBy('nome')->get();
        return view('admin.papeis.index', compact('papeis'));
    }

    public function cadastrar() {
        return view('admin.papeis.cadastrar');
    }
}
