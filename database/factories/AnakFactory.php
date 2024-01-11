<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anak>
 */
class AnakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $jeniskelamin = fake()->randomElement(
            ['Laki Laki', 'Perempuan']
        );
        return [
            'user_id' => rand(1, 30),

            'name' => fake()->name(),
            'jeniskelamin' => $jeniskelamin,
        ];
    }
}
