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
}
