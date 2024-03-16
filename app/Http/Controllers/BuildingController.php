<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Room;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildingsDb = Building::all();
        $buildings = [];
        $i = 0;
        foreach ($buildingsDb as $building) {
            $roomNum = Room::where('building_id', $building->id)->count();
            $building['room_num'] = $roomNum;
            $buildings[$i] = $building;
            $i++;
        }
        return view('building', compact('buildings'));
    }
}
