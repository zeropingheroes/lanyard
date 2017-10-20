<?php

namespace Zeropingheroes\Lanyard\Policies;

use Zeropingheroes\Lanyard\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Zeropingheroes\Lanyard\User  $user
     * @param  \Zeropingheroes\Lanyard\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }
}
