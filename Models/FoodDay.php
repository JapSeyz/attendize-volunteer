<?php

namespace Modules\Volunteers\Models;

use App\Models\MyBaseModel;

class FoodDay extends MyBaseModel
{
    protected $table = 'volunteers_food_days';


    /*
     * ---------
     * Relationships
     * ---------
     */

    public function times()
    {
        return $this->hasMany(FoodTime::class, 'day_id');
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
