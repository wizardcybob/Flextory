<?php

namespace App\Policies;

use App\Models\Projet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjetPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Projet $projet)
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
        return $user->role == 'editor' || $user->role == 'superadmin' || $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->role == 'editor' || $user->role == 'superadmin' || $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Projet $projet)
    {
        return $user->role == 'editor' || $user->role == 'superadmin' || $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Projet $projet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Projet $projet)
    {
        //
    }
}
