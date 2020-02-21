<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
