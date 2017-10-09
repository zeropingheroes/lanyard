<?php

namespace App\Observers;

use App\User;
use App\Events\User\EmailAddressUpdated;

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
}