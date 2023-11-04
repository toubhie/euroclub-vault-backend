<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;


class HelperController extends Controller
{
    public function getAllPlayerPositions(){
        $positions = Position::all(); // Assuming you have a "Position" model that corresponds to the "positions" table.

        return response()->json($positions);
    }
}
