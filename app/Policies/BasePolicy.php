<?php

namespace Zeropingheroes\Lanyard\Policies;

use Zeropingheroes\Lanyard\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Allow super admins to perform any action
     *
     * @param $user
     * @return bool
     */
    public function before($user)
    {
        return $user->hasRole('Super Admin');
    }
}
