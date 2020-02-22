<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EventType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventType extends Model
{
    protected $fillable = ['name'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
