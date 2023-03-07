<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PxRajal;
use Illuminate\Auth\Access\HandlesAuthorization;

class PxRajalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pxRajal can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list pxrajal');
    }

    /**
     * Determine whether the pxRajal can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PxRajal  $model
     * @return mixed
     */
    public function view(User $user, PxRajal $model)
    {
        return $user->hasPermissionTo('view pxrajal');
    }

    /**
     * Determine whether the pxRajal can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create pxrajal');
    }

    /**
     * Determine whether the pxRajal can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PxRajal  $model
     * @return mixed
     */
    public function update(User $user, PxRajal $model)
    {
        return $user->hasPermissionTo('update pxrajal');
    }

    /**
     * Determine whether the pxRajal can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PxRajal  $model
     * @return mixed
     */
    public function delete(User $user, PxRajal $model)
    {
        return $user->hasPermissionTo('delete pxrajal');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PxRajal  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete pxrajal');
    }

    /**
     * Determine whether the pxRajal can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PxRajal  $model
     * @return mixed
     */
    public function restore(User $user, PxRajal $model)
    {
        return false;
    }

    /**
     * Determine whether the pxRajal can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PxRajal  $model
     * @return mixed
     */
    public function forceDelete(User $user, PxRajal $model)
    {
        return false;
    }
}
