<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function training()
    {
        return $this->hasMany(TrainingSchedule::class);
    }
}
