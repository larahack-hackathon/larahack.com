<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Team
 *
 * @property int $id
 * @property int $owner_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entry[] $entries
 * @property-read int|null $entries_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Team whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Team whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Team extends Model
{
    protected $fillable = ['owner_id', 'name'];

    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
