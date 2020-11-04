<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TradeMessageTest extends TestCase
{

    use RefreshDatabase;

    private $baseUrl = 'api/v1';

    /**
     * Test trade message is created
     *
     * @return void
     */
    public function testCreateTradeMessage()
    {
        $response = $this->postJson(
            $this->baseUrl . '/trade/message',
            $this->validTradeMessage()
        );

        $response->assertStatus(201)
            ->assertJson(
                [
                    'success' => true,
                ]
            )
            ->assertJsonStructure(
                [
                    'status',
                    'success',
                    'message',
                    'data',
                ]
            );
    }

    /**
     * Valid post request
     *
     * @return array
     */
    private function validTradeMessage()
    {
        return [
            'user_id' => '134256',
            'currency_from' => 'EUR',
            'currency_to' => 'GBP',
            'amount_sell' => 1000,
            'amount_buy' => 747.10,
            'rate' => 0.7471,
            'time_placed'  => '24-01-18 10:27:44',
            'originating_country'  => 'FR'
        ];
    }
}
