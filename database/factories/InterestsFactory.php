<?php

namespace Database\Factories;

use App\Models\Interests;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interests>
 */
class InterestsFactory extends Factory
{
    protected $model = Interests::class;

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
