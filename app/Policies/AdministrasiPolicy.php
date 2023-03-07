<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Administrasi;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdministrasiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the administrasi can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list administrasi');
    }

    /**
     * Determine whether the administrasi can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Administrasi  $model
     * @return mixed
     */
    public function view(User $user, Administrasi $model)
    {
        return $user->hasPermissionTo('view administrasi');
    }

    /**
     * Determine whether the administrasi can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create administrasi');
    }

    /**
     * Determine whether the administrasi can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Administrasi  $model
     * @return mixed
     */
    public function update(User $user, Administrasi $model)
    {
        return $user->hasPermissionTo('update administrasi');
    }

    /**
     * Determine whether the administrasi can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Administrasi  $model
     * @return mixed
     */
    public function delete(User $user, Administrasi $model)
    {
        return $user->hasPermissionTo('delete administrasi');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Administrasi  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete administrasi');
    }

    /**
     * Determine whether the administrasi can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Administrasi  $model
     * @return mixed
     */
    public function restore(User $user, Administrasi $model)
    {
        return false;
    }

    /**
     * Determine whether the administrasi can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Administrasi  $model
     * @return mixed
     */
    public function forceDelete(User $user, Administrasi $model)
    {
        return false;
    }
}
