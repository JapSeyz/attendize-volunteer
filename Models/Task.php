<?php

namespace Modules\Volunteers\Models;

use App\Models\MyBaseModel;

class Task extends MyBaseModel
{
    protected $table = 'volunteers_tasks';

    protected $fillable = [
        'name'
    ];

    /*
     * ---------
     * Relationships
     * ---------
     */

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class);
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
