<?php

namespace Database\Factories;

use App\Models\Films;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Films::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'description' => $this->faker->text,
        'release_date' => $this->faker->word,
        'ticket_price' => $this->faker->randomDigitNotNull,
        'rating' => $this->faker->randomElement(]),
        'country' => $this->faker->word,
        'genre' => $this->faker->randomElement(]),
        'photo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
