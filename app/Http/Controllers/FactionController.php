<?php

namespace App\Http\Controllers;

use App\Faction;
use App\TrainingSchedule;
use App\Type;
use Illuminate\Http\Request;

class FactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('new-faction')->with([
            'types' => Type::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:factions',
            'leader_name' => 'required',
            'type_id' => 'required|integer',
        ]);

        $faction = new Faction();
        $faction->name = request('name');
        $faction->leader_name = request('leader_name');
        $faction->type_id = request('type_id');
        $faction->user_id = request()->user()->id;
        $faction->save();

        foreach ($faction->type->units as $unit) {
            TrainingSchedule::create([
                'faction_id' => $faction->id,
                'unit_id' => $unit->id,
            ]);
        }

        return redirect()->route('overview')->with('success', 'faction.created');
        // return view('home')->with('success', 'faction.created');
    }
}
