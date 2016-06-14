<?php

namespace Modules\Volunteers\Models;

use App\Models\MyBaseModel;

class FoodTime extends MyBaseModel
{
    protected $table = 'food_times';


    /*
     * ---------
     * Relationships
     * ---------
     */

    public function day()
    {
        return $this->hasOne(FoodDay::class, 'day_id');
    }

    public function volunteer()
    {
        return $this->hasMany(Volunteer::class);
    }
}
