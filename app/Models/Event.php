<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
