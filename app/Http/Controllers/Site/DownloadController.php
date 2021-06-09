<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anuncio;
use App\Models\Imagem;
use App\Models\Pagina;
use App\Models\Slide;

class DownloadController extends Controller
{
    public function imagemPagina($id) {
        $pagina = Pagina::findOrFail($id, ['mime', 'conteudo']);
        header("Content-Type: $pagina->mime");
        echo base64_decode($pagina->conteudo);
    }

    public function imagemAnuncio(Request $request) {
        $anuncio = Anuncio::select(['mime', 'conteudo'])
                        ->where('imagem', '=', $request->path())
                        ->first();
        if ($anuncio === null) {
            $anuncio = Imagem::select(['mime', 'conteudo'])
                            ->where('imagem', '=', $request->path())
                            ->firstOrFail();
        }
        header("Content-Type: $anuncio->mime");
        echo base64_decode($anuncio->conteudo);
    }

    public function imagemSlide(Request $request) {
        $slide = Slide::select(['mime', 'conteudo'])
                        ->where('imagem', '=', $request->path())
                        ->firstOrFail();
        header("Content-Type: $slide->mime");
        echo base64_decode($slide->conteudo);
    }
}
