<?php

namespace Zeropingheroes\Lanyard;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'email_verified',
        'email_verification_token',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function roles()
    {
        return $this
            ->belongsToMany('Zeropingheroes\Lanyard\Role')
            ->withTimestamps();
    }
}
