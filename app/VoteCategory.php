<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
