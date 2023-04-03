<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_name' => $this->faker->sentence(6),
            'client' => $this->faker->name,
            'pl_name' => $this->faker->name,
            'pl_image' =>$this->faker->sentence(6),
            'pl_email' => $this->faker->email,
            'start' => $this->faker->date,
            'end' => $this->faker->date,
            'progress' => $this->faker->numberBetween(1, 100),
        ];
    }
}
