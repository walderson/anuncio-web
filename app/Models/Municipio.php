<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    public function anuncios() {
        return $this->hasMany('App\Models\Anuncio', 'municipio_id');
    }
}
