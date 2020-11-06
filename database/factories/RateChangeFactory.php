<?php

namespace Database\Factories;

use App\Models\RateChange;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateChangeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RateChange::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'currency_from' => 'EUR',
            'currency_to' => 'GBP',
            'previous_rate' => 0.6471,
            'current_rate' => 0.4471,
            'percentage_change' => -30.91,
        ];
    }
}
