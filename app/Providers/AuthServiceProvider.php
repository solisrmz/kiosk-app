<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
     */
    public function boot(): void
    {
        Gate::define('admin', function () { return Auth::user()->role == 'admin'; });
        Gate::define('asesor', function () { return Auth::user()->role == 'asesor'; });
        Gate::define('director', function () { return Auth::user()->role == 'director'; });
        Gate::define('docente', function () { return Auth::user()->role == 'docente'; });
        Gate::define('consulta', function () { return Auth::user()->role == 'consulta'; });
    }
}
