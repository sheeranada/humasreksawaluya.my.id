<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pelayanan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PelayananPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pelayanan can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list pelayanan');
    }

    /**
     * Determine whether the pelayanan can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Pelayanan  $model
     * @return mixed
     */
    public function view(User $user, Pelayanan $model)
    {
        return $user->hasPermissionTo('view pelayanan');
    }

    /**
     * Determine whether the pelayanan can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create pelayanan');
    }

    /**
     * Determine whether the pelayanan can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Pelayanan  $model
     * @return mixed
     */
    public function update(User $user, Pelayanan $model)
    {
        return $user->hasPermissionTo('update pelayanan');
    }

    /**
     * Determine whether the pelayanan can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Pelayanan  $model
     * @return mixed
     */
    public function delete(User $user, Pelayanan $model)
    {
        return $user->hasPermissionTo('delete pelayanan');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Pelayanan  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete pelayanan');
    }

    /**
     * Determine whether the pelayanan can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Pelayanan  $model
     * @return mixed
     */
    public function restore(User $user, Pelayanan $model)
    {
        return false;
    }

    /**
     * Determine whether the pelayanan can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Pelayanan  $model
     * @return mixed
     */
    public function forceDelete(User $user, Pelayanan $model)
    {
        return false;
    }
}
