<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\ContatoSite;
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
        $pagina = Pagina::where('tipo', '=', 'Contato')->first();
        $email = $pagina->email;

        Mail::to($email, 'Central de Atendimento')->send(new ContatoSite($dados));

        $request->session()->flash('mensagem',
            ['msg'=>'E-mail de contato enviado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('site.contato');
    }
}
