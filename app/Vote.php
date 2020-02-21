<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Vote
 *
 * @property int $id
 * @property int $entry_id
 * @property int $user_id
 * @property int $vote_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\VoteCategory $category
 * @property-read \App\Entry $entry
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereEntryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereVoteCategoryId($value)
 * @mixin \Eloquent
 */
class Vote extends Model
{
    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(VoteCategory::class);
    }
}
