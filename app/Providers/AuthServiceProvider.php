<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
use App\Policies\BlogPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Blog::class => BlogPolicy::class,
    ];
    public function register(): void
    {
        //


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Gate::policy(Blog::class, BlogPolicy::class);
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });
        Gate::define('host', function (User $user): bool {
            return (bool) $user->is_host;
        });





    }
}
