<?php

namespace App\Http\Controllers;

use App\Traits\SpreadOverTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainingController extends Controller
{
    use SpreadOverTime;
    
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

    public function train()
    {
        $isValidatedOrError = $this->validateTrainingRequest();
        
        if ($isValidatedOrError !== true) {
            return back()->withErrors($isValidatedOrError);
        }

        $user = auth()->user();
        $faction = $user->faction;
        $type = $faction->type;
        $off = $type->units->where('type', 'off')->first();
        $def = $type->units->where('type', 'def')->first();
        $spec = $type->units->where('type', 'spec')->first();
        $trainingSchedule = $faction->trainingSchedule;

        $schedule['off'] = $trainingSchedule->where('unit_id', $off->id)->first();
        $schedule['def'] = $trainingSchedule->where('unit_id', $def->id)->first();
        $schedule['spec'] = $trainingSchedule->where('unit_id', $spec->id)->first();
        
        $spreadOffTraining = collect([
            'off' => $this->spreadOverTime(request('off')),
            'def' => $this->spreadOverTime(request('def')),
            'spec' => $this->spreadOverTime(request('spec'))
        ]);

        $spreadOffTraining->each(function ($item, $which) use ($schedule) {
            // off, def ou spec
            $item->each(function ($item, $key) use ($which, $schedule) {
                $day = $key-1;
                $day = "day_{$day}";
                $schedule[$which]->$day = $schedule[$which]->$day + $item;
            });
        });


        collect($schedule)->each(function ($item, $key) {
            $item->save();
        });

        $this->payTrainingCost();

        return redirect()->back()->with('success', 'faction.created');
    }

    private function validateTrainingRequest()
    {
        if ((request('off') + request('def') + request('spec')) == 0) {
            // return back()->withErrors(["You haven't given us the number of troops to send!"]);
            return "You haven't given us the number of troops to send!";
        }

        if (request('off') !== null) {
            $this->validate(request(), [
                'off' => 'integer',
            ]);
        }

        if (request('def') !== null) {
            $this->validate(request(), [
                'def' => 'integer',
            ]);
        }

        if (request('spec') !== null) {
            $this->validate(request(), [
                'spec' => 'integer',
            ]);
        }
        
        if (!$this->checkIfEnoughMoney()) {
            // return back()->withErrors(["The training cost is too high for your tresury!"]);
            return "The training cost is too high for your tresury!";
        }

        return true;
    }

    private function payTrainingCost()
    {
        $faction = auth()->user()->faction;
        $faction->money = $faction->money - $this->getTotalCost();
        $faction->save();
    }

    private function checkIfEnoughMoney()
    {
        if ($this->getTotalCost() <= auth()->user()->faction->money) {
            return true;
        } else {
            return false;
        }
    }

    private function getTotalCost()
    {
        $faction = request()->user()->faction;

        $cost_off = $faction->type->units->where('type', 'off')->first()->cost * request('off');
        $cost_def = $faction->type->units->where('type', 'def')->first()->cost * request('def');
        $cost_spec = $faction->type->units->where('type', 'spec')->first()->cost * request('spec');

        return $cost_off + $cost_def + $cost_spec;
    }
}
