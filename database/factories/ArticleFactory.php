<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;
   
    public function definition()
    {
        return [
            'title'        => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'description'  => $this->faker->paragraphs($nb = 20, $asText = true),
            'user_id'      => $this->faker->numberBetween(5,12),
            'is_published' => $this->faker->boolean($chanceOfGettingTrue = 75),
        ];
    }
}
