<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\VoitureController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Voiture;

class VoitureControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexReturnsDataInValidFormat()
    {
        // Arrange: create some voitures
        Voiture::factory()->count(3)->create();

        // Act: call the index method
        $response = $this->get(route('Accueil'));

        // Assert: check if the response has the right structure
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'make',
                'model',
                'year',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testStoreNewVoiture()
    {
        // Arrange: create a voiture data
        $data = [
            'make' => 'Toyota',
            'model' => 'Corolla',
            'year' => 2020,
        ];

        // Act: call the store method
        $response = $this->post(route('voitures.store'), $data);

        // Assert: check if the voiture was created
        $response->assertStatus(201);
        $this->assertDatabaseHas('voitures', $data);
    }

    public function testUpdateVoiture()
    {
        // Arrange: create a voiture
        $voiture = Voiture::factory()->create();

        // Update data
        $updateData = [
            'make' => 'Honda',
            'model' => 'Civic',
            'year' => 2021,
        ];

        // Act: call the update method
        $response = $this->put(route('voitures.update', $voiture->id), $updateData);

        // Assert: check if the voiture was updated
        $response->assertStatus(200);
        $this->assertDatabaseHas('voitures', $updateData);
    }

    public function testDeleteVoiture()
    {
        // Arrange: create a voiture
        $voiture = Voiture::factory()->create();

        // Act: call the delete method
        $response = $this->delete(route('voitures.destroy', $voiture->id));

        // Assert: check if the voiture was deleted
        $response->assertStatus(204);
        $this->assertDatabaseMissing('voitures', ['id' => $voiture->id]);
    }
}
