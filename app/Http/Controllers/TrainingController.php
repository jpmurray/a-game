<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $units = $user->faction->type->units;
        $faction = $user->faction;
        $trainingSchedule = $faction->trainingSchedule;
        
        return view('military.training')->with([
            'units' => $units,
            'faction' => $faction,
            'trainingSchedule' => $trainingSchedule,
        ]);
    }
}
