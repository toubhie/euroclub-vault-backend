<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'club' => $this->faker->word,
            'position' => $this->faker->randomElement(['CF', 'AM', 'LW', 'RW', 'LM', 'RM', 'CM', 'DM', 'BBX', 'LB', 'CB', 'RB', 'GK']),
            'nationality' => $this->faker->country,
            'age' => $this->faker->numberBetween(18, 40),
            'player_value' => $this->faker->randomFloat(2, 100000, 100000000),
        ];
    }
}
