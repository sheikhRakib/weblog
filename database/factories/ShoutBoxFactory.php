<?php

namespace Database\Factories;

use App\Models\ShoutBox;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoutBoxFactory extends Factory
{
    protected $model = ShoutBox::class;

    public function definition()
    {
        return [
            'sender_id' => $this->faker->numberBetween(5,12),
            'message'   => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
        ];
    }
}
