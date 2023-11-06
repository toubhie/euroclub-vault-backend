<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class WikiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_getWikipediaInfo_successful(){
        $response = $this->postJson('/api/get-wikipedia-info', ['playerName' => 'Lionel Messi']);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['extract', 'imageUrl']);
    }

    public function test_getWikipediaInfo_no_results(){
        Http::fake([
            '*' => Http::response(['query' => ['search' => []]], 200),
        ]);

        $response = $this->postJson('/api/get-wikipedia-info', ['playerName' => 'NonExistentPlayer']);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(['message' => 'No results found for NonExistentPlayer on Wikipedia.']);
    }
}
