<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use App\Models\Pedido;
use App\Models\User;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testCreatePedido()
    {
        // Crie um usuário e autentique-o usando Sanctum
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Execute uma solicitação POST autenticada para criar um pedido
        $response = $this->json('POST', '/api/pedidos', [
            'name' => 'Nome do Cliente',
            'price' => 100.00,
            'status' => 'Pendente',
        ]);

        $response->assertStatus(201)->assertJson([
            'name' => 'Nome do Cliente',
            'price' => 100.00,
            'status' => 'Pendente',
        ]);
    }

    public function testListPedidos()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Crie alguns pedidos fictícios
        Pedido::factory(3)->create();

        $response = $this->json('GET', '/api/pedidos');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function testUpdatePedido()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $pedido = Pedido::factory()->create();

        $response = $this->json('PUT', "/api/pedidos/{$pedido->id}", [
            'name' => 'Novo Cliente',
            'price' => 150.00,
            'status' => 'Em andamento',
        ]);

        $response->assertStatus(200)->assertJson([
            'name' => 'Novo Cliente',
            'price' => 150.00,
            'status' => 'Em andamento',
        ]);
    }

    public function testDeletePedido()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $pedido = Pedido::factory()->create();

        $response = $this->json('DELETE', "/api/pedidos/{$pedido->id}");

        $response->assertStatus(204);
        $this->assertNull(Pedido::find($pedido->id));
    }

    public function testAuthRequired()
    {
        $response = $this->json('GET', '/api/pedidos');
        $response->assertStatus(401);
    }

    public function testPedidoNotFound()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->json('GET', '/api/pedidos/999');

        $response->assertStatus(404);
    }

    public function testUpdatePedidoNotFound()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->json('PUT', '/api/pedidos/999', [
            'name' => 'Novo Cliente',
            'price' => 150.00,
            'status' => 'Em andamento',
        ]);

        $response->assertStatus(404);
    }

    public function testDeletePedidoNotFound()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->json('DELETE', '/api/pedidos/999');

        $response->assertStatus(404);
    }

    public function testUnauthorizedAccess()
    {
        $response = $this->json('POST', '/api/pedidos', [
            'name' => 'Novo Cliente',
            'price' => 150.00,
            'status' => 'Em andamento',
        ]);

        $response->assertStatus(401);
    }

    public function testShowPedidoUnauthenticated()
    {
        $pedido = Pedido::factory()->create();

        $response = $this->json('GET', "/api/pedidos/{$pedido->id}");

        $response->assertStatus(401);
    }



}
