<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->name();
        return [
            'name' => $name,
            'description' => $this->faker->text(),
            'logo' => 'logo_' . str_replace(' ', '_', $name),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->email(),
            'address' => $this->faker->address(),
        ];
    }
}
