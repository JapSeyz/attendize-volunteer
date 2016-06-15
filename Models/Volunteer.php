<?php
declare(strict_types=1);

namespace Modules\Volunteers\Models;

use App\Models\MyBaseModel;

class Volunteer extends MyBaseModel
{
    protected $table = 'volunteers';

    protected $hidden = [
        'password',
    ];


    protected $fillable = [
        'name',
        'password',
        'email',
        'phone',
        'mobile',
        'birthday',
        'clothing_size',
        'address',
        'zip',
        'newsletter',
        'extra_events',
        'event_id',
        'previous_tasks',
        'additional_information',
        'rank',
    ];

    /*
     * ---------
     * Boot
     * ---------
     */
    public static function boot()
    {
        parent::boot();

    }

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



    /*
     * ---------
     * Setters
     * ---------
     */
    /**
     * Encrypt Password On Save
     *
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes[ 'password' ] = bcrypt($password);
    }

}
