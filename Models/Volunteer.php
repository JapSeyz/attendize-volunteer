<?php
declare(strict_types = 1);

namespace Modules\Volunteers\Models;

use App\Events\Event;
use App\Models\MyBaseModel;
use Illuminate\Contracts\Auth\Authenticatable;

class Volunteer extends MyBaseModel implements Authenticatable
{
    protected $table = 'volunteers_volunteers';

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
        return $this->belongsToMany(Task::class, 'volunteers_task_volunteer')->withPivot('priority');
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
     * Methods
     * ---------
     */

    public function hasTaskAtPriority($taskId, $priority)
    {
        if ($this->tasks->where('id', $taskId)
            ->where('pivot.priority', $priority)
            ->count()) {

            return true;
        }

        return false;
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
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->attributes['remember_token'] = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
