<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function factions()
    {
        return $this->hasMany(Faction::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
