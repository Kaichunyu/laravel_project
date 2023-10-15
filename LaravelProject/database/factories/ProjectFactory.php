<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Project;
use App\Models\UserType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $InPs = User::where('user_type_id', '1')->get(); // Get all user IDs
        $InPIDs = $InPs->pluck('id');
        return [
            //
            'title' => fake()->word.' Project',
            'description' => fake()->text(100),
            'number_of_student_needed' => rand(3, 6),
            'offering_trimester' => rand(1, 3),
            'offering_year' => rand(2023, 2025),
            'user_id' => fake()->randomElement($InPIDs),
        ];
    }
}
