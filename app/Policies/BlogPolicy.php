<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{
    /**
     * Determine whether the user can view any models.
     */


    /**
     * Determine whether the user can create models.
     */
    public function manage(User $user,Blog $blog): bool
    {
        return $user->hasRole('admin') || ($user->hasRole('organizer') && $user->id=== $blog->user_id);
    }


    // public function update(User $user, Blog $blog): bool
    // {
    //     return $user->hasRole('admin') || ($user->hasRole('organizer') && $user->id=== $blog->user_id);
    // }

    // public function delete(User $user, Blog $blog): bool
    // {
    //     return false;
    // }



}
