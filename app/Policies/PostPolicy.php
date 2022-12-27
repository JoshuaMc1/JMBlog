<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Post $post)
    {
        return ($user->id == $post->user_id) ? true : false;
    }

    public function published(?User $user, Post $post)
    {
        return ($post->status == 2) ? true : false;
    }
}
