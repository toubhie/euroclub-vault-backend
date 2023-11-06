<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class HelperController extends Controller
{
    public function getAllPlayerPositions(){
        $positions = Position::all();

        return response()->json($positions);
    }
}
