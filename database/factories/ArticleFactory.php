<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'reference' => $this->faker->text,
        'description' => $this->faker->text,
        'quantity' => $this->faker->randomDigitNotNull,
        'brand_id' => $this->faker->randomDigitNotNull,
        'provider_id' => $this->faker->randomDigitNotNull,
        'storage_id' => $this->faker->randomDigitNotNull,
        'priority' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->word
        ];
    }
}
