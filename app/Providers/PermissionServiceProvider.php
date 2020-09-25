<?php

namespace App\Providers;

use Facades\App\Repositories\PermissionRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function($user, $ability) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });

        foreach (PermissionRepository::all() as $id => $name) {
            Gate::define($id, function($user, $ownId = '') use ($id) {
                if ($ownId) {
                    return $user->hasPermission('manage_own') && $user->id == $ownId;
                }
                return $user->hasPermission($id);
            });
        }

        Blade::directive('role', function ($role) {
            return "if (auth()->check() && auth()->user()->hasRole({$role})) :";
        });

        Blade::directive('endrole', function ($role) {
            return 'endif;';
        });
    }
}
