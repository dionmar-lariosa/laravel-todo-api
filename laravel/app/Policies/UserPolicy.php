<?php

namespace App\Policies;

use App\Models\Api\Todo;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HttpResponses;

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): Response
    {
        $isSameUser = $user->id === $model->id;
        $hasNoTodo = Todo::where('user_id', $model->id)->count() === 0;

        return $isSameUser && $hasNoTodo
            ? Response::allow()
            : Response::deny('Unauthenticated or Delete all your todos before deleting your account.');
    }
}
