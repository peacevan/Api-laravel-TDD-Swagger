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

        Gate::define('can-maneger-groups', function (User $user) {
            return 2==$user->nivel;
        });

        Gate::define('can-viewer-groups', function (User $user) {

            if (($user->nivel === 1)||($user->nivel === 2)) {
                return true;
            }
            return false;
        });

        Gate::define('can-add-remove-client', function (User $user) {
            return 1==$user->nivel;
        });
     }


}
