<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     * Role 1 access rights
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->registerPolicies();
        Gate::define('update', function ($user) {
            return $user->role == 1;
        });

        Gate::define('delete', function ($user) {
            return $user->role == 1;
        });
    }
}
