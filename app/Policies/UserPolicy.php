<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */


    /**
     * Determine whether the user can update the model.
     */



public function update(User $user, User $model): bool
{
    return $user->is_admin || $user->is($model);
}





    /**
     * Determine whether the user can delete the model.
     */

}
