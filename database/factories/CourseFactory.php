<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'category'=> fake()->word,
            'level' => fake()->word,
            'start_date'=> fake()->date,
            'end_date' => fake()->date,
            'enrollment_deadline' => fake()->date,
            'course_image' => fake()->imageUrl,
            'course_sponsor' => fake()->word,
            'sponsor_image' => fake()->imageUrl,
            'lesson_plan' => fake()->paragraph,
        ];
    }
}
