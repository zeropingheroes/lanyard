<?php

namespace Zeropingheroes\Lanyard;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The users who have the role assigned
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this
            ->belongsToMany('Zeropingheroes\Lanyard\User', 'user_roles')
            ->withTimestamps();
    }
}
