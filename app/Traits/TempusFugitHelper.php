<?php

namespace App\Traits;

use App\TrainingSchedule;

trait TempusFugitHelper
{
    public function trainUnits()
    {
        TrainingSchedule::all()->each(function ($schedule, $key) {
            $faction = $schedule->faction()->first();

            // treat units who are finished training
            $faction->{$schedule->unit->type} += $schedule->day_0;

                // move training unit number down the chain of days
            for ($i=1; $i < 24; $i++) {
                $day = "day_{$i}";
                $iBefore = $i - 1;
                $before = "day_{$iBefore}";
                $schedule->$before = $schedule->$day;
            }
                
            // nothing is getting trained here
            $schedule->day_23 = 0;

            $schedule->save();
            $faction->save();


            // $schedule->each(function ($item, $key) use ($faction) {
            //     // dd($item);
                
            // });
        });
    }
}
