<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Picture;
use Illuminate\Auth\Access\HandlesAuthorization;

class PicturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the picture can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the picture can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Picture  $model
     * @return mixed
     */
    public function view(User $user, Picture $model)
    {
        return true;
    }

    /**
     * Determine whether the picture can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the picture can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Picture  $model
     * @return mixed
     */
    public function update(User $user, Picture $model)
    {
        return true;
    }

    /**
     * Determine whether the picture can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Picture  $model
     * @return mixed
     */
    public function delete(User $user, Picture $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Picture  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the picture can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Picture  $model
     * @return mixed
     */
    public function restore(User $user, Picture $model)
    {
        return false;
    }

    /**
     * Determine whether the picture can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Picture  $model
     * @return mixed
     */
    public function forceDelete(User $user, Picture $model)
    {
        return false;
    }
}
