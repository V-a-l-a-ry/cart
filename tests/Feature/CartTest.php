<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Redis;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_add_item_to_cart()
    {
        Redis::flushall();

        $response = $this->post('/cart/add', ['name' => 'Test Item']);

        $response->assertRedirect('/cart');
        $this->assertNotEmpty(json_decode(Redis::get('cart'), true));
    }

    public function test_user_can_view_cart()
    {
        Redis::set('cart', json_encode([
            ['id' => 1, 'name' => 'Test Item'],
        ]));

        $response = $this->get('/cart');

        $response->assertStatus(200);
        $response->assertSee('Test Item');
    }

    public function test_user_can_remove_item_from_cart()
    {
        Redis::set('cart', json_encode([
            ['id' => 1, 'name' => 'Test Item'],
        ]));

        $response = $this->delete('/cart/remove/1');

        $response->assertRedirect('/cart');
        $this->assertEmpty(json_decode(Redis::get('cart'), true));
    }

    public function test_user_can_place_order_from_cart()
    {
        Redis::set('cart', json_encode([
            ['id' => 1, 'name' => 'Test Item'],
        ]));

        $response = $this->post('/cart/place-order');

        $response->assertRedirect('/orders');
        $this->assertDatabaseHas('orders', ['user_id' => 1]);
        $this->assertEmpty(Redis::get('cart'));
    }
}
