<?php

namespace Tests\Feature;

use App\Models\Trade;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TradeTest extends TestCase
{
    use RefreshDatabase;

    public function test_trade_can_be_created(): void
    {
        $tradeData = [
            'trade_name' => 'Test Trade',
            'description' => 'This is a test trade description.'
        ];

        $trade = Trade::create($tradeData);

        $this->assertDatabaseHas('trades', [
            'trade_name' => 'Test Trade',
            'description' => 'This is a test trade description.'
        ]);

        $this->assertEquals('Test Trade', $trade->trade_name);
        $this->assertEquals('This is a test trade description.', $trade->description);
    }

    public function test_trade_index_requires_authentication(): void
    {
        $response = $this->get(route('trade.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_trades(): void
    {
        $user = User::factory()->create();
        Trade::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('trade.index'));
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_create_trade(): void
    {
        $user = User::factory()->create();

        $tradeData = [
            'trade_name' => 'New Trade',
            'description' => 'This is a new trade description.'
        ];

        $response = $this->actingAs($user)->post(route('trade.store'), $tradeData);

        $this->assertDatabaseHas('trades', $tradeData);
        // Just check that we got a redirect response (could be success or error)
        $this->assertTrue($response->isRedirect());
    }

    public function test_authenticated_user_can_update_trade(): void
    {
        $user = User::factory()->create();
        $trade = Trade::factory()->create();

        $updatedData = [
            'trade_name' => 'Updated Trade Name',
            'description' => 'Updated trade description.'
        ];

        $response = $this->actingAs($user)->patch(route('trade.update', $trade), $updatedData);

        $this->assertDatabaseHas('trades', [
            'id' => $trade->id,
            'trade_name' => 'Updated Trade Name',
            'description' => 'Updated trade description.'
        ]);
        $response->assertRedirect();
    }

    public function test_authenticated_user_can_delete_trade(): void
    {
        $user = User::factory()->create();
        $trade = Trade::factory()->create();

        $response = $this->actingAs($user)->delete(route('trade.delete', $trade));

        $this->assertDatabaseMissing('trades', ['id' => $trade->id]);
        $response->assertRedirect();
    }

    public function test_trade_name_must_be_unique(): void
    {
        $user = User::factory()->create();
        Trade::factory()->create(['trade_name' => 'Existing Trade']);

        $tradeData = [
            'trade_name' => 'Existing Trade',
            'description' => 'This should fail due to duplicate name.'
        ];

        $response = $this->actingAs($user)->post(route('trade.store'), $tradeData);
        $response->assertSessionHasErrors(['trade_name']);
    }

    public function test_trade_requires_name_and_description(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('trade.store'), []);
        $response->assertSessionHasErrors(['trade_name', 'description']);
    }
}
