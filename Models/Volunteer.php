<?php

namespace Modules\Volunteers\Models;

use App\Models\MyBaseModel;

class Volunteer extends MyBaseModel
{
    protected $table = 'volunteers';


    /*
     * ---------
     * Relationships
     * ---------
     */

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function food()
    {
        return $this->belongsToMany(FoodTime::class);
    }

    /*
     * ---------
     * Scopes
     * ---------
     */

    public function scopeEvent($query, $event_id)
    {
        return $query->where('event_id', $event_id);
    }

}
