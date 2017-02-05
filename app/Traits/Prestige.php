<?php

namespace App\Traits;

trait Prestige
{
    public function getPrestigeAttribute()
    {
        return $this->calculateMilitaryPrestige() +
                $this->calculateEconomicPrestige();
    }

    private function calculateEconomicPrestige()
    {
        $multiplier = [
            'money' => 1,
        ];

        return ($this->money * $multiplier['money']);
    }

    private function calculateMilitaryPrestige()
    {
        $multiplier = [
            'off' => 0.5,
            'def' => 0.5,
            'spec' => 1.5,
        ];

        $total = (($this->off * $this->type->units()->where('type', 'off')->first()->cost) * $multiplier['off'])
               + (($this->def * $this->type->units()->where('type', 'def')->first()->cost) * $multiplier['def'])
               + (($this->type->units()->where('type', 'spec')->first()->cost) * $multiplier['spec']);

        return $total;
    }
}
