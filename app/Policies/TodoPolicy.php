<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Todo $todo)
    {
        if ($user->role == 'admin' || $user->role == 'editor') {
            return Response::allow();
        } else {
            return Response::deny('You are not allowed to create a todo');
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        if ($user->role == 'admin') {
            return Response::allow();
        } else {
            return Response::deny('You are not allowed to create a todo');
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Todo $todo): Response
    {
        if ($user->role == 'admin') {
            return Response::allow();
        } else {
            return Response::deny('You are not allowed to create a todo');
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Todo $todo): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Todo $todo): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Todo $todo): bool
    {
        //
    }
}
