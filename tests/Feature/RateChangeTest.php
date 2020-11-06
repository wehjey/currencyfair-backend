<?php

namespace Tests\Feature;

use App\Models\RateChange;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RateChangeTest extends TestCase
{

    use RefreshDatabase;

    private $baseUrl = 'api/v1';

    /**
     * Get all rate changes
     *
     * @return void
     */
    public function testViewAllRateChanges()
    {
        RateChange::factory()->create();

        $response = $this->getJson(
            $this->baseUrl . '/trade/all-rates'
        );

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
                        '*' => [
                            'currency_from',
                            'currency_to',
                            'previous_rate',
                            'current_rate',
                            'percentage_change'
                        ]
                    ],
                ]
            );
    }

    /**
     * Get rate change by country
     *
     * @return void
     */
    public function testViewRateChangesByCountry()
    {
        RateChange::factory()->create();

        $response = $this->getJson(
            $this->baseUrl . '/trade/country-rates?currencyFrom=EUR&currencyTo=GBP'
        );

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
                        'currency_from',
                        'currency_to',
                        'previous_rate',
                        'current_rate',
                        'percentage_change'
                    ]
                ]
            );
    }

}
