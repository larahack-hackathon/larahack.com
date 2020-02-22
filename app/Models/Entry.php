<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entry
 *
 * @property int $id
 * @property int $team_id
 * @property int $event_id
 * @property string|null $name
 * @property string|null $url
 * @property string|null $source
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Event $event
 * @property-read \App\Team $team
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry whereUrl($value)
 * @mixin \Eloquent
 */
class Entry extends Model
{
    protected $fillable = ['team_id', 'event_id', 'name', 'url', 'source', 'description',];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
