<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize('update', $user);

        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update($request->validated());

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        return response(null, 204);
    }
}
