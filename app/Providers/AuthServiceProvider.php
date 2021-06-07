<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Permissao;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach ($this->getPermissoes() as $permissao) {
            Gate::define($permissao->nome, function (User $user) use ($permissao) {
                return $user->possuiPapel($permissao->papeis)
                        || $user->possuiAdmin();
            });
        }
    }

    private function getPermissoes() {
        return Permissao::with('papeis')->get();
    }
}
