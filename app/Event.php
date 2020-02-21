<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Event
 *
 * @property int $id
 * @property int $event_type_id
 * @property string $name
 * @property string|null $start_at
 * @property string|null $voting_start_at
 * @property string|null $end_at
 * @property string|null $theme
 * @property string|null $description
 * @property string|null $first_place_prize
 * @property string|null $second_place_prize
 * @property string|null $third_place_prize
 * @property string|null $runner_up_prize
 * @property string|null $runner_up_amount
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entry[] $entries
 * @property-read int|null $entries_count
 * @property-read \App\EventType $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VoteCategory[] $vote_categories
 * @property-read int|null $vote_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereEventTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereFirstPlacePrize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereRunnerUpAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereRunnerUpPrize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereSecondPlacePrize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereThirdPlacePrize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereVotingStartAt($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    public function type()
    {
        return $this->belongsTo(EventType::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function vote_categories()
    {
        return $this->belongsToMany(VoteCategory::class)->withTimestamps();
    }
}
