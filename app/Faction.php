<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
