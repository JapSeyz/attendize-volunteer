<?php

namespace Modules\Volunteers\Models;

use App\Models\MyBaseModel;

class FoodDay extends MyBaseModel
{
    protected $table = 'food_days';


    /*
     * ---------
     * Relationships
     * ---------
     */

    public function times()
    {
        return $this->hasMany(FoodTime::class, 'day_id');
    }
}
