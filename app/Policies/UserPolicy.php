<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    public function manage(User $user,User $model): bool
    {
        return $user->hasRole('admin') || $user->is($model);
    }
}
