<?php

namespace App\Policies;

use App\Models\Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the users can view any models.
     *
     * @param  App\Models\Users  $users
     * @return mixed
     */
    public function viewAny(Users $users)
    {
        return $users->isSuperAdmin();
    }

    /**
     * Determine whether the users can view the model.
     *
     * @param  App\Models\Users  $users
     * @param  App\Models\Users  $model
     * @return mixed
     */
    public function view(Users $users, Users $model)
    {
        return $users->isSuperAdmin();
    }

    /**
     * Determine whether the users can create models.
     *
     * @param  App\Models\Users  $users
     * @return mixed
     */
    public function create(Users $users)
    {
        return $users->isSuperAdmin();
    }

    /**
     * Determine whether the users can update the model.
     *
     * @param  App\Models\Users  $users
     * @param  App\Models\Users  $model
     * @return mixed
     */
    public function update(Users $users, Users $model)
    {
        return $users->isSuperAdmin();
    }

    /**
     * Determine whether the users can delete the model.
     *
     * @param  App\Models\Users  $users
     * @param  App\Models\Users  $model
     * @return mixed
     */
    public function delete(Users $users, Users $model)
    {
        return $users->isSuperAdmin();
    }

    /**
     * Determine whether the users can delete multiple instances of the model.
     *
     * @param  App\Models\Users  $users
     * @param  App\Models\Users  $model
     * @return mixed
     */
    public function deleteAny(Users $users)
    {
        return $users->isSuperAdmin();
    }

    /**
     * Determine whether the users can restore the model.
     *
     * @param  App\Models\Users  $users
     * @param  App\Models\Users  $model
     * @return mixed
     */
    public function restore(Users $users, Users $model)
    {
        return false;
    }

    /**
     * Determine whether the users can permanently delete the model.
     *
     * @param  App\Models\Users  $users
     * @param  App\Models\Users  $model
     * @return mixed
     */
    public function forceDelete(Users $users, Users $model)
    {
        return false;
    }
}
