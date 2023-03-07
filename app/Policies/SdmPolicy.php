<?php

namespace App\Policies;

use App\Models\Sdm;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SdmPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the sdm can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list sdm');
    }

    /**
     * Determine whether the sdm can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sdm  $model
     * @return mixed
     */
    public function view(User $user, Sdm $model)
    {
        return $user->hasPermissionTo('view sdm');
    }

    /**
     * Determine whether the sdm can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create sdm');
    }

    /**
     * Determine whether the sdm can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sdm  $model
     * @return mixed
     */
    public function update(User $user, Sdm $model)
    {
        return $user->hasPermissionTo('update sdm');
    }

    /**
     * Determine whether the sdm can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sdm  $model
     * @return mixed
     */
    public function delete(User $user, Sdm $model)
    {
        return $user->hasPermissionTo('delete sdm');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sdm  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete sdm');
    }

    /**
     * Determine whether the sdm can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sdm  $model
     * @return mixed
     */
    public function restore(User $user, Sdm $model)
    {
        return false;
    }

    /**
     * Determine whether the sdm can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sdm  $model
     * @return mixed
     */
    public function forceDelete(User $user, Sdm $model)
    {
        return false;
    }
}
