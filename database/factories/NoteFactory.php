<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->words(5, true),
            'body' => $this->faker->paragraph,
            'send_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'is_published' => $this->faker->boolean,
            'heart_count' => $this->faker->numberBetween(0, 100),
            'recipient' => $this->faker->email,
        ];
    }
}
