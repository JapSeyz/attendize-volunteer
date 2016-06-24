<?php

namespace Modules\Volunteers\Models;

use App\Models\MyBaseModel;

class Task extends MyBaseModel
{
    protected $table = 'volunteers_tasks';


    /*
     * ---------
     * Relationships
     * ---------
     */

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class);
    }
}
