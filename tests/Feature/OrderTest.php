<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_orders()
    {
        Order::factory()->create([
            'user_id' => 1,
            'items' => json_encode([
                ['id' => 1, 'name' => 'Test Item'],
            ]),
        ]);

        $response = $this->get('/orders');

        $response->assertStatus(200);
        $response->assertSee('Test Item');
    }
}