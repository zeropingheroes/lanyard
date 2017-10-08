<?php

namespace App\Listeners\User;

use App\Events\User\EmailAddressUpdated;
use App\Events\User\EmailVerificationTokenReset;

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
        $event->user->email_verified = false;
        $event->user->email_verification_token = md5(uniqid(rand()));
        $event->user->save();
        event(new EmailVerificationTokenReset($event->user));
    }
}
