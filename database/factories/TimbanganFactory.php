<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timbangan>
 */
class TimbanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(
            ['Wasted', 'Normal', 'Obesitas']
        );
        return [
            'anak_id' => rand(1, 30),

            'status' => $status,
            'umur' => rand(1, 12),
            'pb' => fake()->randomFloat(1, 46, 83),
            'bb' => fake()->randomFloat(1, 2, 11),
            'imt' => fake()->randomFloat(1, 10, 22),
        ];
    }
}
