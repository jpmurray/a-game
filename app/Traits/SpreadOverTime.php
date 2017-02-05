<?php

namespace App\Traits;

trait SpreadOverTime
{
    private function spreadOverTime($amount)
    {
        $totalTimePeriod = 24;
        $minimumTrainingTime = 10; // takes at least 10 hours to train one unit
        $spreadTime = $totalTimePeriod - $minimumTrainingTime; // troops should be spread on this timeframe
        
        $hourly = floor($amount / $spreadTime);
        $remaining = $amount - ($hourly * $spreadTime);

        return $this->spread($amount, $totalTimePeriod, $spreadTime);
    }

    public function spread($amount, $totalTimePeriod, $spreadTime)
    {
        $schedule = [];
        $countdown = $totalTimePeriod;

        while ($amount != 0) {
            $schedule[$countdown] = !isset($schedule[$countdown]) ? 1 : $schedule[$countdown]+1;

            $amount--;
            $countdown--;
            
            if ($countdown < $spreadTime) {
                $countdown = $totalTimePeriod;
            }
        }

        return collect($schedule);
    }
}
