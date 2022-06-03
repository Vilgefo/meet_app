<?php

namespace Database\Factories;

use App\Models\Hobbies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hobbies>
 */
class HobbiesFactory extends Factory
{
    protected $model = Hobbies::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'default' => random_int(0, 10) > 8
        ];
    }
}
