<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PlayerController extends Controller
{
    public function index(){
        return Player::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'club' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'age' => 'required|integer',
            'player_value' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }
    
        $player = Player::create($request->all());
    
        return response()->json($player, Response::HTTP_CREATED);
    }

    public function show($id){
        try {
            $player = Player::findOrFail($id);
            return $player;
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Player not found'], Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $id){
        $player = Player::find($id);
        $player->update($request->all());
        return $player;
    }

    public function destroy($id){
        try {
            $player = Player::findOrFail($id);
            $player->delete();
            
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Player not found'], Response::HTTP_NOT_FOUND);
        }
    }

    public function filter(Request $request){
        $positions = $request->input('positions');
        
        $filteredPlayers = Player::whereIn('position', $positions)->get();
        
        return response()->json($filteredPlayers, Response::HTTP_OK);
    }
}
