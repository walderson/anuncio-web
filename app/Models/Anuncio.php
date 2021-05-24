<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    public function categoria() {
        return $this->belongsTo('App\Models\Categoria', 'categoria_id');
    }

    public function municipio() {
        return $this->belongsTo('App\Models\Municipio', 'municipio_id');
    }

    public function imagens() {
        return $this->hasMany('App\Models\Imagem', 'anuncio_id');
    }
}
