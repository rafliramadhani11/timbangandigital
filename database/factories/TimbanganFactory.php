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
        $imt_status = fake()->randomElement(
            ['WASTED', 'NORMAL', 'RESIKO OBESITAS']
        );
        $pb_status = fake()->randomElement(
            ['STUNTED', 'Normal', 'TINGGI']
        );
        $bb_status = fake()->randomElement(
            ['UNDERWEIGHT', 'NORMAL', 'RESIKO OBESITAS']
        );
        return [
            'anak_id' => rand(1, 11),
            'umur' => rand(1, 12),

            'imt_status' => $imt_status,
            'pb_status' => $pb_status,
            'bb_status' => $bb_status,

            'pb' => fake()->randomFloat(1, 46, 83),
            'bb' => fake()->randomFloat(1, 2, 11),
            'imt' => fake()->randomFloat(1, 10, 22),
        ];
    }
}
