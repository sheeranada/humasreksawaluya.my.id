<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sarpras;
use Illuminate\Auth\Access\HandlesAuthorization;

class SarprasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the sarpras can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list sarpras');
    }

    /**
     * Determine whether the sarpras can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sarpras  $model
     * @return mixed
     */
    public function view(User $user, Sarpras $model)
    {
        return $user->hasPermissionTo('view sarpras');
    }

    /**
     * Determine whether the sarpras can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create sarpras');
    }

    /**
     * Determine whether the sarpras can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sarpras  $model
     * @return mixed
     */
    public function update(User $user, Sarpras $model)
    {
        return $user->hasPermissionTo('update sarpras');
    }

    /**
     * Determine whether the sarpras can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sarpras  $model
     * @return mixed
     */
    public function delete(User $user, Sarpras $model)
    {
        return $user->hasPermissionTo('delete sarpras');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sarpras  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete sarpras');
    }

    /**
     * Determine whether the sarpras can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sarpras  $model
     * @return mixed
     */
    public function restore(User $user, Sarpras $model)
    {
        return false;
    }

    /**
     * Determine whether the sarpras can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sarpras  $model
     * @return mixed
     */
    public function forceDelete(User $user, Sarpras $model)
    {
        return false;
    }
}
