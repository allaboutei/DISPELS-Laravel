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
    public function update(User $user): bool
    {
        return ($user->is_admin || $user->id===Auth::user()->id);
    }

    /**
     * Determine whether the user can delete the model.
     */

}
