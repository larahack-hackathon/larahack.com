<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VoteCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VoteCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VoteCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VoteCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VoteCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VoteCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VoteCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VoteCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VoteCategory extends Model
{
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
