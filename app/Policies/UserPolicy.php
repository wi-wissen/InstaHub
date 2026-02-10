<?php

namespace App\Policies;

use App\Facades\RequestHub;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if (RequestHub::isHub()) {
            return true;
        }

        return $user->allowed('admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        if (RequestHub::isHub()) {
            return true;
        }

        return $user->allowed('admin') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if (RequestHub::isHub()) {
            return $user->allowed('dba');
        }

        return $user->allowed('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        if (RequestHub::isHub()) {
            return $user->allowed('dba') || $user->id === $model->id;
        }

        return $user->allowed('admin') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if (RequestHub::isHub()) {
            return $user->allowed('dba');
        }

        return $user->allowed('admin');
    }

    /**
     * Determine whether the user can activate/deactivate the model.
     */
    public function toggleActive(User $user, User $model): bool
    {
        if (RequestHub::isHub()) {
            return $user->allowed('dba');
        }

        return $user->allowed('admin');
    }

    /**
     * Determine whether the user can change password.
     */
    public function changePassword(User $user, User $model): bool
    {
        if (RequestHub::isHub()) {
            return $user->allowed('dba') || $user->id === $model->id;
        }

        return $user->allowed('admin') || $user->id === $model->id;
    }
}
