<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'faction_id', 'unit_id'
    ];

    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function getTotalTrainingAttribute()
    {
        return collect([
            $this->day_0,$this->day_1,$this->day_2,$this->day_3,$this->day_4,$this->day_5,$this->day_6,$this->day_7,$this->day_8,$this->day_9,$this->day_10,$this->day_11,$this->day_12,$this->day_13,$this->day_14,$this->day_15,$this->day_16,$this->day_17,$this->day_18,$this->day_19,$this->day_20,$this->day_21,$this->day_22,$this->day_23])->sum();
    }
}
