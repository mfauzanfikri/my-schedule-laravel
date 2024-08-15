<?php

namespace Database\Factories;

use EmployeeStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'card_id' => (string)fake()->unique()->randomNumber(10, true),
            'name' => fake()->name(),
            'status' => EmployeeStatus::ACTIVE
        ];
    }
}
