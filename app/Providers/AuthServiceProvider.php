<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Player;
use App\Models\User;
use App\Policies\BlogPolicy;
use App\Policies\PlayerPolicy;
use App\Policies\UserPolicy;
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

        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Player::class, PlayerPolicy::class);

        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });
        Gate::define('host', function (User $user): bool {
            return (bool) $user->is_host;
        });





    }
}
