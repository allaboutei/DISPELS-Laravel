<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{


    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     return ($user->is_admin || $user->is_host);
    // }

    /**
     * Determine whether the user can update the model.
     */
    // public function update(User $user, Blog $blog): bool
    // {
    //     return ($user->is_admin || $user->is_host);
    // }

    /**
     * Determine whether the user can delete the model.
     */
    // public function delete(User $user, Blog $blog): bool
    // {
    //     return ($user->is_admin || $user->is_host);
    // }


}
