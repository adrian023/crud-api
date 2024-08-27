<?php

namespace Database\Factories;

use App\Models\Priority;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'test_user',
            'is_completed' => random_int(0,1),
            'user_id' => User::pluck('id')->random(),
            'priority_id' => rand(0,1) == 0 ? NULL: Priority::pluck('id')->random(),
        ];
    }
}
