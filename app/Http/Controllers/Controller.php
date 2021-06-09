<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function upload($arquivoUpload, $modelo) {
        $nomeArquivo = $arquivoUpload->getRealPath();
        $modelo->mime = mime_content_type($nomeArquivo);
        $modelo->conteudo = base64_encode(file_get_contents($nomeArquivo));
        File::delete($nomeArquivo);
    }
}
