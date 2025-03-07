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






    }
}
