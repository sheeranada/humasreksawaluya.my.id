<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RuangTunggu;
use Illuminate\Auth\Access\HandlesAuthorization;

class RuangTungguPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ruangTunggu can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list ruangtunggu');
    }

    /**
     * Determine whether the ruangTunggu can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RuangTunggu  $model
     * @return mixed
     */
    public function view(User $user, RuangTunggu $model)
    {
        return $user->hasPermissionTo('view ruangtunggu');
    }

    /**
     * Determine whether the ruangTunggu can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create ruangtunggu');
    }

    /**
     * Determine whether the ruangTunggu can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RuangTunggu  $model
     * @return mixed
     */
    public function update(User $user, RuangTunggu $model)
    {
        return $user->hasPermissionTo('update ruangtunggu');
    }

    /**
     * Determine whether the ruangTunggu can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RuangTunggu  $model
     * @return mixed
     */
    public function delete(User $user, RuangTunggu $model)
    {
        return $user->hasPermissionTo('delete ruangtunggu');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RuangTunggu  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete ruangtunggu');
    }

    /**
     * Determine whether the ruangTunggu can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RuangTunggu  $model
     * @return mixed
     */
    public function restore(User $user, RuangTunggu $model)
    {
        return false;
    }

    /**
     * Determine whether the ruangTunggu can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RuangTunggu  $model
     * @return mixed
     */
    public function forceDelete(User $user, RuangTunggu $model)
    {
        return false;
    }
}
