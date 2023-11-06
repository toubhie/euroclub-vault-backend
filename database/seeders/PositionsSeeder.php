<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Define an array of positions with name and description
       $positions = [
        ['name' => 'CF', 'description' => 'Center Forward'],
        ['name' => 'AM', 'description' => 'Attacking Midfielder'],
        ['name' => 'LW', 'description' => 'Left Winger'],
        ['name' => 'RW', 'description' => 'Right Winger'],
        ['name' => 'LM', 'description' => 'Left Midfielder'],
        ['name' => 'RM', 'description' => 'Right Midfielder'],
        ['name' => 'CM', 'description' => 'Central Midfielder'],
        ['name' => 'DM', 'description' => 'Defensive Midfielder'],
        ['name' => 'LB', 'description' => 'Left Back'],
        ['name' => 'RB', 'description' => 'Right Back'],
        ['name' => 'CB', 'description' => 'Central Back'],
        ['name' => 'GK', 'description' => 'Goalkeeper']
    ];

    // Insert the data into the "positions" table
    DB::table('positions')->insert($positions);
    }
}
