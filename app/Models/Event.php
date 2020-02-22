<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Event.
 *
 * @property int $id
 * @property int $event_type_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $start_at
 * @property \Illuminate\Support\Carbon|null $voting_start_at
 * @property \Illuminate\Support\Carbon|null $end_at
 * @property string|null $theme
 * @property string|null $description
 * @property string|null $first_place_prize
 * @property string|null $second_place_prize
 * @property string|null $third_place_prize
 * @property string|null $runner_up_prize
 * @property string|null $runner_up_amount
 * @property bool $active
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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_type_id', 'name', 'start_at', 'voting_start_at', 'end_at', 'theme', 'description', 'first_place_prize',
        'second_place_prize', 'third_place_prize', 'runner_up_prize', 'runner_up_amount', 'active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_at' => 'datetime',
        'voting_start_at' => 'datetime',
        'end_at' => 'datetime',
        'active' => 'boolean',
    ];

    /**
     * An event belongs to an event type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    /**
     * An event has many entries
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    /**
     * An event belongs to many voting categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vote_categories()
    {
        return $this->belongsToMany(VoteCategory::class)->withTimestamps();
    }

    /**
     * Save the Start At attribute as a Carbon Instance
     * 
     * @return void
     */
    public function setStartAtAttribute($startAt)
    {
        $this->attributes['start_at'] = now()->make($startAt);
    }

    /**
     * Save the Voting Start At attribute as a Carbon Instance
     * 
     * @return void
     */
    public function setVotingStartAtAttribute($votingStartAt)
    {
        $this->attributes['voting_start_at'] = now()->make($votingStartAt);
    }

    /**
     * Save the End At attribute as a Carbon Instance
     * 
     * @return void
     */
    public function setEndAtAttribute($endAt)
    {
        $this->attributes['end_at'] = now()->make($endAt);
    }
}
