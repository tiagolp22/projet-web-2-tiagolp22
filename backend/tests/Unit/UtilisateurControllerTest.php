<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UtilisateurControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_users()
    {
        Utilisateur::factory()->count(3)->create();

        $response = $this->get('/api/utilisateurs');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'nom', 'email', 'role', 'created_at', 'updated_at']
        ]);
        $this->assertCount(3, $response->json());
    }

    public function test_show_returns_specific_user()
    {
        $user = Utilisateur::factory()->create();

        $response = $this->get("/api/utilisateurs/{$user->id}");

        $response->assertStatus(200);
        $response->assertJson($user->toArray());
    }

    public function test_store_creates_new_user()
    {
        $userData = [
            'nom' => 'Test User',
            'email' => 'test@example.com',
            'mot_de_passe' => 'password123',
            'role' => 'user'
        ];

        $response = $this->postJson('/api/utilisateurs', $userData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('utilisateurs', [
            'nom' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'user'
        ]);
    }

    public function test_update_modifies_existing_user()
    {
        $user = Utilisateur::factory()->create();
        $updatedData = ['nom' => 'Updated Name'];

        $response = $this->putJson("/api/utilisateurs/{$user->id}", $updatedData);

        $response->assertStatus(200);
        $response->assertJsonFragment(['nom' => 'Updated Name']);
        $this->assertDatabaseHas('utilisateurs', [
            'id' => $user->id,
            'nom' => 'Updated Name'
        ]);
    }

    public function test_destroy_deletes_user()
    {
        $user = Utilisateur::factory()->create();

        $response = $this->deleteJson("/api/utilisateurs/{$user->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('utilisateurs', ['id' => $user->id]);
    }
}
