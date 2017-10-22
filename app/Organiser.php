<?php

namespace Zeropingheroes\Lanyard;

use Illuminate\Database\Eloquent\Model;

class Organiser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

}
