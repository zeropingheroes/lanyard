<?php

namespace App\Listeners\User;

use App\Events\User\EmailAddressUpdated;
use App\Events\User\EmailVerificationTokenReset;
use App\User;

class ResetEmailVerificationToken
{
    /**
     * Handle the event.
     *
     * @param  EmailAddressUpdated $event
     * @return void
     */
    public function handle(EmailAddressUpdated $event)
    {
        $user = User::findOrFail($event->user->id);

        $user->email_verified = false;
        $user->email_verification_token = md5(uniqid(rand()));
        $user->save();

        event(new EmailVerificationTokenReset($user));
    }
}
