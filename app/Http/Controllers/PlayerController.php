<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index(){
        return Player::all();
    }

    public function store(Request $request){
        return Player::create($request->all());
    }

    public function show($id){
        return Player::find($id);
    }

    public function update(Request $request, $id){
        $player = Player::find($id);
        $player->update($request->all());
        return $player;
    }

    public function destroy($id){
        $player = Player::find($id);
        $player->delete();
        return ['message' => 'Player deleted'];
    }
}
