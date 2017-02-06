<?php

namespace App;

use App\Traits\Prestige;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use Prestige;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function trainingSchedule()
    {
        return $this->hasMany(TrainingSchedule::class);
    }

    public function getUnitsInTrainingAttribute()
    {
        return $this->trainingSchedule->mapWithKeys(function ($item, $key) {
            return [$item->unit->type => $item->totalTraining];
        });

        // return $this->trainingSchedule->pluck('totalTraining')->sum();
    }
}
