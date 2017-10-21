<?php

namespace Zeropingheroes\Lanyard\Observers;

use Zeropingheroes\Lanyard\User;
use Zeropingheroes\Lanyard\Role;
use Zeropingheroes\Lanyard\Events\User\EmailAddressUpdated;

class UserObserver
{
    /**
     * Listen to the User updated event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(User $user)
    {
        if ($user->isDirty('email')) {
            event(new EmailAddressUpdated($user));
        }
    }

    /**
     * Listen to the User created event.
     *
     * @param  User $user
     * @return void
     */
    public function created(User $user)
    {
        // The first user to log in should be assigned the super admin role
        if (User::count() == 1) {
            $user->roles()->attach(Role::where('name', 'Super Admin')->first());
        }
    }
}