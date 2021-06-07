<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    use HasFactory;

    protected $table = 'papeis';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    public function permissoes() {
        return $this->belongsToMany(Permissao::class);
    }

    public function adicionarPermissao($permissao) {
        if (is_string($permissao)) {
            return $this->permissoes()->attach(Permissao::where('nome', '=', $permissao)->firstOrFail());
        }

        return $this->permissoes()->attach(Permissao::where('nome', '=', $permissao->nome)->firstOrFail());
    }

    public function removerPermissao($permissao) {
        if (is_string($permissao)) {
            return $this->permissoes()->detach(Permissao::where('nome', '=', $permissao)->firstOrFail());
        }

        return $this->permissoes()->detach(Permissao::where('nome', '=', $permissao->nome)->firstOrFail());
    }
}
