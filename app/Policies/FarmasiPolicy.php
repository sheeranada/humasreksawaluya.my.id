<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Farmasi;
use Illuminate\Auth\Access\HandlesAuthorization;

class FarmasiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the farmasi can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list farmasi');
    }

    /**
     * Determine whether the farmasi can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Farmasi  $model
     * @return mixed
     */
    public function view(User $user, Farmasi $model)
    {
        return $user->hasPermissionTo('view farmasi');
    }

    /**
     * Determine whether the farmasi can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create farmasi');
    }

    /**
     * Determine whether the farmasi can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Farmasi  $model
     * @return mixed
     */
    public function update(User $user, Farmasi $model)
    {
        return $user->hasPermissionTo('update farmasi');
    }

    /**
     * Determine whether the farmasi can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Farmasi  $model
     * @return mixed
     */
    public function delete(User $user, Farmasi $model)
    {
        return $user->hasPermissionTo('delete farmasi');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Farmasi  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete farmasi');
    }

    /**
     * Determine whether the farmasi can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Farmasi  $model
     * @return mixed
     */
    public function restore(User $user, Farmasi $model)
    {
        return false;
    }

    /**
     * Determine whether the farmasi can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Farmasi  $model
     * @return mixed
     */
    public function forceDelete(User $user, Farmasi $model)
    {
        return false;
    }
}
