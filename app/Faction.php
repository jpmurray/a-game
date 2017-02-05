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
}
