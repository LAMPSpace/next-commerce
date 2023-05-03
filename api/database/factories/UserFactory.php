<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = $this->faker->unique()->firstName();
        $lastName = $this->faker->name();
        $email = strtolower($firstName) . '.' . str_replace(' ', '', strtolower($lastName)) . '@email.com';
        $password = $firstName . str_replace(' ', '', $lastName) . '@Password';
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => Hash::make($password), // first_name + last_name does not contain space + @Password
        ];
    }
}
