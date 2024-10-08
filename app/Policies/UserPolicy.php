<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;


class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
        return $user->hasRole(['Admin', 'Moderator']);
        // if ($user->hasRole(['Admin', 'Moderator']) || $user->hasPermissionTo('Create')) {
        //     return true;
        // }
        // return false;
        // if ($user->hasPermissionTo('View')) {
        //     return true;
        // }
        // return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model)
    {
        //
        if ($user->hasPermissionTo('View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
        return $user->hasRole(['Admin', 'Moderator']);
        // if ($user->hasRole(['Admin', 'Moderator']) || $user->hasPermissionTo('Create')) {
        //     return true;
        // }
        // return false;
        // if ($user->hasPermissionTo('Create')) {
        //     return true;
        // }
        // return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        //
        // return $user->hasRole('Admin');
        return $user->hasRole(['Admin', 'Moderator']);
        // if ($user->hasRole(['Admin', 'Moderator']) || $user->hasPermissionTo('Update')) {
        //     return true;
        // }
        // return false;
        // if ($user->hasPermissionTo('Update')) {
        //     return true;
        // }
        // return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        //
        return $user->hasRole('Admin');
        // if ($user->hasRole(['Admin', 'Moderator']) || $user->hasPermissionTo('Delete')) {
        //     return true;
        // }
        // return false;
        // if ($user->hasPermissionTo('Delete')) {
        //     return true;
        // }
        // return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
