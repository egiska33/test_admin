<?php

namespace App\Policies;

use App\User;
use App\Companie;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompaniePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the companie.
     *
     * @param  \App\User  $user
     * @param  \App\Companie  $companie
     * @return mixed
     */
    public function view(User $user, Companie $companie)
    {
        //
    }

    /**
     * Determine whether the user can create companies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the companie.
     *
     * @param  \App\User  $user
     * @param  \App\Companie  $companie
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the companie.
     *
     * @param  \App\User  $user
     * @param  \App\Companie  $companie
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role == 'admin';
    }
}
