<?php

namespace Zeropingheroes\Lanyard;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this
            ->belongsToMany('Zeropingheroes\Lanyard\User')
            ->withTimestamps();
    }
}
