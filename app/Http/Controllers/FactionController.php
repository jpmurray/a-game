<?php

namespace App\Http\Controllers;

use App\Faction;
use App\Type;
use Illuminate\Http\Request;

class FactionController extends Controller
{
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

        return view('home')->with('success', 'faction.created');
    }
}
