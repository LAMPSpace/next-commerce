<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HomeSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = Carbon::now()->add($this->faker->randomElement([
            '-1 week',
            '+1 week',
            '+3 days',
            '-5 days',
            '+1 month',
            '-2 months',
        ]));
        $startDate = $date->toDateString();
        $endDate = null;

        if ($this->faker->boolean(30)) {
            $endDate = $date->add($this->faker->randomElement([
                '3 days',
                '1 month',
                '7 days',
                '1 week',
                '2 weeks',
            ]))->toDateString();
        }

        $banner = json_encode((object) []);

        $content = json_encode(array());

        return [
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->text(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'banner' => $banner,
            'content' => $content
        ];
    }
}
