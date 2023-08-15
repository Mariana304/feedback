<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class feedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_number'=> $this->faker->randomNumber(6, true),
            'ticket_id'=>  $this->faker->randomNumber(4, true),
            'status'=> $this->faker->randomElement(['RESUELTO', 'EN CURSO']),
            'rating'=> rand(1,3),
            'comments'=> $this->faker->sentence(4),
            'user_ip'=> '127.0.0.1',
            'date'=> $this->faker->date(),
        ];
    }
}
