<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
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
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });


        Gate::define('blog.delete', function (User $user,Blog $blog): bool {
            return (bool) $user->is_admin  || ($user->is_host && $user->id===$blog->user->id);
        });

        Gate::define('blog.edit', function (User $user,Blog $blog): bool {
            return (bool) $user->is_admin  || ($user->is_host && $user->id===$blog->user->id);
        });

    }
}
