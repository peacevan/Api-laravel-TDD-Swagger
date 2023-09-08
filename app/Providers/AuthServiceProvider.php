<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('maneger-groups', function (User $user) {
            return $user->nivel == 2;
        });

        Gate::define('viewer-groups', function (User $user) {

            if (($user->nivel == 1)||($user->nivel == 2)) {
                return true;
            }
            return false;
        });

        Gate::define('add-remove-client', function (User $user) {
            if (($user->nivel == 1)) {
                return true;
            }
            return false;

        });
     }


}
