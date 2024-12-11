<?php

namespace App\Policies;

use App\Models\Hub;
use App\Models\User;
use App\Facades\RequestHub;

class HubPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'teacher';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hub $hub): bool
    {
        return $user->allowed('admin') || $hub->teacher_id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): bool
    {
        // Jeder darf einen Hub erstellen (wegen welcome, create, store exception im HubController)
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hub $hub): bool
    {
        return $user->allowed('admin') || $hub->teacher_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hub $hub): bool
    {
        return $user->allowed('admin') || $hub->teacher_id == $user->id;
    }
}