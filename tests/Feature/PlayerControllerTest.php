<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Factories\PlayerFactory;
use App\Models\Player;


class PlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_player(){
        $playerData = [
            'fullname' => 'John Doe',
            'club' => 'Test Club',
            'position' => 'Forward',
            'nationality' => 'Test Nation',
            'age' => 25,
            'player_value' => 1000000.00,
        ];
    
        $response = $this->json('POST', '/api/players', $playerData);
    
        $response->assertStatus(201);
    
        $response->assertJson([
            'fullname' => 'John Doe',
            'club' => 'Test Club',
            'position' => 'Forward',
            'nationality' => 'Test Nation',
            'age' => 25,
            'player_value' => 1000000.00,
        ]);
    
        $this->assertDatabaseHas('players', [
            'fullname' => 'John Doe',
            'club' => 'Test Club',
            'position' => 'Forward',
            'nationality' => 'Test Nation',
            'age' => 25,
            'player_value' => 1000000.00,
        ]);
    }

    public function test_create_player_with_missing_fields(){
        $playerData = [
            'club' => 'Test Club',
            'age' => 25,
            'player_value' => 1000000.00,
        ];

        $response = $this->json('POST', '/api/players', $playerData);

        $response->assertStatus(400);

        $response->assertJsonValidationErrors([
            'fullname', 'position', 'nationality',
        ]);
    }

    public function test_update_player(){
        $player = Player::factory()->create();

        $updatedData = [
            'fullname' => 'Updated Player',
            'club' => 'Updated Club',
            'position' => 'Updated Position',
            'nationality' => 'Updated Nationality',
            'age' => 28,
            'player_value' => 2000000.00,
        ];
    
        $response = $this->json('PUT', "/api/players/{$player->id}", $updatedData);
    
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('players', $updatedData);
    }
    
    public function test_view_player(){
        $player = Player::factory()->create();

        $response = $this->json('GET', "/api/players/{$player->id}");

        $response->assertStatus(200);

        $response->assertJson([
            'fullname' => $player->fullname,
            'club' => $player->club,
            'position' => $player->position,
            'nationality' => $player->nationality,
            'age' => $player->age,
            'player_value' => $player->player_value,
        ]);
    }

    public function test_show_player_missing_id(){
        $response = $this->json('GET', '/api/players/999');

        $response->assertStatus(404);
    }

    public function test_delete_player() {
        $player = Player::factory()->create();
    
        $response = $this->delete("/api/players/{$player->id}");

        $response->assertNoContent();

        $this->assertDatabaseMissing('players', ['id' => $player->id]);
    }
    
    public function test_filter_players(){
        $players = PlayerFactory::new()->count(3)->create(['position' => 'Center Forward']);
        PlayerFactory::new()->count(2)->create(['position' => 'Left Midfielder']);

        $positions = ['Center Forward'];
        $response = $this->post('/api/players/filter', ['positions' => $positions]);
    
        $response->assertOk();
    }
    
}
