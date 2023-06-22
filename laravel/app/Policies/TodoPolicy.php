<?php

namespace App\Policies;

use App\Models\Api\Todo;
use App\Models\User;

class TodoPolicy
{
    /**
     * Determine whether the user can perform the action
     */
    public function isValidUser(User $user, Todo $todo): bool
    {
        return $user->id === $todo->user_id;
    }
}
