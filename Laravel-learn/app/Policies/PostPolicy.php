<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function updatePost(User $user, Post $post): bool
    {
        return $user->role === 'Admin' || $user->id === $post->author_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deletePost(User $user, Post $post): bool
    {
        return $user->role === 'Admin' || $user->id === $post->author_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Post $post): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Post $post): bool
    // {
    //     //
    // }
}
