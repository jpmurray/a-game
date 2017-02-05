<?php

namespace App\Traits;

trait Prestige
{
    public function getPrestigeAttribute()
    {
        return $this->calculateMilitaryPrestige();
    }

    private function calculateMilitaryPrestige()
    {
        $values = [
            'off' => 0.5,
            'def' => 0.5,
            'spec' => 1,
        ];

        return ($this->off * $values['off']) + ($this->def * $values['def']) + ($this->spec * $values['spec']);
    }
}
