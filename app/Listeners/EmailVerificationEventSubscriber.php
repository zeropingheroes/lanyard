<?php

namespace App\Listeners;

use Mail;
use App\User;
use App\Mail\VerificationEmail;

class EmailVerificationEventSubscriber
{

    /**
     * Start the email verification process for the user.
     *
     * @param  $event
     * @return void
     */
    public function startEmailVerification($event)
    {
        $this->resetEmailVerificationToken($event);
        $this->sendVerificationEmail($event);
    }

    /**
     * Reset the user's email verification token.
     *
     * @param  $event
     * @return void
     */
    public function resetEmailVerificationToken($event)
    {
        // Get updated user model
        $user = User::findOrFail($event->user->id);

        $user->email_verified = false;
        $user->email_verification_token = md5(uniqid(rand()));
        $user->save();
    }

    /**
     * Send a verification email to the user.
     *
     * @param  $event
     * @return void
     */
    public function sendVerificationEmail($event)
    {
        // Get updated user model
        $user = User::findOrFail($event->user->id);

        $email = new VerificationEmail($user);

        Mail::to($user->email)->send($email);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\User\EmailAddressUpdated',
            'App\Listeners\EmailVerificationEventSubscriber@startEmailVerification'
        );

        $events->listen(
            'App\Events\User\EmailVerificationEmailResendRequested',
            'App\Listeners\EmailVerificationEventSubscriber@sendVerificationEmail'
        );
    }

}