<?php
declare(strict_types=1);

namespace Modules\Volunteers\Models;


class Event extends \App\Models\Event
{

    public function volunteers(){
        return $this->hasMany(Volunteer::class);
    }

}
