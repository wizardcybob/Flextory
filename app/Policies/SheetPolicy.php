<?php

namespace App\Policies;

use App\Models\Sheet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SheetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Sheet $sheet)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Sheet $sheet)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Sheet $sheet)
    {
        return $user->role == '1' || $user->role == '2' || $user->role == '3';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function archive(User $user, Sheet $sheet)
    {
        return $user->role == '1' || $user->role == '2';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Sheet $sheet)
    {
        return $user->role == '1' || $user->role == '2';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Sheet $sheet)
    {
        return $user->role == '1' || $user->role == '2';
    }
}
