<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function papeis() {
        return $this->belongsToMany(Papel::class);
    }

    public function adicionarPapel($papel) {
        if (is_string($papel)) {
            return $this->papeis()->attach(Papel::where('nome', '=', $papel)->firstOrFail());
        }

        return $this->papeis()->attach(Papel::where('nome', '=', $papel->nome)->firstOrFail());
    }

    public function removerPapel($papel) {
        if (is_string($papel)) {
            return $this->papeis()->detach(Papel::where('nome', '=', $papel)->firstOrFail());
        }

        return $this->papeis()->detach(Papel::where('nome', '=', $papel->nome)->firstOrFail());
    }

    public function possuiPapel($papel) {
        if (is_string($papel)) {
            return $this->papeis->contains('nome', $papel);
        }
        return $papel->intersect($this->papeis)->count();
    }

    public function possuiAdmin() {
        return $this->possuiPapel('Admin');
    }
}
