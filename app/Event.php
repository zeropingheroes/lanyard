<?php

namespace Zeropingheroes\Lanyard;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organiser_id',
        'venue_id',
        'name',
        'capacity',
        'start',
        'end',
        'terms_and_conditions',
    ];

    /**
     * The organiser that the event is attached to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function organiser()
    {
        return $this
            ->belongsTo('Zeropingheroes\Lanyard\Organiser');
    }

    /**
     * The venue that the event is attached to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function venue()
    {
        return $this
            ->belongsTo('Zeropingheroes\Lanyard\Venue');
    }
}
