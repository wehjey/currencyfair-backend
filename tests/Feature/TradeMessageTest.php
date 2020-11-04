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
    public function testCreateValidTradeMessage()
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
     * Test an invalid trade message is not created
     */
    public function testCreateInvalidTradeMessage()
    {
        $response = $this->postJson(
            $this->baseUrl . '/trade/message',
            $this->invalidTradeMessage()
        );

        $response->assertStatus(422)
            ->assertJsonStructure(
                [
                    'message',
                    'errors' => [
                        'amount_sell',
                        'rate'
                    ],
                ]
            );
    }

    /**
     * Test can view trade messages
     */
    public function testViewTradeMessages()
    {
        $response = $this->getJson($this->baseUrl . '/trade/message');
        $response->assertStatus(200)
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
                    'data' => [
                        'records',
                        'pagination' => [
                            'total',
                            'count',
                            'per_page',
                            'current_page',
                            'last_page',
                            'prev_page_url',
                            'next_page_url'
                        ]
                    ],
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
            'time_placed'  => '24-JAN-18 10:27:44',
            'originating_country'  => 'FR'
        ];
    }

    /**
     * Invalid post request
     *
     * @return array
     */
    private function invalidTradeMessage()
    {
        return [
            'user_id' => '134256',
            'currency_from' => 'EUR',
            'currency_to' => 'GBP',
            'amount_buy' => 747.10,
            'time_placed'  => '24-JAN-18 10:27:44',
            'originating_country'  => 'FR'
        ];
    }
}
